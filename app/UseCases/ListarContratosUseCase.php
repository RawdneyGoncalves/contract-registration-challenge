<?php

namespace App\UseCases;

use App\Repositories\ContratoRepository;

class ListarContratosUseCase
{
    private $contratoRepository;

    public function __construct(ContratoRepository $contratoRepository)
    {
        $this->contratoRepository = $contratoRepository;
    }

    /**
     *
     * @return \Illuminate\Support\Collection
     */
    public function execute()
    {
        return $this->contratoRepository->listarContratos();
    }
}
