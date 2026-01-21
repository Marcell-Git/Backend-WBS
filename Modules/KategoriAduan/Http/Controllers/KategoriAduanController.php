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
}