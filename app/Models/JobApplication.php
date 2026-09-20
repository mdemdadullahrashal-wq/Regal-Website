<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo',
        'position',
        'address',
        'has_sales_experience',
        'years_experience',
        'software_experience',
        'work_type',
        'work_from_home',
        'home_address',
        'commission_based',
        'expected_salary',
    ];
}
