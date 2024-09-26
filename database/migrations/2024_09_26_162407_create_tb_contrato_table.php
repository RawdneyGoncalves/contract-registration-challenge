<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbContratoTable extends Migration
{
    public function up()
    {
        Schema::create('tb_contrato', function (Blueprint $table) {
            $table->bigIncrements('codigo');
            $table->integer('prazo');
            $table->decimal('valor', 10, 2);
            $table->date('data_inclusao');
            $table->unsignedBigInteger('convenio_servico'); 

            $table->foreign('convenio_servico')->references('codigo')->on('tb_convenio_servico')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_contrato');
    }
}
