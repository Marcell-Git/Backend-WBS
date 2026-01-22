<?php

namespace Modules\Auth\Services;

use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function login(string $username, string $password)
    {
        $user = User::where('username', $username)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['Username atau password salah'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    public function logout($user)
    {
        $user->currentAccessToken()->delete();
    }
}
