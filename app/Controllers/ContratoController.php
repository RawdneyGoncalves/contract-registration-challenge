<?php

namespace App\Controllers;

use App\UseCases\ListarContratosUseCase;
use Illuminate\Http\JsonResponse;

class ContratoController
{
    private $listarContratosUseCase;

    public function __construct(ListarContratosUseCase $listarContratosUseCase)
    {
        $this->listarContratosUseCase = $listarContratosUseCase;
    }

    public function index(): JsonResponse
    {
        $contratos = $this->listarContratosUseCase->execute();
        return response()->json($contratos);
    }
}
