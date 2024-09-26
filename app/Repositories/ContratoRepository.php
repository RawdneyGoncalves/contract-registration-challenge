<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ContratoRepository
{
    public function listarContratos()
    {
        return DB::table('tb_contrato')
            ->join('tb_convenio_servico', 'tb_contrato.convenio_servico', '=', 'tb_convenio_servico.codigo')
            ->join('tb_convenio', 'tb_convenio_servico.convenio', '=', 'tb_convenio.codigo')
            ->join('tb_banco', 'tb_convenio.banco', '=', 'tb_banco.codigo')
            ->select(
                'tb_banco.nome as nome_banco',
                'tb_convenio.verba as verba',
                'tb_contrato.codigo as codigo_contrato',
                'tb_contrato.data_inclusao as data_inclusao',
                'tb_contrato.valor as valor',
                'tb_contrato.prazo as prazo'
            )
            ->groupBy('tb_banco.nome', 'tb_convenio.verba', 'tb_contrato.codigo', 'tb_contrato.data_inclusao', 'tb_contrato.valor', 'tb_contrato.prazo')
            ->get();
    }
}
