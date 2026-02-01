<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;
use DateTimeImmutable;

class SsoController extends Controller
{
    /**
     * สร้าง JWT และส่งคืน URL สำหรับข้ามไปยังระบบ PJ-Budget
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateBudgetLink(Request $request)
    {
        // ตรวจสอบว่าผู้ใช้ล็อกอินอยู่หรือไม่
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // ดึงข้อมูลผู้ใช้ที่ล็อกอินอยู่
        $user = Auth::user();

        // ดึงค่า Secret Key และ URL ของระบบปลายทางจาก .env
        $jwtSecret = config('app.jwt_secret');
        $budgetSystemUrl = config('app.budget_system_url');

        if (!$jwtSecret || !$budgetSystemUrl) {
            return response()->json(['error' => 'SSO service is not configured properly.'], 500);
        }

        // ตั้งค่า JWT Configuration
        $config = Configuration::forSymmetricSigner(
            new Sha256(),
            InMemory::plainText($jwtSecret)
        );

        $now = new DateTimeImmutable();

        // สร้าง Token
        $token = $config->builder()
            // (iss) Issuer - ระบบที่ออก Token นี้
            ->issuedBy(url('/'))
            // (aud) Audience - ระบบที่จะรับ Token นี้
            ->permittedFor($budgetSystemUrl)
            // (jti) JWT ID - ID ของ Token นี้ (ป้องกันการใช้ซ้ำ)
            ->identifiedBy(bin2hex(random_bytes(16)))
            // (iat) Issued At - เวลาที่ออก Token
            ->issuedAt($now)
            // (nbf) Not Before - Token จะยังใช้ไม่ได้ก่อนเวลานี้
            ->canOnlyBeUsedAfter($now)
            // (exp) Expiration Time - ตั้งเวลาหมดอายุให้สั้นมากๆ (60 วินาที)
            ->expiresAt($now->modify('+60 seconds'))
            // (sub) Subject - ID ของผู้ใช้ (สำคัญที่สุด)
            ->relatedTo($user->objectsid)
            // Custom Claims - ใส่ข้อมูลอื่นๆ ที่ต้องการส่งไปด้วย
            ->withClaim('name', $user->name)
            ->withClaim('div_name', $user->div_name)
            ->getToken($config->signer(), $config->signingKey());

        // สร้าง URL ปลายทางพร้อมกับ Token
        $ssoUrl = rtrim($budgetSystemUrl, '/') . '/sso/login?token=' . $token->toString();

        // ส่ง URL กลับไปให้ Frontend
        return response()->json([
            'sso_url' => $ssoUrl,
        ]);
    }
}
