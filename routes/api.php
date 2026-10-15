<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BeneficiarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Endpoint de registro de beneficiarios solicitado
Route::post('/registro-beneficiarios', [BeneficiarioController::class, 'store']);

// Ruta adicional para consultar los registros existentes
Route::get('/beneficiarios', [BeneficiarioController::class, 'index']);