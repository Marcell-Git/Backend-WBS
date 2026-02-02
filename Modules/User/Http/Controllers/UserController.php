<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\User\Services\UserService;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service
    ) {}

    public function index()
    {
        return $this->service->getAll();
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'username'     => 'required|string|unique:users,username',
                'password'     => 'required|string|min:8',
                'nama_lengkap' => 'required|string',
                'id_unit'      => 'required',
                'captcha'      => 'required|string', 
            ]);

            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => config('services.recaptcha.secret'),
                'response' => $request->captcha,
                'remoteip' => $request->ip(),
            ]);

            if (!$response->json('success')) {
                return response()->json([
                    'message' => 'Captcha tidak valid',
                    'debug'   => $response->json()
                ], 422);
            }

            $user = $this->service->create($request->all());

            return response()->json([
                'message' => 'User berhasil didaftarkan',
                'data'    => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan sistem',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        return $this->service->findById($id);
    }

    public function showUser(Request $request)
    {
        return $this->service->showUser($request);
    }

    public function search($id)
    {
        return $this->service->findById($id);
    }

    public function updatePassword(Request $request, $id)
    {
        return $this->service->updatePassword($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
