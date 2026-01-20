<?php

namespace Modules\BuktiAduan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\BuktiAduan\Services\BuktiAduanService;

class BuktiAduanController extends Controller
{
    protected $buktiAduanService;

    public function __construct(BuktiAduanService $buktiAduanService)
    {
        $this->buktiAduanService = $buktiAduanService;
    }

}