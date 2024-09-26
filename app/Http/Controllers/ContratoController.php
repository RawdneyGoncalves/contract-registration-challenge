<?php

namespace App\Http\Controllers;

use App\UseCases\ListarContratosUseCase;
use App\UseCases\CriarContratoUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="API de Contratos",
 *     version="1.0",
 *     description="API para gerenciamento de contratos, convênios, serviços e bancos."
 * )
 * @OA\Server(url="http://localhost:8000")
 * 
 * @OA\Schema(
 *     schema="Contrato",
 *     type="object",
 *     title="Contrato",
 *     required={"prazo","valor","data_inclusao","convenio_servico"},
 *     @OA\Property(
 *         property="prazo",
 *         type="integer",
 *         description="Prazo do contrato em meses",
 *         example=12
 *     ),
 *     @OA\Property(
 *         property="valor",
 *         type="number",
 *         format="float",
 *         description="Valor do contrato",
 *         example=5000.00
 *     ),
 *     @OA\Property(
 *         property="data_inclusao",
 *         type="string",
 *         format="date",
 *         description="Data de inclusão do contrato",
 *         example="2023-01-01"
 *     ),
 *     @OA\Property(
 *         property="convenio_servico",
 *         type="integer",
 *         description="Código do convênio serviço",
 *         example=1
 *     )
 * )
 */
class ContratoController extends BaseController
{
    private $listarContratosUseCase;
    private $criarContratoUseCase;

    public function __construct(ListarContratosUseCase $listarContratosUseCase, CriarContratoUseCase $criarContratoUseCase)
    {
        $this->listarContratosUseCase = $listarContratosUseCase;
        $this->criarContratoUseCase = $criarContratoUseCase;
    }

    /**
     * @OA\Get(
     *     path="/api/contratos",
     *     tags={"Contratos"},
     *     summary="Listar contratos",
     *     description="Retorna uma lista de contratos.",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de contratos retornada com sucesso",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="nome_banco", type="string", example="Banco A"),
     *                 @OA\Property(property="verba", type="number", example=10000.00),
     *                 @OA\Property(property="codigo_contrato", type="integer", example=1),
     *                 @OA\Property(property="data_inclusao", type="string", format="date", example="2023-01-01"),
     *                 @OA\Property(property="valor", type="number", example=5000.00),
     *                 @OA\Property(property="prazo", type="integer", example=12)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Contratos não encontrados"
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $contratos = $this->listarContratosUseCase->execute();
        return response()->json($contratos);
    }

    /**
     * @OA\Post(
     *     path="/api/contratos",
     *     tags={"Contratos"},
     *     summary="Criar um contrato",
     *     description="Cria um novo contrato.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Contrato")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Contrato criado com sucesso",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="codigo", type="integer", example=1),
     *             @OA\Property(property="prazo", type="integer", example=12),
     *             @OA\Property(property="valor", type="number", example=5000.00),
     *             @OA\Property(property="data_inclusao", type="string", format="date", example="2023-01-01"),
     *             @OA\Property(property="convenio_servico", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Dados inválidos"
     *     )
     * )
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'prazo' => 'required|integer',
            'valor' => 'required|numeric',
            'data_inclusao' => 'required|date',
            'convenio_servico' => 'required|integer|exists:tb_convenio_servico,codigo',
        ]);

        $codigo = $this->criarContratoUseCase->execute($validated);

        return response()->json([
            'codigo' => $codigo,
            'prazo' => $validated['prazo'],
            'valor' => $validated['valor'],
            'data_inclusao' => $validated['data_inclusao'],
            'convenio_servico' => $validated['convenio_servico'],
        ], 201);
    }
}
