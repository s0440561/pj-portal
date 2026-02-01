<?php

// app/Services/AuthApiService.php

namespace App\Services;

use Illuminate\Support\Facades\Http; // ใช้ Laravel HTTP Client สำหรับเรียก API
use Illuminate\Support\Facades\Log;  // สำหรับบันทึก Log ข้อผิดพลาด

class AuthApiService
{
    protected $apiUrl;
    protected $apiKey; // ถ้า API ของคุณมี API Key

    public function __construct()
    {
        // กำหนด URL ของ API Authentication ของคุณ
        // ควรดึงจากไฟล์ .env เพื่อความยืดหยุ่นในการตั้งค่าแต่ละสภาพแวดล้อม
        $this->apiUrl = env('AUTH_API_URL', 'https://sso.moj.go.th/ws/users.php/authenAD');
    }

    /**
     * ตรวจสอบสิทธิ์ผู้ใช้กับ API ภายนอก
     *
     * @param string $username ชื่อผู้ใช้ที่ส่งมาจากฟอร์ม
     * @param string $password รหัสผ่านที่ส่งมาจากฟอร์ม
     * @return array|false ข้อมูลผู้ใช้จาก API หากสำเร็จ, หรือ false หากไม่สำเร็จ
     */
    public function authenticate(string $username, string $password)
    {
        // สร้าง Payload ที่จะส่งไป API
        $payload = [
            'username' => $username,
            'password' => $password,
            'api' => 'pj-track',
        ];

       
        try {
            // ส่ง Request ไปยัง API โดยใช้ Payload ที่เตรียมไว้
            // **FIX**: เพิ่ม Headers ที่จำเป็นซึ่ง API อาจต้องการ
            // API บางตัวต้องการ Header 'Accept' และ 'User-Agent' เพื่อให้ทำงานเหมือนเบราว์เซอร์หรือเครื่องมือทดสอบ
            // **FIX**: เปลี่ยน Content-Type เป็น application/json ตามที่ API ต้องการ
            $response = Http::asJson()
                ->withHeaders([
                    'Accept' => 'application/json',
                    'User-Agent' => 'PJ-Track-Laravel-Client/1.0',
                ])
                // **DEBUG STEP**: ลองปิดการตรวจสอบ SSL Certificate ชั่วคราว
                // หากวิธีนี้ได้ผล แสดงว่า Server ของเราไม่รู้จัก Certificate ของ API ปลายทาง
                ->withoutVerifying()
                ->post($this->apiUrl, $payload);

     

            // กรณีที่ 2: API ตอบกลับสำเร็จ (200 OK) แต่การยืนยันตัวตนไม่ผ่าน
            $data = $response->json();
            if (isset($data['status']) && $data['status'] === 'Success') {
     
                return $data; // คืนค่าข้อมูลผู้ใช้ทั้ง array
            }

            // ถ้า status ไม่ใช่ 'Success' ให้ถือว่าชื่อผู้ใช้หรือรหัสผ่านผิด
            // เราจะคืนค่า null เพื่อแยกกรณีนี้ออกจากข้อผิดพลาดการเชื่อมต่อ
         //   Log::info('Auth API rejected credentials.', ['username' => $username, 'response' => $data]);
            return null;

        } catch (\Throwable $e) {
            // **IMPROVEMENT**: รวม catch block ให้กระชับขึ้น
            // ดักจับได้ทั้ง ConnectionException และข้อผิดพลาดอื่นๆ ที่อาจเกิดขึ้น
            Log::error('Auth API Service Exception: ' . $e->getMessage(), [
                'exception_class' => get_class($e) // บันทึกชื่อคลาสของ Exception เพื่อให้ Debug ง่ายขึ้น
            ]);
            return false;
        }
    }
}
