<?php

use App\Http\Controllers\LivroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/livro')->group( function() {
    Route::get('/index', [LivroController::class, 'index']);
    Route::post('/store', [LivroController::class, 'store']);
    Route::get('/{id}', [LivroController::class, 'show']);
    Route::put('/{id}', [LivroController::class, 'update']);
    Route::delete('/{id}', [LivroController::class, 'destroy']);
});
