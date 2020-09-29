<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_user')->nullable();// dono de loja = 1 , usuario no site = 2, super usuario = 3
            $table->string('name');
            $table->string('email')->unique();
            $table->string('nome_estabelecimento')->nullable();
            $table->string('nome_repre')->nullable();
            $table->string('codigo_estabelecimento')->nullable();///Esse Código vai ser o código para entrar na loja do app
            $table->string('cnpj')->nullable();
            $table->string('tem_sis')->nullable();
            $table->string('plano')->nullable();
            $table->string('telefone1')->nullable();
            $table->string('telefone2')->nullable();
            $table->longText('imagem_loja')->nullable();
            $table->string('status_at')->nullable();//aberta ou fechada
            $table->string('tipo_op')->nullable();///Tipo operacional loja 1 abertura e fechamento manul,2 aberta sempre, 3 definir horario
            $table->timestamp('email_verified_at')->nullable();
            $table->string('COR1')->nullable();//Nome da loja que vai aparecer no app
            $table->string('COR2')->nullable();//Nome da loja que vai aparecer no app
            $table->string('COR3')->nullable();//Nome da loja que vai aparecer no app
            $table->string('password');
            $table->integer('fpagamentoeletronico')->default(1)->nullable();//code 1 para cielo ,2 para rede
            $table->longText('apismscliente');
            $table->time('horarioinicio')->nullable();
            $table->time('horariofinal')->nullable();
            $table->string('cielocode')->nullable();
            $table->string('redecode')->nullable();
            $table->decimal('MINIMOPRECOENTREGAGRATIS', 10, 2)->nullable();
            $table->decimal('PRECOENTREGA', 10, 2)->nullable();
            ///REDES SOCIAIS
            $table->string('TWITTER')->nullable();//aberta ou fechada
            $table->string('FACEBOOK')->nullable();//aberta ou fechada
            $table->string('YOUTUBE')->nullable();//aberta ou fechada
            $table->string('INSTAGRAM')->nullable();//aberta ou fechada
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
        Schema::dropIfExists('users');
    }
}
