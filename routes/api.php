<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriaController;
use App\Http\Controllers\IngatlanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/kategoriak', [KategoriaController::class, 'index']);

Route::get('/ingatlanok', [IngatlanController::class, 'index']);
Route::post('/ingatlanok', [IngatlanController::class, 'store']);

Route::delete('/ingatlanok/{id}', [IngatlanController::class, 'torles']);
Route::get('/ingatlanok/{id}', [IngatlanController::class, 'show']);