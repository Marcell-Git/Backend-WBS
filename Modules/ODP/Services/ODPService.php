<?php

namespace Modules\ODP\Services;

use Illuminate\Support\Facades\DB;
use Modules\ODP\Models\ODP;


class ODPService
{
    public function getAll($request)
    {
        $query = DB::table('odp')->select('*');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_unit', 'like', "%$search%");
            });
        }

        return $query->paginate(10);
    }

    public function create(array $data)
    {
        return ODP::create($data);
    }

    public function destroy($id)
    {
        $odp = ODP::findOrFail($id);
        return $odp->delete();
    }
}
