<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('NOME')->nullable();
            $table->string('EMAIL')->nullable();
            $table->string('TELEFONE')->nullable();
            $table->string('CELULAR')->nullable();
            $table->string('CEP')->nullable();
            $table->string('NUMERO')->nullable();
            $table->string('ENDERECO')->nullable();
            $table->string('BAIRRO')->nullable();
            $table->string('CIDADE')->nullable();
            $table->string('COMPLEMENTO')->nullable();
            $table->string('PONTOREFERENCIA')->nullable();
            $table->string('LONG')->nullable();
            $table->string('LAT')->nullable();
            $table->string('UF')->nullable();//Estado


            $table->rememberToken();
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
        //
    }
}
