<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Conf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_USER');//
            $table->string('NOME_LOJA')->nullable();//Nome da loja que vai aparecer no app
            $table->string('COR1')->nullable();//Nome da loja que vai aparecer no app
            $table->string('COR2')->nullable();//Nome da loja que vai aparecer no app
            $table->string('COR3')->nullable();//Nome da loja que vai aparecer no app
            $table->string('FORMA_PAGAMENTO')->nullable(); //Forma de pagamento padrão
            $table->string('ENVIO_WHATS')->nullable(); //COR DO APP
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
