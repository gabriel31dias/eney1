<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('ID_USER')->nullable();
            $table->string('NOMECLIENTE')->nullable();
            $table->string('TELEFONE')->nullable();
            $table->string('EMAIL')->nullable();
            $table->string('RUA')->nullable();
            $table->string('BAIRRO')->nullable();
            $table->string('CIDADE')->nullable();
            $table->string('NUMERORESIDENCIA')->nullable();
            $table->string('CEP')->nullable();
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
