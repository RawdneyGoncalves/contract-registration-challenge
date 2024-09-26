<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbConvenioTable extends Migration
{
    public function up()
    {
        Schema::create('tb_convenio', function (Blueprint $table) {
            $table->string('codigo')->primary();
            $table->string('convenio');
            $table->decimal('verba', 10, 2);
            $table->string('banco');

            $table->foreign('banco')->references('codigo')->on('tb_banco')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_convenio');
    }
}
