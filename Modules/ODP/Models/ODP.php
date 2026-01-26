<?php

namespace Modules\ODP\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ODP extends Model
{
    use SoftDeletes;
    
    protected $table = 'odp';
    protected $primaryKey = 'id_unit';

    protected $fillable = [
        'nama_unit',
    ];
}