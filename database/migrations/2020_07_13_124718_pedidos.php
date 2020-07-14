<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('PEDIDOS_JSON')->nullable();//PRODUTOS ADICIONADO EM FORMATO JSON
            $table->string('ID_CLIENTE')->nullable();
            $table->string('NOME_CLIENTE')->nullable();
            $table->string('TELEFONE1')->nullable();
            $table->string('TELEFONE2')->nullable();
            $table->string('ENDERECO')->nullable();
            $table->string('BAIRRO')->nullable();
            $table->string('CIDADE')->nullable();
            $table->string('UF')->nullable();
            $table->string('CEP')->nullable();
            $table->string('CPF')->nullable();
            $table->string('LONG')->nullable();
            $table->string('LAT')->nullable();
            $table->string('FORMA_PAGAMENTO')->nullable();
            $table->string('VALOR_TOTAL')->nullable();
           
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
