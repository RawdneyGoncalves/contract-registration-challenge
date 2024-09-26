<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConvenioServicoSeeder extends Seeder
{
    public function run()
    {
        if (!DB::table('tb_banco')->where('codigo', 'BANCO_01')->exists()) {
            DB::table('tb_banco')->insert([
                'codigo' => 'BANCO_01',
                'nome' => 'Banco do Brasil',
            ]);
        }

        if (!DB::table('tb_convenio')->where('codigo', 'CONVENIO_01')->exists()) {
            DB::table('tb_convenio')->insert([
                [
                    'codigo' => 'CONVENIO_01',
                    'convenio' => 'Nome do Convenio',
                    'verba' => 1000.00,
                    'banco' => 'BANCO_01',
                ],
            ]);
        }

        if (!DB::table('tb_convenio_servico')->where('codigo', 1)->exists()) {
            DB::table('tb_convenio_servico')->insert([
                [
                    'codigo' => 1,
                    'nome' => 'Convenio A',
                    'servico' => 'Servico A',
                    'convenio' => 'CONVENIO_01',
                ],
            ]);
        }
    }
}
