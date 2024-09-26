<?php

namespace App\Controllers;

use App\UseCases\ListarContratosUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="API de Contratos",
 *     version="1.0",
 *     description="API para gerenciamento de contratos."
 * )
 * @OA\Server(url="http://localhost:8000")
 */
class ContratoController extends BaseController
{
    private $listarContratosUseCase;

    public function __construct(ListarContratosUseCase $listarContratosUseCase)
    {
        $this->listarContratosUseCase = $listarContratosUseCase;
    }

    /**
     * @OA\Get(
     *     path="/contratos",
     *     summary="Listar contratos",
     *     description="Retorna uma lista de contratos.",
     *     @OA\Response(response="200", description="Lista de contratos retornada com sucesso"),
     *     @OA\Response(response="404", description="Contratos não encontrados"),
     * )
     */

    public function index(): JsonResponse
    {
        $contratos = $this->listarContratosUseCase->execute();
        return response()->json($contratos);
    }
}
