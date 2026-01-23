<?php

namespace Modules\Aduan\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\BuktiAduan\Models\BuktiAduan;
use Modules\Pelaku\Models\PelakuModel;

class Aduan extends Model
{
    protected $table = 'aduan';
    protected $primaryKey = 'id_aduan';

    protected $fillable = [
        'nama_kasus',
        'kronologi',
        'nama_pengadu',
        'waktu_kejadian',
        'status_aduan',
        'kode_tiket',
        'id_kategori',
        'id_user',
    ];

    public function buktiAduan()
    {
        return $this->hasMany(BuktiAduan::class, 'id_aduan', 'id_aduan');
    }

    public function pelaku()
    {
        return $this->hasMany(PelakuModel::class, 'id_aduan', 'id_aduan');
    }
}