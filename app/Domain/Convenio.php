<?php

namespace App\Domain;

class Convenio
{
    public $codigo;
    public $convenio;
    public $verba;
    public $banco;

    public function __construct($codigo, $convenio, $verba, $banco)
    {
        $this->codigo = $codigo;
        $this->convenio = $convenio;
        $this->verba = $verba;
        $this->banco = $banco;
    }
}
