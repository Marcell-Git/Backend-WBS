<?php

namespace Modules\User\Services;

use Illuminate\Support\Facades\DB;
use Modules\User\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAll()
    {
        return User::all();
    }

    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'nama_lengkap' => $data['nama_lengkap'],
            'id_unit' => $data['id_unit'],
            'role' => 'user',
        ]);
    }

    public function showUser($request)
    {
        $query = DB::table('users')
            ->join('odp', 'users.id_unit', '=', 'odp.id_unit')
            ->select(
                'users.id_user',
                'users.username',
                'users.nama_lengkap',
                'users.role',
                'odp.nama_unit'
            );

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('users.username', 'like', "%$search%")
                    ->orWhere('users.nama_lengkap', 'like', "%$search%")
                    ->orWhere('odp.nama_unit', 'like', "%$search%");
            });
        }
        return $query->paginate(10);
    }

    public function findById($id)
    {
        $user = DB::table('users')
            ->join('odp', 'users.id_unit', '=', 'odp.id_unit')
            ->select([
                'users.id_user',
                'users.username',
                'users.nama_lengkap',
                'users.role',
                'odp.nama_unit'
            ])
            ->where('users.id_user', $id)
            ->first();

        return $user;
    }

    public function updatePassword($id, $password)
    {
        $user = User::findOrFail($id);
        $user->update(['password' => Hash::make($password)]);
        return response()->json([
            'message' => 'Password berhasil diupdate',
            'data' => $user
        ]);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }
}
