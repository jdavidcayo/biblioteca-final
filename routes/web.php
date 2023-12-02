<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/', [App\Http\Controllers\InicioController::class, 'index'])->name('inicio');
        //Route::get('/manual', [App\Http\Controllers\ManualController::class, 'index'])->name('manual.index');
        Route::resource('manual', App\Http\Controllers\ManualController::class);

        // Route::get('/folleto', [App\Http\Controllers\FolletoController::class, 'index'])->name('folleto.index');
        Route::resource('folleto', App\Http\Controllers\FolletoController::class);
        
        // Route::get('/formato', [App\Http\Controllers\FormatoController::class, 'index'])->name('formato.index');
        Route::resource('formato', App\Http\Controllers\FormatoController::class);

        // Route::get('/catalogo', [App\Http\Controllers\CatalogoController::class, 'index'])->name('catalogo.index');
        Route::resource('catalogo', App\Http\Controllers\CatalogoController::class);
        Route::get('/documento', [App\Http\Controllers\DocumentoController::class, 'index'])->name('documento.index');
        Route::get('/compendio', [App\Http\Controllers\CompendioController::class, 'index'])->name('compendio.index');
        Route::get('/capsula', [App\Http\Controllers\CapsulaController::class, 'index'])->name('capsula.index');
    });