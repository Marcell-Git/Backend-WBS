<?php

namespace Modules\User\Services;

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
            'name'     => $data['name'],
            'password' => Hash::make($data['password']),
            'role'     => $data['role'],
        ]);
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }
}