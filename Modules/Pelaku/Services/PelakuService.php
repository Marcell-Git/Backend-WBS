<?php

namespace Modules\Pelaku\Services;

use Modules\Pelaku\Models\PelakuModel;
use Illuminate\Database\Eloquent\Collection;

class PelakuService
{

    public function getAll(): Collection
    {
        return PelakuModel::all();
    }

    public function create(array $data, int $id_aduan): PelakuModel
    {
        $data['id_aduan'] = $id_aduan;
        return PelakuModel::create($data);
    }


    public function delete(int $id): bool
    {
        $pelaku = PelakuModel::find($id);
        if ($pelaku) {
            return $pelaku->delete();
        }
        return false;
    }
}