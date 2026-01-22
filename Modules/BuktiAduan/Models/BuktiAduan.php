<?php

namespace Modules\BuktiAduan\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Modules\Aduan\Models\Aduan;

class BuktiAduan extends Model
{
    use HasFactory;

    protected $table = 'bukti_aduan';
    protected $primaryKey = 'id_bukti_aduan';
    protected $fillable = [
        'id_aduan',
        'file_path',
        'nama_file',
        'jenis_file',
        'ukuran',
    ];

    public function aduan()
    {
        return $this->belongsTo(Aduan::class, 'id_aduan', 'id_aduan');
    }
}