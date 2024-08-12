<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PacienteController;

use App\Models\Paciente;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(PacienteController::class)->group(function () {
    Route::get('/pacientes', 'index');
    Route::post('/pacientes', 'store');
    Route::get('/pacientes/{id}', 'show');
    Route::get('/pacientes/{id}/consultas', 'showConsultas');
    Route::patch('/pacientes/{id}', 'update');
});


Route::controller(ConsultaController::class)->group(function () {
    Route::get('/consultas', 'index');
    Route::post('/consultas', 'store');
});
 

