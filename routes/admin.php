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
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('adminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('adminLogin');

Route::group(['middleware' => ['auth:admin']], function() {

    Route::get('/admin', function () {
        return view('index');
    });
});


Route::get('/home', 'HomeController@index')->name('home');
