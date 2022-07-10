<?php

use App\Http\Controllers\Manage;
use Illuminate\Support\Facades\Route;

Route::get('', [Manage\DashboardController::class, 'index'])->name('dashboard');
Route::get('themes', [Manage\ThemesController::class, 'index'])->name('themes');
Route::get('plugins', [Manage\PluginsController::class, 'index'])->name('plugins');

Route::get('profile', [Manage\ProfileController::class, 'edit'])->name('profile');
Route::put('profile', [Manage\ProfileController::class, 'update'])->name('profile.update');

Route::resource('stories', Manage\StoriesController::class);
Route::resource('media', Manage\MediaController::class);
Route::resource('comments', Manage\CommentsController::class);
Route::resource('pages', Manage\DashboardController::class);

Route::get('settings/{type}', [Manage\SettingsController::class, 'index'])->name('settings');
Route::put('settings/{type}', [Manage\SettingsController::class, 'update'])->name('settings.update');

