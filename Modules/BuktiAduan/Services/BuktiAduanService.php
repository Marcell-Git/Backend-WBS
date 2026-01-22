<?php

namespace Modules\BuktiAduan\Services;

use Modules\BuktiAduan\Models\BuktiAduan;
use Illuminate\Http\UploadedFile;
use Modules\Aduan\Models\Aduan;

class BuktiAduanService
{
    public function store(int $aduanId, UploadedFile $file): BuktiAduan
    {
        Aduan::findOrFail($aduanId);
        $nama_file = $file->getClientOriginalName();
        $jenis_file = $file->getClientOriginalExtension();
        $ukuran = $file->getSize();
        $path = $file->store('bukti_aduan', 'public');

        return BuktiAduan::create([
            'id_aduan' => $aduanId,
            'file_path' => $path,
            'nama_file' => $nama_file,
            'jenis_file' => $jenis_file,
            'ukuran' => $ukuran,
        ]);
    }
}
