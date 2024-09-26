<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\ContratoController;

Route::get('/contratos', [ContratoController::class, 'index']);
 
Route::get('/', function () {
    return response()->json(['message' => 'Hello World']);
});
