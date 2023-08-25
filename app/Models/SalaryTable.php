<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'fullname',
        'department',
        'month',
        'year',
        'total_labour',
        'ot_labour',
        'salary',
        'salary_by_work',
        'salary_ot',
        'recieved_salary'
    ];
}
