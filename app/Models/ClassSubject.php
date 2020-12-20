<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $fillable = [
        'name', 
        'course_subject_id',
        'status', 
        'created_at', 
        'updated_at',
    ];

    protected $table = 'class_subject';
    public function comment()
    {
        return $this->hasOne(CommentStudentClass::class, 'class_id');
    }
}
