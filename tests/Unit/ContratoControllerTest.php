<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ContratoController;
use App\UseCases\ListarContratosUseCase;
use App\UseCases\CriarContratoUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\MockObject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\ConvenioServicoSeeder;

class ContratoControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(ConvenioServicoSeeder::class);
    }

    public function test_index_deve_retornar_contratos()
    {
        /** @var ListarContratosUseCase|MockObject $listarContratosUseCaseMock */
        $listarContratosUseCaseMock = $this->createMock(ListarContratosUseCase::class);

        $contratosMock = [
            (object)[
                'nome_banco' => 'Banco A',
                'verba' => 10000.00,
                'codigo_contrato' => 1,
                'data_inclusao' => '2024-01-01',
                'valor' => 5000.00,
                'prazo' => 12,
            ],
        ];

        $listarContratosUseCaseMock->method('execute')->willReturn($contratosMock);

        /** @var CriarContratoUseCase|MockObject $criarContratoUseCaseMock */
        $criarContratoUseCaseMock = $this->createMock(CriarContratoUseCase::class);

        $contratoController = new ContratoController($listarContratosUseCaseMock, $criarContratoUseCaseMock);
        
        $response = $contratoController->index();

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertCount(1, $response->getData());
    }

    public function test_store_deve_criar_contrato()
    {
        /** @var CriarContratoUseCase|MockObject $criarContratoUseCaseMock */
        $criarContratoUseCaseMock = $this->createMock(CriarContratoUseCase::class);
    
        $dadosContrato = [
            'prazo' => 12,
            'valor' => 5000.00,
            'data_inclusao' => '2023-01-01',
            'convenio_servico' => 1, 
        ];

        $criarContratoUseCaseMock->method('execute')->with($dadosContrato)->willReturn(1);

    
        /** @var ListarContratosUseCase|MockObject $listarContratosUseCaseMock */
        $listarContratosUseCaseMock = $this->createMock(ListarContratosUseCase::class);
    
        $contratoController = new ContratoController($listarContratosUseCaseMock, $criarContratoUseCaseMock);
    
        $request = new Request($dadosContrato);
        $response = $contratoController->store($request);
    
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(201, $response->getStatusCode());
    
        $responseData = $response->getData();
        $this->assertEquals(1, $responseData->codigo);
        $this->assertEquals(12, $responseData->prazo);
        $this->assertEquals(5000.00, $responseData->valor);
        $this->assertEquals('2023-01-01', $responseData->data_inclusao); 
        $this->assertEquals(1, $responseData->convenio_servico);
    }
}
