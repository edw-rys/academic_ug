<?php

use Illuminate\Support\Facades\Route;

Route::get('subjects', 'AcademicController@index')->name('academic.index'); // student.subject.index
Route::get('class/{period_id}', 'AcademicController@classSubject')->name('class.find');
Route::get('class/show/{id}', 'AcademicController@showClass')->name('class.show');
Route::post('class/create', 'AcademicController@createClass')->name('class.create');
Route::post('class/masscreate', 'AcademicController@massCreateClass')->name('class.masscreate');
Route::post('academic/store', 'AcademicController@store')->name('academic.store');