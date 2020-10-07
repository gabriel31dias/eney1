<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OpcoesProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcoes', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_USER');//PRODUTOS ADICIONADO EM FORMATO JSON
            $table->string('DESCROPT')->nullable();
            $table->longText('CAMPOSOPCOES')->nullable();
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
