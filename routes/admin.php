<?php
use Illuminate\Support\Facades\Route;
// Admin Route
Route::group([],function(){
    // Route::get('students','UserController@indexStudent' )->name('user.admin.student.index');
    // Route::get('teachers','UserController@indexTeacher' )->name('user.admin.teacher.index');
    // Route::get('admin','UserController@indexAdmin' )->name('user.admin.admin.index');
    /**
     * Rputes Students
     */
    Route::resource('students', 'StudentController');
    Route::post('students/restore', 'StudentController@restore')->name('students.restore');
    /**
     * Routes Teachers
     */
    Route::resource('teachers', 'TeacherController');
    Route::post('teachers/restore', 'TeacherController@restore')->name('teachers.restore');
    /**
     * Routes Admin
     */
    Route::resource('admin', 'AdminController');
    Route::post('admin/restore', 'AdminController@restore')->name('admin.restore');
    /**
     * Routes subject
     */
    Route::resource('subject', 'SubjectController');
    Route::post('subject/restore', 'SubjectController@restore')->name('subject.restore');

    /**
     * Routes course
     */
    Route::resource('course', 'CourseController');
    Route::post('course/restore', 'CourseController@restore')->name('course.restore');

    /**
     * Routes Period
     */
    Route::resource('period', 'PeriodController');
    Route::post('period/restore', 'PeriodController@restore')->name('period.restore');
    Route::post('period/finalize', 'PeriodController@finalize')->name('period.finalize');

    /**
     * Routes Teacher-Subject
     */
    Route::resource('course_subject', 'CourseSubjectController');
    Route::get('course_subject/get/course/{id}', 'CourseSubjectController@getByCourse')->name('course_subject.by-curse');
    
    Route::resource('course_student', 'CourseStudentController');
    Route::get('course_student/statistics/{id}', 'CourseStudentController@statistics')->name('course_student.statistics');
    Route::get('course_student/students/{id}', 'CourseStudentController@showStudents')->name('course_student.students');
    /**
     * Reporting
     */
    Route::get('report','ReportController@index')->name('report.index');
    Route::post('report/build','ReportController@buildReport')->name('report.build');
});