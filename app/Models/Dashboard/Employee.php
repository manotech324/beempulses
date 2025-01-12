<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_name',
        'password',
        'employee_name',
        'father_name',
        'designation',
        'cnic',
        'postal_addr',
        'contact_numb',
        'department',
        'user_category',
        'region',
        'city',
        'employee_status',
        'group',
        'vehicle',
        'latitude',
        'longitude',
        'week_of_days',
    ];

    protected $casts = [
        'week_of_days' => 'array',
    ];
}
