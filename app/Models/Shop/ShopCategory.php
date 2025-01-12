<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    //
    protected $fillable = [
        'shop_cat_name',
        'exception',
        'pending_receipts',
        'ratio_for_credit',
        'top_level_to',
    ];
}
