<?php

namespace App\Domain;

class Banco
{
    public $codigo;
    public $nome;

    public function __construct($codigo, $nome)
    {
        $this->codigo = $codigo;
        $this->nome = $nome;
    }
}
