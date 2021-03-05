<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $fillable = [
        'id', 
        'text', 
        'created_at', 
        'updated_at',
    ];

    protected $table = 'system';
}
