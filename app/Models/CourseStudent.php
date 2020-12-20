<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    protected $fillable = [
        'student_id', 
        'course_subject_id', 
        'status', 
        'created_at', 
        'updated_at',
    ];

    protected $table = 'course_student';

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
}
