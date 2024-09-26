<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbConvenioServicoTable extends Migration
{
    public function up()
    {
        Schema::create('tb_convenio_servico', function (Blueprint $table) {
            $table->bigIncrements('codigo');
            $table->string('servico');
            $table->string('convenio'); 

            $table->foreign('convenio')->references('codigo')->on('tb_convenio')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_convenio_servico');
    }
}
