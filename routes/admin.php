<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Livewire\Capsulas;

Route::get('/', [Homecontroller::class, 'index'])->name('admin.home');
Route::get('/capsulas', Capsulas::class);

