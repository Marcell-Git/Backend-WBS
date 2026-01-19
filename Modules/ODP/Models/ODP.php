<?php

namespace Modules\ODP\Models;

use Illuminate\Database\Eloquent\Model;

class ODP extends Model
{
    protected $table = 'odp';
    protected $primaryKey = 'id_unit';

    protected $fillable = [
        'nama_unit',
    ];
}