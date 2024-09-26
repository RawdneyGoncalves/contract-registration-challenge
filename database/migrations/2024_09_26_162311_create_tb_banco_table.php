<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBancoTable extends Migration
{
    public function up()
    {
        Schema::create('tb_banco', function (Blueprint $table) {
            $table->string('codigo')->primary();
            $table->string('nome');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_banco');
    }
}
