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
    return view('welcome');
});


Route::get('/dropbox', 'DropboxController@index')->name('dropbox.index');
Route::get('/dropbox/{picture}', 'DropboxController@view')->name('dropbox.view');
// Route::get('/unduh/{berkas}', 'DropboxController@download')->name('dropbox.download');
// Route::get('/delete/{berkas}', 'DropboxController@delete')->name('dropbox.delete');
Route::post('/dropbox', 'DropboxController@store')->name('dropbox.store');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', ], function () {
    Route::get('/', 'DashboardController')->name('home');
    
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('roles', 'RoleController');
    Route::namespace('Auth')->group(function(){
        //Login Routes
        Route::get('login','LoginController@showLoginForm')->name('login');
        Route::post('login','LoginController@login');
        Route::post('logout','LoginController@logout')->name('logout');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

    });
});