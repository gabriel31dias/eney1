<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produtos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->integer('CODIGO_SISTEMA')->nullable();
            $table->integer('CODIGO_SISTEMA_GRUPO')->nullable();
            $table->integer('ID_USER');//PRODUTOS ADICIONADO EM FORMATO JSON
            $table->string('NOME_PRODUTO')->nullable();//PRODUTOS ADICIONADO EM FORMATO JSON
            $table->string('DESCR')->nullable(); //Descrição no app
            $table->string('QUANTIDADE_ESTOQUE')->nullable();
            $table->string('CFOP')->nullable();
            $table->string('ICMS')->nullable();
            $table->string('NOME_GRUPO')->nullable();
            $table->longText('IMG')->nullable();
            $table->longText('IMG2')->nullable();
            $table->longText('IMG3')->nullable();
            $table->longText('IMG4')->nullable();
            $table->string('TIPO_PRODUTO')->nullable();
            $table->boolean('PROMOCAO')->nullable();
            $table->decimal('PRECO_PROMOCAO', 10, 2)->nullable();
            $table->dateTime('DATA_INICIO_PROMOCAO')->nullable();
            $table->dateTime('DATA_FINAL_PROMOCAO')->nullable();
            $table->decimal('PRECO_UNIT', 10, 2)->nullable();
            $table->decimal('PRECO_CUSTO', 10, 2)->nullable();
            $table->string('DESCONTO')->nullable();
            $table->string('CST')->nullable();
            $table->string('NCM')->nullable();
            $table->string('CODIGO_ESTABELECIMENTO')->nullable();
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
