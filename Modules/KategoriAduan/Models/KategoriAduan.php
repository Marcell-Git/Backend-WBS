<?php

namespace Modules\KategoriAduan\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriAduan extends Model
{
    protected $table = 'kategori_aduan';
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori',
    ];
}