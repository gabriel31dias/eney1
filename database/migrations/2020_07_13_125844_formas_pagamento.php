<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FormasPagamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formas', function (Blueprint $table) {
            $table->id();
            $table->string('DESCR_FRM')->nullable();
            $table->string('ID_USER')->nullable();
            $table->string('NOME_FRM')->nullable();
            $table->string('STATUS')->nullable();
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
