<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'contact_person',
        'owner',
        'contact',
        'shop_size',
        'region_id',
        'city_id',
        'latitude',
        'longitude',
        'city',
        'shop_data',
        'shop_code',
        'area_id',
        'shop_category_id',
        'qr',
        'credit_limit',
        'cnic',
        'type',
        'ntn'
    ];
}
