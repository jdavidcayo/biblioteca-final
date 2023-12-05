<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CapsulaController;
use App\Http\Controllers\CompendioController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\FolletoController;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\UsuarioController;


//DONE

Route::get('/', [Homecontroller::class, 'index'])->name('admin.home');

Route::get('/capsulas', [CapsulaController::class, 'admin'])->name('capsula.admin');
Route::resource('/capsulas', CapsulaController::class)->except('index', 'admin');

Route::get('/manuales', [ManualController::class, 'admin'])->name('manual.admin');
Route::resource('/manuales', ManualController::class)->except('index', 'admin');

Route::get('/folletos', [FolletoController::class, 'admin'])->name('folleto.admin');
Route::resource('/folletos', FolletoController::class)->except('index', 'admin');

Route::get('/formatos', [FormatoController::class, 'admin'])->name('formato.admin');
Route::resource('/formatos', FormatoController::class)->except('index', 'admin');
Route::get('/documentos', [DocumentoController::class, 'admin'])->name('documento.admin');
Route::resource('/documentos', DocumentoController::class)->except('index', 'admin');


// Route::get('/generate-password', [UtilsController::class, 'generateRandomPassword'])->name('admin.generate-password');

//TO DO


Route::get('/catalogos', [CatalogoController::class, 'admin'])->name('catalogo.admin');
Route::get('/compendios', [CompendioController::class, 'admin'])->name('compendio.admin');
// Route::get('/usuarios', [UsuarioController::class, 'admin'])->name('usuario.admin');
Route::resource('/usuarios', UsuarioController::class);


