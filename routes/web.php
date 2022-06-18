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

Route::group(['prefix' => 'manage', 'as' => 'manage.', 'middleware' => 'auth'], function () {
    Route::get('/', 'App\Http\Controllers\Manage\DashboardController@index')->name('index');
    Route::get('dashboard', 'App\Http\Controllers\Manage\DashboardController@index')->name('dashboard');
    Route::get('settings/{type}', 'App\Http\Controllers\Manage\SettingsController@index')->name('settings.index');
    Route::put('settings', 'App\Http\Controllers\Manage\SettingsController@update')->name('settings.update');
    Route::resource('stories', 'App\Http\Controllers\Manage\StoriesController');
    Route::resource('stories/{story}/comments', 'App\Http\Controllers\Manage\CommentsController');
    Route::put('stories/{story}/comments{comment}/approve', 'App\Http\Controllers\Manage\CommentsController@approve')->name('comments.approve');
    Route::put('stories/{story}/comments{comment}/disapprove', 'App\Http\Controllers\Manage\CommentsController@disapprove')->name('comments.disapprove');
    Route::resource('menus', 'App\Http\Controllers\Manage\MenusController');
    Route::get('profile', 'App\Http\Controllers\Manage\ProfileController@edit')->name('profile');
    Route::put('profile', 'App\Http\Controllers\Manage\ProfileController@update')->name('profile.update');
    Route::get('password', 'App\Http\Controllers\Manage\PasswordController@edit')->name('password');
    Route::put('password', 'App\Http\Controllers\Manage\PasswordController@update')->name('password.update');
    Route::post('search', 'App\Http\Controllers\Manage\StoriesController@index')->name('search');
});

Route::group(['middleware' => 'theme:ecosphere'], function () {
    Route::get('stories', 'App\Http\Controllers\StoriesController@index');
    Route::get('stories/{storyType:slug}/{story:slug}', 'App\Http\Controllers\StoriesController@show')->name('stories.show');
    Route::get('/', 'App\Http\Controllers\StoriesController@index')->name('home');
    Route::resource('stories/{story}/comments', 'App\Http\Controllers\CommentsController');
});

Route::feeds();
