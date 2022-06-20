<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\TransacaoController;
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

Route::post('/transacao/{user}/{livro}', [TransacaoController::class, 'store']);
Route::get('/transacao/find-user', [TransacaoController::class, 'findUsuer']);
Route::get('/transacao/find-book', [TransacaoController::class, 'findBook']);
