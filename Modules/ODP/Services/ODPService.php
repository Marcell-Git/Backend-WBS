<?php

namespace Modules\ODP\Services;

use Modules\ODP\Models\ODP;

class ODPService
{
    public function getAll()
    {
        return ODP::all();
    }

}