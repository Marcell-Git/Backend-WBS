<?php

namespace Modules\Pelaku\Models;

use Illuminate\Database\Eloquent\Model;

class PelakuModel extends Model
{
    protected $table = 'pelaku';
    protected $primaryKey = 'id_pelaku';
    protected $fillable = [
        'nama',
        'jabatan',
        'id_aduan',
        'id_unit',
    ];
}