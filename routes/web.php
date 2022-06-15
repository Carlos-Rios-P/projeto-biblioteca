<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout.main');
});

Route::prefix('/usuario')->group( function() {
    Route::get('/index', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('/cadastrar', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::post('/store', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('/editar/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::get('/{id}', [UsuarioController::class, 'show'])->name('usuario.show');
    Route::put('/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::delete('/{id}', [UsuarioController::class, 'destroy'])->name('usuario.delete');
});

Route::prefix('/livro')->group( function() {
    Route::get('/index', [LivroController::class, 'index'])->name('livro.index');
    Route::get('/cadastrar', [LivroController::class, 'create'])->name('livro.create');
    Route::post('/store', [LivroController::class, 'store'])->name('livro.store');
    Route::get('/{id}', [LivroController::class, 'show'])->name('livro.show');
    Route::get('/editar/{id}', [LivroController::class, 'edit'])->name('livro.edit');
    Route::put('/{id}', [LivroController::class, 'update'])->name('livro.update');
    Route::delete('/{id}', [LivroController::class, 'destroy'])->name('livro.delete');
});
