<?php
use Illuminate\Support\Facades\Route;

Route::namespace('User')->group(function () {
    Route::get('student/dashboard', 'DashboardController@index')->name('dashboard.index'); // student.dashboard.index

    // Student Route
    Route::group(['prefix' => 'user/student', 'middleware' => ['role:student']], function () {
        Route::get('subjects', 'StudentController@index')->name('subject.index'); // student.subject.index
        Route::get('class/{period_id}', 'StudentController@classSubject')->name('class.find');
        Route::get('class/show/{id}', 'StudentController@showClass')->name('class.show');
        Route::post('class/comment', 'StudentController@storeComment')->name('class.comment');
    });
});

/*
 Route::get('class/{period_id}', 'StudentController@classSubject')->name('user.student.class');
        Route::post('class/comment', 'StudentController@storeComment')->name('user.student.class.comment');
        Route::get('class/show/{id}', 'StudentController@showClass')->name('user.student.class.show');
 */