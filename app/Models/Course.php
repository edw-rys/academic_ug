<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 
        'code', 
        'status', 
        'created_at', 
        'updated_at',
    ];

    protected $table = 'course';
}
