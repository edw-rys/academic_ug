<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = [
        'name', 
        'start_date', 
        'end_date', 
        'status', 
        'created_at', 
        'updated_at',
    ];

    protected $date = [
        'start_date', 
        'end_date', 
    ];

    protected $table = 'period';
}
