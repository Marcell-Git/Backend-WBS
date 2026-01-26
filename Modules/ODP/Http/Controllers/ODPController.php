<?php

namespace Modules\ODP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ODP\Services\ODPService;

class ODPController extends Controller
{
    public function __construct(
        protected ODPService $service
    ) {}

    public function index(Request $request)
    {
        return $this->service->getAllPaginate($request);
    }

    public function getAll()
    {
        return $this->service->getAll();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_unit' => 'required|string|max:255',
        ]);

        return $this->service->create($validated);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

}