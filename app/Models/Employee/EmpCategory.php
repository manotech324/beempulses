<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

class EmpCategory extends Model
{
    //
    protected $fillable = [
        'emp_cat_name',
        'exception',
    ];
}
