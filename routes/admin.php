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

Route::group(['middleware' => ['auth:admin'],'namespace' => 'Admin'], function() {

    Route::get('/admin', function () {
        return view('adminindex');
    });
    ###################### Begin Notifications Routes #############################
    Route::resource('/notifications', 'NotificationController');
    ###################### Begin Languages Routes #############################
        Route::resource('/languages', 'LanguageController');
        Route::post('/language/translate', 'LanguageController@addLangTranslationAjax')->name('language.translate.Ajax');
        Route::get('/language_switch/{id}', function($id){
            Session::put('lang_id', $id);
            return redirect()->back();
        })->name('language.switch');
        Route::get('/set_translation_database', function () {
            return new_lang(1,'en');
        });
        Route::get('/notification', function () {
            return  makeNotification('test','fas fa-cog', 'languages.index',array("1","2"));
        });
    ###################### Begin Superadmin Routes #############################
    Route::resource('/superadmin', 'SuperAdminController');
    ###################### Begin Packages Routes #############################
    Route::resource('/packages', 'PackageController');

});


//Route::get('/home', 'HomeController@index')->name('home');
