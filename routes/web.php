<?php

use App\Http\Livewire\ShowPosts;
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

Route::group(['middleware' => 'theme:ecosphere'], function () {
    Route::get('/contents', 'App\Http\Controllers\ContentsController@index');
    Route::get('/contents/{slug}', 'App\Http\Controllers\ContentsController@show');
    Route::get('/', 'App\Http\Controllers\HomeController@index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('', 'App\Http\Controllers\Admin\DashboardController@index');
    Route::get('dashboard', 'App\Http\Controllers\Admin\DashboardController@index');
});
