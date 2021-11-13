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

Route::group(['middleware' => ['auth']], function() {

    Route::get('/', function () {
        return view('index');
    });
    ###################### Begin Notifications Routes #############################
    Route::resource('/notification', 'NotificationController');
    ###################### Begin categories Routes #############################
    Route::resource('/category', 'CategoryController');
    ###################### Begin Brands Routes #############################
    Route::resource('/brands', 'BrandController');
    ###################### Begin Units Routes #############################
    Route::resource('/units', 'UnitController');
    ###################### Begin Taxs Routes #############################
    Route::resource('/tax', 'TaxController');
    ###################### Begin Warehouses Routes #############################
    Route::resource('/warehouses', 'WarehouseController');
    ###################### Begin Products Routes #############################
    Route::resource('/products', 'ProductController');

});


//Route::get('/home', 'HomeController@index')->name('home');
