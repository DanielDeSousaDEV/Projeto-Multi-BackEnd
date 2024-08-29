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
    Route::get('/patients', 'index');
    Route::post('/patients', 'store');
    Route::get('/patients/{id}', 'show');
    Route::get('/patients/{id}/consults', 'showConsultas');
    Route::patch('/patients/{id}', 'update');
});


Route::controller(ConsultaController::class)->group(function () {
    Route::get('/consults', 'index');
    Route::post('/consults', 'store');
});
 

