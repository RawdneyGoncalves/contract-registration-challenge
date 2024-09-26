<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContratoController;


Route::get('/contratos', [ContratoController::class, 'index']);
Route::post('/contratos', [ContratoController::class, 'store']);

Route::get('/test', function () {
    return response()->json(['message' => 'Hello World']);
});

Route::get('/', function () {
    return response()->json(['message' => 'API is working'], 200);
});

