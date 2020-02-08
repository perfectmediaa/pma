<?php

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

Route::get('/', 'HomeController@profile')->name('profile');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/info', 'HomeController@info')->name('info');
Route::get('/update', 'HomeController@update')->name('update');
Route::post('/update', 'HomeController@store')->name('store');
Route::get('/photos', 'HomeController@photos')->name('photos');
Route::get('/form', 'User\UserController@modelform')->name('modalform');
Route::post('/form', 'User\UserController@formStore')->name('formStore');

Route::get('/video', function(){
    return view('video');
});


Route::prefix('admin')->group(function(){
    Route::get('/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/photos', 'Admin\PhotosController@index')->name('admin.photos');
    Route::post('/album', 'Admin\PhotosController@album')->name('admin.album');
    Route::get('/albumid', 'Admin\PhotosController@albumid')->name('admin.albumid');
    Route::get('/users', 'Admin\UsersController@index')->name('admin.user');
    Route::get('/profile/{id}', 'Admin\UsersController@profile')->name('admin.profile');
    Route::post('/account/edit/{id}', 'Admin\UsersController@accountedit')->name('admin.accountedit');
    Route::post('/profile/edit/{id}', 'Admin\UsersController@profileedit')->name('admin.profileedit');
    Route::post('/albumid', 'Admin\PhotosController@albumidget')->name('admin.albumidd');
});