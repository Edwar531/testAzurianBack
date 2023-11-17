<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
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

Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::prefix('usuarios')->group(function () {
        Route::resource('clientes', ClienteController::class);
        Route::prefix('clientes')->controller(ClienteController::class)->group(function () {
            Route::post("habilitar/{id}", 'habilitar');
            Route::post("deshabilitar/{id}", 'deshabilitar');
        });
    });
});

