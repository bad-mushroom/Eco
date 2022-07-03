<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', \App\Http\Livewire\Pages\Dashboard::class)->name('dashboard');
