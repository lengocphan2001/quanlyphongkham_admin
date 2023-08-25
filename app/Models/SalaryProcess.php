<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryProcess extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'decision_number',
        'decision_date',
        'date_use',
        'department',
        'position',
        'salary',
        'total'
    ];
}
