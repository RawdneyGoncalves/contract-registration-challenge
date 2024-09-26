<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Controllers\ContratoController;
use App\UseCases\ListarContratosUseCase;
use Illuminate\Http\JsonResponse;
use PHPUnit\Framework\MockObject\MockObject;

class ContratoControllerTest extends TestCase
{
    public function test_index_deve_retornar_contratos()
    {
        /** @var ListarContratosUseCase|MockObject $listarContratosUseCaseMock */
        $listarContratosUseCaseMock = $this->createMock(ListarContratosUseCase::class);

        $contratosMock = [
            (object)[
                'nome_banco' => 'Banco A',
                'verba' => 10000,
                'codigo_contrato' => 1,
                'data_inclusao' => '2023-01-01',
                'valor' => 5000,
                'prazo' => 12,
            ],
        ];

        $listarContratosUseCaseMock->method('execute')->willReturn($contratosMock);

        $contratoController = new ContratoController($listarContratosUseCaseMock);
        
        $response = $contratoController->index();

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertCount(1, $response->getData());
    }
}
