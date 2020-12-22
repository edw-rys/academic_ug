<?php
use Illuminate\Support\Facades\Route;
// Admin Route
Route::group([],function(){
    // Route::get('students','UserController@indexStudent' )->name('user.admin.student.index');
    // Route::get('teachers','UserController@indexTeacher' )->name('user.admin.teacher.index');
    // Route::get('admin','UserController@indexAdmin' )->name('user.admin.admin.index');
    Route::resource('students', 'StudentController');
    Route::post('students/restore', 'StudentController@restore')->name('students.restore');
    Route::resource('teachers', 'TeacherController');
    Route::post('teachers/restore', 'StudentController@restore')->name('teachers.restore');
    Route::resource('admin', 'AdminController');
    Route::post('admin/restore', 'StudentController@restore')->name('admin.restore');
});