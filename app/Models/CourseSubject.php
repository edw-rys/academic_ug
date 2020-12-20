<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    protected $fillable = [
        'teacher_id', 
        'course_id', 
        'period_id', 
        'subject_id', 
        'status', 
        'created_at', 
        'updated_at',
    ];

    protected $table = 'course_subject';
    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function period(){
        return $this->belongsTo(Period::class, 'period_id');
    }
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function course_student(){
        return $this->hasOne( CourseStudent::class, 'course_subject_id')
            ->where('student_id', auth()->user()->id);
    }

    public function course_students(){
        return $this->hasMany( CourseStudent::class, 'course_subject_id');
    }
    public function class_subject(){
        return $this->hasMany( ClassSubject::class, 'course_subject_id');
    }
}
