<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username',
        'password',
        'role',
        'id_unit',
        'nama_lengkap',
    ];

    protected $hidden = [
        'password',
    ];
}
