<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Adicionais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicionais', function (Blueprint $table) {
            $table->id();
            $table->integer('CODIGO_SISTEMA');
            $table->string('ADICIONAL')->nullable();//PRODUTOS ADICIONADO EM FORMATO JSON
            $table->integer('CODIGOADICIONAL')->nullable();//Codigo adicional no sistema
            $table->integer('ID_USER')->nullable();
            $table->decimal('PRECO', 10, 2)->nullable();

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
