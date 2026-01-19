<?php

namespace Modules\KategoriAduan\Services;
use Modules\KategoriAduan\Models\KategoriAduan;

class KategoriAduanService
{
    public function getAll()
    {
        return KategoriAduan::all();
    }

    public function create(array $data)
    {
        return KategoriAduan::create([
            'nama_kategori' => $data['nama_kategori'],
        ]);
    }

    public function findById($id)
    {
        return KategoriAduan::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $kategoriAduan = KategoriAduan::findOrFail($id);
        $kategoriAduan->update($data);
        return $kategoriAduan;
    }

    public function delete($id)
    {
        $kategoriAduan = KategoriAduan::findOrFail($id);
        $kategoriAduan->delete();
        return $kategoriAduan;
    }
}