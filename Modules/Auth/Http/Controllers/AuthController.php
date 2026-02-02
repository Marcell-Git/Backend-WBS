<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Auth\Services\AuthService;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        try {
            // 1. Validasi Input
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
                'captcha'  => 'required|string',
            ]);

            // 2. Verifikasi ke Google API
            $response = Http::asForm()->post(
                'https://www.google.com/recaptcha/api/siteverify',
                [
                    'secret'   => config('services.recaptcha.secret'),
                    'response' => $request->captcha,
                    'remoteip' => $request->ip(),
                ]
            );

            // 3. Cek Respon Google
            if (!$response->json('success')) {
                return response()->json([
                    'message' => 'Captcha tidak valid',
                    'debug'   => $response->json()
                ], 422);
            }

            // 4. Proses Login via Service
            $result = $this->authService->login(
                $request->username,
                $request->password
            );

            return response()->json([
                'message'      => 'Login berhasil',
                'user'         => $result['user'],
                'access_token' => $result['token'],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan sistem',
                'error'   => $e->getMessage(),
                'line'    => $e->getLine()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request->user());
        return response()->json(['message' => 'Logout berhasil']);
    }
}