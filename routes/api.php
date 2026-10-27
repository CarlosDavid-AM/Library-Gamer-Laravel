<?php

use App\Http\Controllers\JuegosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('juegos', [JuegosController::class, 'getAllGames']);
Route::get('juegos/{id}', [JuegosController::class, 'getGameById']);
Route::post('juegos', [JuegosController::class, 'saveGame']);
Route::put('juegos/{id}', [JuegosController::class, 'updateGame']);
Route::delete('juegos/{id}', [JuegosController::class, 'deleteGame']);
