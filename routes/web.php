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

Route::get('login', 'LoginController@loginShow')->name('auth.login.show')->middleware(['logged_in']);
Route::post('login', 'LoginController@login')->name('auth.login')->middleware(['logged_in']);

//RUTA USUARIO
Route::middleware(['IsAuthenticated'])->group(function () {

    Route::get('user/dashboard', 'User\DashboardController@index')->name('user.dashboard.index');
    Route::get('user/logout', 'LoginController@logout')->name('user.logout');
});
/*
roles
> php artisan tinker
> use Spatie\Permission\Models\Role;
> use Spatie\Permission\Models\Permission;
*/