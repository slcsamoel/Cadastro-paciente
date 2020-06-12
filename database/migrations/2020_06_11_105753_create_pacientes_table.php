<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf',20);
            $table->string('nome',100);
            $table->string('rg',20);
            $table->string('cartaoSus',20);
            $table->string('sexo',20);
            $table->date('nascimento');
            $table->integer('idade');
            $table->string('mae',100);
            $table->string('telefone',20);
            $table->string('cep',20);
            $table->string('logradouro',60);
            $table->integer('numero');
            $table->string('quadra',10);
            $table->integer('lote');
            $table->string('complemento',60);
            $table->string('bairro',40);
            $table->string('cidade',40);
            $table->string('uf',2);
            $table->integer('status',1)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
