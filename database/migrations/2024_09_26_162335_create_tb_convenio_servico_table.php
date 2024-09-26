<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbConvenioServicoTable extends Migration // Renomeie para CreateTbConvenioServicoTable
{
    public function up()
    {
        Schema::create('tb_convenio_servico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('servico');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_convenio_servico');
    }
}
