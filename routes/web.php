<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect()->route('auth.login.show');
    //return view('welcome');
});

Route::get('login', 'LoginController@loginShow')->name('auth.login.show');

Route::post('login', 'LoginController@login')->name('auth.login');

//RUTA USUARIO
Route::middleware(['IsAuthenticated'])->group(function(){
    
    Route::namespace('User')->group(function(){
        Route::get('user/dashboard','DashboardController@index' )->name('user.dashboard.index');
        Route::get('user/students','AdminController@index' )->name('user.panel.index');

        // Student Route
        Route::group(['prefix'=> 'user/student','middleware' => ['auth.student']],function(){
        	Route::get('subjects', 'StudentController@index')->name('user.student.subject');
            Route::get('class/{period_id}', 'StudentController@classSubject')->name('user.student.class');
        	Route::post('class/comment', 'StudentController@storeComment')->name('user.student.class.comment');
        	Route::get('class/show/{id}', 'StudentController@showClass')->name('user.student.class.show');
        });

    });
    Route::get('user/logout','LoginController@logout')->name('user.logout');
}
);
