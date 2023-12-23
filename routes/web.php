<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentoController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/', [App\Http\Controllers\InicioController::class, 'index'])->name('inicio');
        Route::get('/manual', [App\Http\Controllers\ManualController::class, 'index'])->name('manual.index');
        Route::get('/manual/{manual}', [App\Http\Controllers\ManualController::class, 'show'])->name('manual.show');
        Route::get('/capsula', [App\Http\Controllers\CapsulaController::class, 'index'])->name('capsula.index');
        Route::get('/capsula/{capsula}', [App\Http\Controllers\CapsulaController::class, 'show'])->name('capsula.show');
        Route::get('/folleto', [App\Http\Controllers\FolletoController::class, 'index'])->name('folleto.index');
        Route::get('/folleto/{folleto}', [App\Http\Controllers\FolletoController::class, 'show'])->name('folleto.show');
        Route::get('/formato', [App\Http\Controllers\FormatoController::class, 'index'])->name('formato.index');
        Route::get('/formato/{formato}', [App\Http\Controllers\FormatoController::class, 'show'])->name('formato.show');
        Route::get('/documento', [DocumentoController::class, 'index'])->name('documento.index');
        Route::get('/documento/{documento}', [App\Http\Controllers\DocumentoController::class, 'show'])->name('documento.show');
        Route::get('/catalogo', [App\Http\Controllers\CatalogoController::class, 'index'])->name('catalogo.index');
        Route::get('/catalogo/{catalogo}', [App\Http\Controllers\CatalogoController::class, 'show'])->name('catalogo.show');
        Route::get('/compendio', [App\Http\Controllers\CompendioController::class, 'index'])->name('compendio.index');
        Route::get('/compendio/{compendio}', [App\Http\Controllers\CompendioController::class, 'show'])->name('compendio.show');
        Route::post('/compendio/filtrar', [App\Http\Controllers\FiltroCompendioController::class, 'filtrarDatos'])->name('compendio.filtrar');
        Route::post('/busqueda', [App\Http\Controllers\BusquedaController::class, 'index'])->name('busqueda.index');
        
        //Estadistica
        Route::post('/registrar-descarga/{tipoDescarga}/{archivoId}', [ App\Http\Controllers\DescargasController::class,'registrarDescarga' ])->name('registrar.descarga');
    });