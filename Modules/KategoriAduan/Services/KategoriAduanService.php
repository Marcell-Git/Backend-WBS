<?php

namespace Modules\KategoriAduan\Services;
use Modules\KategoriAduan\Models\KategoriAduan;

class KategoriAduanService
{
    public function getAll()
    {
        return KategoriAduan::all();
    }

}