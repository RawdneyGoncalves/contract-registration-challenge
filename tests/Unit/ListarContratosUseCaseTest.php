<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Repositories\ContratoRepository;
use App\UseCases\ListarContratosUseCase;
use Illuminate\Support\Collection;
use PHPUnit\Framework\MockObject\MockObject;

class ListarContratosUseCaseTest extends TestCase
{
    public function test_listar_contratos_retornar_dados_corretos()
    {
        /** @var ContratoRepository|MockObject $contratoRepositoryMock */
        $contratoRepositoryMock = $this->createMock(ContratoRepository::class);
        
        $contratosMock = new Collection([
            (object)[
                'nome_banco' => 'Banco A',
                'verba' => 10000.00,
                'codigo_contrato' => 1,
                'data_inclusao' => '2023-01-01',
                'valor' => 5000.00,
                'prazo' => 12,
            ],
            (object)[
                'nome_banco' => 'Banco B',
                'verba' => 20000.00,
                'codigo_contrato' => 2,
                'data_inclusao' => '2023-02-01',
                'valor' => 15000.00,
                'prazo' => 24,
            ],
        ]);

        $contratoRepositoryMock->method('listarContratos')->willReturn($contratosMock);

        $listarContratosUseCase = new ListarContratosUseCase($contratoRepositoryMock);
        
        $result = $listarContratosUseCase->execute();

        $this->assertCount(2, $result);
        $this->assertEquals('Banco A', $result[0]->nome_banco);
        $this->assertEquals(10000.00, $result[0]->verba);
        $this->assertEquals(1, $result[0]->codigo_contrato);
        $this->assertEquals('Banco B', $result[1]->nome_banco);
        $this->assertEquals(20000.00, $result[1]->verba);
        $this->assertEquals(2, $result[1]->codigo_contrato);
    }
}
