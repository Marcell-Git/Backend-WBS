<?php

namespace Modules\KategoriAduan\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\KategoriAduan\Services\KategoriAduanService;

class KategoriAduanController extends Controller
{
    public function __construct(
        protected KategoriAduanService $service
    ) {}

    public function index()
    {
        return $this->service->getAll();
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show($id)
    {
        return $this->service->findById($id);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}