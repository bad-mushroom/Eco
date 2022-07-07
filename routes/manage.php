<?php

use App\Http\Controllers\Manage;
use Illuminate\Support\Facades\Route;

Route::get('', [Manage\DashboardController::class, 'index'])->name('dashboard');
Route::resource('stories', Manage\StoriesController::class);
Route::resource('media', Manage\MediaController::class);
Route::resource('comments', Manage\CommentsController::class);
Route::resource('pages', Manage\DashboardController::class);
Route::get('settings/{type}', [Manage\SettingsController::class, 'index'])->name('settings');
Route::resource('themes', Manage\DashboardController::class);
Route::resource('plugins', Manage\DashboardController::class);
