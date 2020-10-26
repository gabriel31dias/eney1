<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();

            $table->longText('produtos_array')->nullable();
            $table->decimal('preco_total_adicionais', 10, 2)->nullable();
            $table->decimal('preco_total_produto', 10, 2)->nullable(); ////SOMA TODOS OS PRODUTOS + ADICIONAIS
            $table->longText('venda_json')->nullable();
            $table->decimal('preco_total_entrega', 10, 2)->nullable();
            $table->decimal('valor_total', 10, 2)->nullable();
            $table->string('tiporetirada')->nullable(); //array
            $table->string('cod_venda_web')->unique();
            //--------Endereco e contatos
            $table->string('numerotelefone')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('ID_USER')->nullable();
            $table->string('nomecliente')->nullable();
            $table->string('endereco')->nullable(); 
            $table->string('cep')->nullable(); 
            $table->string('numero')->nullable(); 
            $table->string('complemento')->nullable(); 
            $table->string('pontoreferencia')->nullable(); 
            $table->string('bairro')->nullable(); 
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->boolean('entregagratis')->nullable();
            $table->integer('quantidade')->nullable();
            $table->decimal('troco', 10, 2)->nullable();
            $table->string('forma')->nullable();  //Forma pagamento
            $table->boolean('statuspvenda')->nullable(); //true entregue //false pendente
            $table->boolean('statuspvenda_pg')->nullable(); //true pagamento ok //false pagamento nao concluido
            $table->boolean('vendas_received')->nullable(); //campo para saber se o cliente recebeu a venda
            
           
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
