<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentStudentClass extends Model
{
    protected $fillable = [
        'comment', 
        'student_id', 
        'class_id',
        'status', 
        'created_at', 
        'updated_at',
    ];

    protected $table = 'comment_student_class';
}
