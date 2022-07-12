<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\SignosVitalesController;
use App\Http\Controllers\ExpedientesController;

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


//Ruta para el login por medio de una API
Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);

//Rutas para hacer peticiones a la API de Signos Vitales
Route::get('/signosvitales', [SignosVitalesController::class, 'index']);
Route::post('/signosvitales', [SignosVitalesController::class, 'store']);
Route::get('/signosvitales/{id}', [SignosVitalesController::class, 'show']);
Route::put('/signosvitales/{id}', [SignosVitalesController::class, 'update']);
Route::delete('/signosvitales/{id}', [SignosVitalesController::class, 'destroy']);
//Rutas para hacer peticiones a la API de Expedientes
Route::get('/expedientes', [ExpedientesController::class, 'index']);
Route::post('/expedientes', [ExpedientesController::class, 'store']);
Route::get('/expedientes/{id}', [ExpedientesController::class, 'show']);
Route::put('/expedientes/{id}', [ExpedientesController::class, 'update']);
Route::delete('/expedientes/{id}', [ExpedientesController::class, 'destroy']);
