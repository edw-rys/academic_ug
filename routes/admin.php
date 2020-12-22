<?php
use Illuminate\Support\Facades\Route;
// Admin Route
Route::group([],function(){
    // Route::get('students','UserController@indexStudent' )->name('user.admin.student.index');
    // Route::get('teachers','UserController@indexTeacher' )->name('user.admin.teacher.index');
    // Route::get('admin','UserController@indexAdmin' )->name('user.admin.admin.index');
    Route::resource('students', 'StudentController');
    Route::resource('teachers', 'TeacherController');
    Route::resource('admin', 'AdminController');
});