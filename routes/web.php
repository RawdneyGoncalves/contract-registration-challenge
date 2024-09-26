<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\ContratoController;

Route::get('/contratos', [ContratoController::class, 'index']);
