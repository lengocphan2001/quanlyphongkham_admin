<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeKeeping extends Model
{
    use HasFactory;


    protected $fillable = [
        'employee_id',
        'date',
        'start',
        'end',
        'total',
        'status'
    ];
}
