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

    public function index()
    {
        return $this->service->getAll();
    }

}