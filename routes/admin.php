<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CapsulaController;
use App\Http\Controllers\CompendioController;
use App\Http\Controllers\DocuentoController;
use App\Http\Controllers\FolletoController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\UsuarioController;



Route::get('/', [Homecontroller::class, 'index'])->name('admin.home');
// Route::get('/generate-password', [UtilsController::class, 'generateRandomPassword'])->name('admin.generate-password');

Route::get('/capsulas', [CapsulaController::class, 'admin'])->name('capsula.admin');


Route::resource('/capsulas', CapsulaController::class)->except('index', 'admin');

Route::get('/catalogos', [CatalogoController::class, 'admin'])->name('catalogo.admin');
Route::get('/compendios', [CompendioController::class, 'admin'])->name('compendio.admin');
// Route::get('/documentos', [DocumentoController::class, 'admin'])->name('documento.admin');
Route::get('/folletos', [FolletoController::class, 'admin'])->name('folleto.admin');
Route::get('/manuales', [ManualController::class, 'admin'])->name('manual.admin');
// Route::get('/usuarios', [UsuarioController::class, 'admin'])->name('usuario.admin');
Route::resource('/usuarios', UsuarioController::class);


