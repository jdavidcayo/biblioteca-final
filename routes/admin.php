<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('/', [Homecontroller::class, 'index'])->name('admin.home');
