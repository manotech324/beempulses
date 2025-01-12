<?php

namespace App\Models\Area;

use Illuminate\Database\Eloquent\Model;

class AreaGroup extends Model
{
    //
    protected $fillable = [
        'region_id',
        'area_id',
        'name',
    ];
}
