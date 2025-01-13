<?php

namespace App\Models\Sku;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    protected $fillable = [
        'region_id',
        'promotion_title',
        'promotion_des',
        'promotion_sku_id',
        'promotion_sku_qty',
        'foc_sku_id',
        'foc_sku_qty'
    ];
}