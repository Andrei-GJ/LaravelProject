<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;

Route::middleware('guest')->group(function () {
    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
});

Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');

Auth::routes();

Route::get('/registrarPaciente', function () {
    return view('registrarPaciente');
})->name('registrarPaciente.get');

Route::post('/pacientes', [\App\Http\Controllers\Api\PacienteController::class, 'store'])->name('pacientes.store');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
    Route::get('/pacientes/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
    Route::put('/pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');
    Route::delete('/pacientes/{paciente}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('paciente.get');
Route::get('/registrarPaciente', [PacienteController::class, 'create'])->name('registrarPaciente.get');
Route::post('/registrarPaciente', [PacienteController::class, 'store'])->name('registrarPaciente.post');