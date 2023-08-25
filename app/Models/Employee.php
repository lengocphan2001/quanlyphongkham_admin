<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'identity',
        'fullname',
        'date_of_birth',
        'common_name',
        'gender',
        'identity_card',
        'start_working_date',
        'official_start_working_date',
        'working_status',
        'current_address',
        'permanent_address',
        'domicile',
        'place_of_birth',
        'phone',
        'email',
        'password',
        'decision_number',
        'decision_date',
        'position',
        'title',
        'department',
        'contract_number',
        'contract_type',
        'contract_start',
        'contract_end'
    ];
}
