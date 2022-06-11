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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('', 'App\Http\Controllers\Admin\DashboardController@index');
    Route::get('dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard');
    Route::get('settings/{type}', 'App\Http\Controllers\Admin\SettingsController@index')->name('settings.index');
    Route::put('settings', 'App\Http\Controllers\Admin\SettingsController@update');
    Route::resource('content', 'App\Http\Controllers\Admin\ContentsController');
});

Route::group(['middleware' => 'theme:ecosphere'], function () {
    Route::get('/contents', 'App\Http\Controllers\ArticlesController@index');
    Route::get('/contents/{slug}', 'App\Http\Controllers\ArticlesController@show');
    Route::get('/', 'App\Http\Controllers\HomeController@index');
});
