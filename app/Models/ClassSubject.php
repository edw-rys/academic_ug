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
        'teacher_id'
    ];

    protected $table = 'class_subject';
    public function comment()
    {
        return $this->hasOne(CommentStudentClass::class, 'class_id')->where('student_id', auth()->user()->id);
    }
    public function comments(){
        return $this->hasMany( CommentStudentClass::class, 'class_id');
    }
}
