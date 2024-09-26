<?php

namespace App\Domain;

class ConvenioServico
{
    public $codigo;
    public $convenio;
    public $servico;

    public function __construct($codigo, $convenio, $servico)
    {
        $this->codigo = $codigo;
        $this->convenio = $convenio;
        $this->servico = $servico;
    }
}
