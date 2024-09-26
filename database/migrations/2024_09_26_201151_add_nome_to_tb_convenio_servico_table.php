<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomeToTbConvenioServicoTable extends Migration
{
    public function up()
    {
        Schema::table('tb_convenio_servico', function (Blueprint $table) {
            $table->string('nome')->after('codigo'); 
        });
    }

    public function down()
    {
        Schema::table('tb_convenio_servico', function (Blueprint $table) {
            $table->dropColumn('nome');
        });
    }
}

