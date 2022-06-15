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

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('', 'App\Http\Controllers\Admin\DashboardController@index');
    Route::get('dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard');
    Route::get('settings/{type}', 'App\Http\Controllers\Admin\SettingsController@index')->name('settings.index');
    Route::put('settings', 'App\Http\Controllers\Admin\SettingsController@update')->name('settings.update');
    Route::resource('stories', 'App\Http\Controllers\Admin\StoriesController');
    Route::resource('stories/{story}/comments', 'App\Http\Controllers\Admin\CommentsController');
    Route::put('stories/{story}/comments{comment}/approve', 'App\Http\Controllers\Admin\CommentsController@approve')->name('comments.approve');
    Route::put('stories/{story}/comments{comment}/disapprove', 'App\Http\Controllers\Admin\CommentsController@disapprove')->name('comments.disapprove');
    Route::resource('menus', 'App\Http\Controllers\Admin\MenusController');
    Route::get('profile', 'App\Http\Controllers\Admin\ProfileController@edit')->name('profile');
    Route::put('profile', 'App\Http\Controllers\Admin\ProfileController@update')->name('profile.update');
    Route::get('password', 'App\Http\Controllers\Admin\PasswordController@edit')->name('password');
    Route::put('password', 'App\Http\Controllers\Admin\PasswordController@update')->name('password.update');
});

Route::group(['middleware' => 'theme:ecosphere'], function () {
    Route::get('/stories', 'App\Http\Controllers\StoriesController@index');
    Route::get('/stories/{storyType:slug}/{story:slug}', 'App\Http\Controllers\StoriesController@show')->name('stories.show');
    Route::get('/', 'App\Http\Controllers\StoriesController@index')->name('home');
    Route::resource('stories/{story}/comments', 'App\Http\Controllers\CommentsController');
});
