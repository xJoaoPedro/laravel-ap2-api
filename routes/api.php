<?php

use App\Http\Controllers\HeroiController;
use App\Http\Controllers\VilaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/heroi', [HeroiController::class, 'listar']);
Route::post('/heroi', [HeroiController::class, 'criar']);
Route::put('/heroi/{id}', [HeroiController::class, 'editar']);
Route::delete('/heroi/{id}', [HeroiController::class, 'excluir']);
Route::get('/heroi/{id}', [HeroiController::class, 'exibirPeloId']);
// ! rotas herois

Route::get('/vilao', [VIlaoController::class, 'listar']);
Route::post('/vilao', [VIlaoController::class, 'criar']);
Route::put('/vilao/{id}', [VIlaoController::class, 'editar']);
Route::delete('/vilao/{id}', [VIlaoController::class, 'excluir']);
Route::get('/vilao/{id}', [VIlaoController::class, 'exibirPeloId']);
// ! rotas viloes