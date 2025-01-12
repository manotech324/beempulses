<?php

namespace App\Models\Sku;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    //
    protected $fillable = [
        'sku_category_id',
        'name',
        'sku_price_status',
        'price',
        'litres_per_pack',
    ];
}
