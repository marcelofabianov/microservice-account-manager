<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_contas', function (Blueprint $table) {
            $table->id('conta_id');
            $table->string('conta_cnpj');
            $table->string('conta_razao_social');
            $table->string('conta_email');
            $table->string('conta_telefone');
            $table->integer('conta_status');
            $table->string('conta_logradouro');
            $table->string('conta_logradouro_numero');
            $table->string('conta_logradouro_complemento');
            $table->dateTime('data_insercao');
            $table->dateTime('data_manutencao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_contas');
    }
};
