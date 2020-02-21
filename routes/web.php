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

Route::get('/', 'HomeController@index')->name('index');


Auth::routes();

Route::get('/info/{user}', 'HomeController@info')->name('info');
Route::get('/photos/{photo}', 'HomeController@photos')->name('photos');
Route::get('/video/{video}', 'HomeController@video')->name('get.video');
Route::get('/form', 'User\UserController@modelform')->name('modalform');
Route::post('/form', 'User\UserController@formStore')->name('formStore');
Route::get('/news', 'HomeController@all_news')->name('all.news');
Route::get('/news/{slug}', 'HomeController@single_news')->name('single.news');
Route::get('/models', 'HomeController@models')->name('models.get');
Route::get('/photos', 'HomeController@albums')->name('albums.get');
Route::get('/videos', 'HomeController@videos')->name('videos.get');
Route::get('/about', 'HomeController@about')->name('about.page');


Route::get('/wallet', 'User\UserController@get_wallet')->name('get.wallet');
Route::post('/khalti', 'User\UserController@khalti')->name('khalti');
Route::get('/profile', 'User\UserController@profile')->name('profile');
Route::get('/profile/update', 'User\UserController@update')->name('update');
Route::post('/profile/update', 'User\UserController@store')->name('store.photos');
Route::post('/profile/album', 'User\UserController@album')->name('store.album');
Route::get('/profile/photos', 'User\UserController@photos')->name('profile.photos');
Route::get('/profile/videos', 'User\UserController@videos')->name('profile.videos');
Route::get('/profile/photos/delete/{id}', 'User\UserController@deleteImg')->name('profile.photos.delete');
Route::get('/profile/upgrade', 'User\UserController@upgrade')->name('profile.upgrade');
Route::get('/profile/final', 'User\UserController@upgrade_show')->name('profile.upgrade.final.get');
Route::post('/profile/final', 'User\UserController@upgrade_final')->name('profile.upgrade.final');
Route::post('/profile/update-pass', 'User\UserController@update_pass')->name('User.pass.change');
Route::post('/profile/update-account', 'User\UserController@update_account')->name('User.account.update');
Route::post('/profile/update-profile', 'User\UserController@update_profile')->name('User.profile.update');



Route::prefix('admin')->group(function(){
    Route::get('/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/photos', 'Admin\PhotosController@index')->name('admin.photos');
    Route::post('/photos', 'Admin\PhotosController@store')->name('admin.photos.store');
    Route::get('/videos', 'Admin\PhotosController@index_videos')->name('admin.videos');
    Route::post('/videos', 'Admin\PhotosController@add_video')->name('admin.video.store');
    Route::post('/album', 'Admin\PhotosController@album')->name('admin.album');
    Route::get('/albumid', 'Admin\PhotosController@albumid')->name('admin.albumid');
    Route::get('/userid', 'Admin\UsersController@userid')->name('admin.userid');
    Route::get('/albumsall', 'Admin\PhotosController@all_album')->name('admin.all.albums');
    Route::get('/videosall', 'Admin\PhotosController@all_videos')->name('admin.all.videos');
    Route::get('/single-album/{album}', 'Admin\PhotosController@single_album')->name('admin.single.albums');
    Route::get('/photo/delete/{id}', 'Admin\PhotosController@deleteImg')->name('photos.delete');
    Route::get('/users', 'Admin\UsersController@index')->name('admin.user');
    Route::get('/profile/{user}', 'Admin\UsersController@profile')->name('admin.profile');
    Route::post('/account/edit/{user}', 'Admin\UsersController@accountedit')->name('admin.accountedit');
    Route::post('/profile/edit/{id}', 'Admin\UsersController@profileedit')->name('admin.profileedit');
    Route::post('/profile/wallet/{user}', 'Admin\UsersController@wallet')->name('admin.profile.wallet');
    Route::post('/profile/album/{user}', 'Admin\UsersController@albumedit')->name('admin.profile.album');
    Route::post('/profile/type/{user}', 'Admin\UsersController@profile_type')->name('admin.profile.type');
    Route::post('/albumid', 'Admin\PhotosController@albumidget')->name('admin.albumidd');
    Route::post('/album-edit/{album}', 'Admin\PhotosController@album_update')->name('admin.album.update');
    Route::post('/video/update/{video}', 'Admin\PhotosController@video_update')->name('admin.video.update');
    Route::get('/video/delete/{video}', 'Admin\PhotosController@video_delete')->name('admin.video.delete');
    Route::get('/news/create', 'Admin\NewsController@create')->name('admin.news.create');
    Route::post('/news/create', 'Admin\NewsController@store')->name('admin.news.store');
    Route::get('/news/update/{news}', 'Admin\NewsController@update')->name('admin.news.update.get');
    Route::get('/news/view/{news}', 'Admin\NewsController@view_news')->name('admin.news.view');
    Route::post('/news/update/{news}', 'Admin\NewsController@update_news')->name('admin.news.update');
    Route::get('/news', 'Admin\NewsController@index')->name('admin.news');
    Route::get('/news/delete/{news}', 'Admin\NewsController@delete')->name('admin.news.delete');
    Route::get('/forms', 'Admin\UsersController@forms')->name('admin.froms');

});