<?php

namespace App\UseCases;

use App\Repositories\ContratoRepository;

class CriarContratoUseCase
{
    private $contratoRepository;

    public function __construct(ContratoRepository $contratoRepository)
    {
        $this->contratoRepository = $contratoRepository;
    }

    /**
     *
     * @param array $data
     * @return int
     */
    public function execute(array $data)
    {
        return $this->contratoRepository->criarContrato($data);
    }
}
