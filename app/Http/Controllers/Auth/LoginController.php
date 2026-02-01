<?php

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // อย่าลืม import User Model ของคุณ
use App\Services\AuthApiService; // Import Service ที่สร้างขึ้น
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException; // สำหรับจัดการข้อผิดพลาดการตรวจสอบข้อมูล
use Illuminate\Support\Facades\Log; // สำหรับบันทึก Log

class LoginController extends Controller
{
    protected $authApiService;

    // Constructor Injection: Laravel จะสร้าง instance ของ AuthApiService ให้โดยอัตโนมัติ
    public function __construct(AuthApiService $authApiService)
    {
        $this->authApiService = $authApiService;
    }

    /**
     * จัดการการส่งฟอร์ม Login (สำหรับ AJAX)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // 1. ตรวจสอบข้อมูลที่ส่งมาจากฟอร์ม (Validation)
        // 'username' หรือ 'email' ขึ้นอยู่กับว่า API Service ของคุณใช้ตัวไหนในการ Login
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $username = $request->username;
        $password = $request->password;
        // FIX: พารามิเตอร์ตัวที่สองของ Log::info() ต้องเป็น array (context)
     
        // 2. เรียกใช้ Service เพื่อตรวจสอบสิทธิ์กับ API ภายนอก
        $adUserData = $this->authApiService->authenticate($username, $password);

        // 3. ตรวจสอบผลลัพธ์จาก Service เพื่อแสดงข้อความ Error ที่เจาะจง
        if ($adUserData === null) {
            // กรณีที่ 1: ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง (Service คืนค่า null)
            throw ValidationException::withMessages([
                'username' => ['ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'],
            ]);
        }

        if ($adUserData === false) {
            // กรณีที่ 2: ไม่สามารถเชื่อมต่อ API ได้ (Service คืนค่า false)
            throw ValidationException::withMessages([
                'username' => ['ไม่สามารถเชื่อมต่อกับระบบตรวจสอบสิทธิ์ได้ กรุณาลองใหม่อีกครั้ง'],
            ]);
        }

        if (is_array($adUserData)) {
            // 4. ถ้าตรวจสอบสิทธิ์กับ API สำเร็จ:
            // 3.1. ค้นหา User ในฐานข้อมูล Laravel ของเรา
            // สมมติว่าคุณมีคอลัมน์ 'username' ในตาราง users ที่เก็บ username จาก AD/External Auth
            // หรือใช้ 'email' ถ้า API คืนค่า email ที่เป็น unique
            // *** FIX: ใช้ 'cn' เป็น key หลักในการค้นหาและสร้าง User เพื่อความสอดคล้องกัน ***
            $user = User::where('objectsid', $adUserData['objectsid'])->first();

            // เตรียมชื่อเต็มของผู้ใช้จากข้อมูลที่ได้จาก API
            $fullName = trim(($adUserData['firstname'] ?? '') . ' ' . ($adUserData['lastname'] ?? ''));

            if (!$user) {
                
                // 3.2. ถ้า User ยังไม่มีในฐานข้อมูลของเรา ให้สร้าง Record ใหม่
                $user = User::create([
                    'objectsid' => $adUserData['objectsid'], 
                    'username' => $adUserData['email'], 
                    'name' => !empty($fullName) ? $fullName : $adUserData['cn'], // ถ้าไม่มีชื่อ-นามสกุล ให้ใช้ cn แทน
                    'div_id' => $adUserData['div_id'] ?? null, 
                    'div_name' => $adUserData['div_name'] ?? null, 
                ]);
            } else {
                // 3.3. ถ้า User มีอยู่แล้ว อาจจะอัปเดตข้อมูลบางอย่างจาก API
                $user->update([
                    'name' => !empty($fullName) ? $fullName : $user->name, // อัปเดตชื่อถ้ามีข้อมูลใหม่, มิฉะนั้นใช้ชื่อเดิม
                   'div_id' => $adUserData['div_id'] ?? null, 
                    'div_name' => $adUserData['div_name'] ?? null, 
                    // อัปเดตข้อมูลอื่นๆ ที่ต้องการ
                ]);
            }

            // 4. บอก Laravel ว่าผู้ใช้คนนี้ล็อกอินสำเร็จ
            // Auth::login() จะจัดการ Session ให้โดยอัตโนมัติ
            // $request->boolean('remember') สำหรับ checkbox "จดจำฉัน"
            Auth::login($user, $request->boolean('remember'));
            $request->session()->regenerate(); // สำคัญเพื่อความปลอดภัย (Session Fixation)

            // คืนค่าเป็น JSON เมื่อ Login สำเร็จ
            return response()->json([
                'status' => 'success',
                'message' => 'เข้าสู่ระบบสำเร็จ!',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'div_id' => $user->div_id,
                    'div_name' => $user->div_name,
                ]
            ]);
        }

        // กรณีอื่นๆ ที่ไม่คาดคิด (ไม่ควรเกิดขึ้นถ้า Service ทำงานถูกต้อง)
        return response()->json(['status' => 'error', 'message' => 'เกิดข้อผิดพลาดที่ไม่ทราบสาเหตุในระบบ'], 500);
    }

    /**
     * จัดการการ Logout (สำหรับ AJAX)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Logout ผู้ใช้
        $request->session()->invalidate(); // ล้าง Session ทั้งหมด
        $request->session()->regenerateToken(); // สร้าง CSRF token ใหม่

        // คืนค่าเป็น JSON เมื่อ Logout สำเร็จ
        return response()->json([
            'status' => 'success',
            'message' => 'ออกจากระบบสำเร็จ!',
        ]);
    }

    /**
     * ตรวจสอบสถานะการ Login ของผู้ใช้ (สำหรับ AJAX)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkAuthStatus()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return response()->json([
                'auth_status' => true,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'div_id' => $user->div_id,
                    'div_name' => $user->div_name,
                ]
            ]);
        }
        return response()->json([
            'auth_status' => false,
            'user' => null
        ]);
    }
}
