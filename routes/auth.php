<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

 Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => 'guest'], function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create']);
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => 'auth'], function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
