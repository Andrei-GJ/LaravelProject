<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PacienteController;

// Ruta pública para login
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

// Optional: Add a GET route for api/login if needed
Route::get('/login', function () {
    return response()->json(['message' => 'Please use POST to log in.'], 405);
})->name('api.login.get');

// Grupo de rutas protegidas por autenticación JWT
Route::middleware('auth:api')->group(function () {
    // Información del usuario autenticado
    Route::get('/me', [AuthController::class, 'me']);

    // Logout y refresh del token
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

    // CRUD de pacientes
    Route::apiResource('/pacientes', \App\Http\Controllers\Api\PacienteController::class);
});
