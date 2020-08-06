<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdicionadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicionados', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_ADICIONAL')->nullable();
            $table->integer('ID_PRODUTO')->nullable();
            $table->string('DESCR_ADICIONAL')->nullable();

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
        Schema::dropIfExists('adicionados');
    }
}
