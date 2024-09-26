<?php

namespace App\Domain;

class Contrato
{
    public $codigo;
    public $prazo;
    public $valor;
    public $data_inclusao;
    public $convenio_servico;

    public function __construct($codigo, $prazo, $valor, $data_inclusao, $convenio_servico)
    {
        $this->codigo = $codigo;
        $this->prazo = $prazo;
        $this->valor = $valor;
        $this->data_inclusao = $data_inclusao;
        $this->convenio_servico = $convenio_servico;
    }
}
