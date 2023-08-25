<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'old_department',
        'new_department',
        'old_position',
        'new_position',
        'old_title',
        'new_title'
    ];
}
