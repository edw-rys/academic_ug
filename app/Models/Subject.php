<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 
        'status', 
        'created_at', 
        'updated_at',
    ];

    protected $table = 'subject';
}
