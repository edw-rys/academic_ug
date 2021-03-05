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
    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
    public function class_subject(){
        return $this->belongsTo(ClassSubject::class, 'class_id');
    }
}
