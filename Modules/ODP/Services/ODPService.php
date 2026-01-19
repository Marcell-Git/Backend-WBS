<?php

namespace Modules\ODP\Services;

use Modules\ODP\Models\ODP;

class ODPService
{
    public function getAll()
    {
        return ODP::all();
    }

    public function create(array $data)
    {
        return ODP::create([
            'nama_unit' => $data['nama_unit'],
        ]);
    }

    public function findById($id)
    {
        return ODP::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $odp = ODP::findOrFail($id);
        $odp->update($data);
        return $odp;
    }

    public function delete($id)
    {
        $odp = ODP::findOrFail($id);
        $odp->delete();
        return $odp;
    }
}