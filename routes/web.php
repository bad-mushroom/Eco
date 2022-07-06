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

Route::get('stories', 'App\Http\Controllers\StoriesController@index');
Route::get('stories/{storyType:slug}/{story:slug}', 'App\Http\Controllers\StoriesController@show')->name('stories.show');
Route::get('pages/{page:slug}', 'App\Http\Controllers\PagesController@show')->name('pages.show');
Route::get('/', 'App\Http\Controllers\StoriesController@index')->name('home');
Route::resource('stories/{story}/comments', 'App\Http\Controllers\CommentsController');

Route::get('files/{file:object_filename}', 'App\Http\Controllers\FilesController@download')->name('files.download');

Route::feeds();
