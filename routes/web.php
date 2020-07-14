<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



///----Rotas clientes
Route::get('/clientes','ClienteController@index')->middleware('auth')->name("clientes");
Route::get('/clientesall','ClienteController@getall')->middleware('auth')->name("clientesall");
Route::get('/clientes/search_id/{id?}','ClienteController@search_id')->middleware('auth')->name("search_id_cliente");
Route::post('/clientessave','ClienteController@save')->middleware('auth')->name("clientes_save");
Route::get('/clientes/search_name_like/{param?}','ClienteController@search_name_like')->middleware('auth')->name("search_nome_cliente");
Route::get('/clientes/search_razao_like/{param?}','ClienteController@search_razao_like')->middleware('auth')->name("search_razao_cliente");
Route::get('/clientes/search_cpf_cnpj_like/{param?}','ClienteController@search_cpf_cnpj_like')->middleware('auth')->name("search_cpf_cnpj_like");
Route::get('/clientes/search_cidade/{param?}','ClienteController@search_cidade')->middleware('auth')->name("search_cidade");
Route::get('/clientes/search_endereco/{param?}','ClienteController@search_endereco')->middleware('auth')->name("search_endereco");
Route::get('/clientes/search_telefone/{param?}','ClienteController@search_telefone')->middleware('auth')->name("search_telefone");
Route::get('/clientes/search_bairro/{param?}','ClienteController@search_bairro')->middleware('auth')->name("search_bairro");






///----Rotas formas de pagamento
Route::get('/formaspg','FormaController@index')->middleware('auth')->name("formaspg");


///----Rotas Produtos
//-------Rota img produto
Route::get('/img/{id?}','ProdutosController@img')->middleware('auth')->name("img");
Route::get('/produtos','ProdutosController@index')->middleware('auth')->name("produtos");
Route::get('/produtoseditview/{id?}','ProdutosController@editview')->middleware('auth')->name("editview");
Route::post('/produtossave','ProdutosController@save')->middleware('auth')->name("produtossave");
Route::get('/produtoslist','ProdutosController@list')->middleware('auth')->name("produtoslist");
///----Rotas Opcoes
Route::get('/opcoes','OpcoesController@index')->middleware('auth')->name("opcoes");////???
Route::post('/opcoes/save','OpcoesController@save')->middleware('auth')->name("opcoessave");////???
Route::get('/opcoes','OpcoesController@list')->middleware('auth')->name("opcoeslist");////???



//-------Rota grupos
Route::get('/grupos','GruposController@index')->middleware('auth')->name("grupos");
Route::post('/grupos/save','GruposController@save')->middleware('auth')->name("grupossave");
Route::get('/grupos/list','GruposController@list')->middleware('auth')->name("gruposlist");





///----Rotas do app que vai pra loja do estabelecimento

Route::get('/app/{codigo_estab}','EstabelecimentosController@index')->middleware('auth')->name("app_estabelecimento");//??
Route::get('/app/lojas/','EstabelecimentosController@all')->middleware('auth')->name("all_app");//??
Route::get('/app/produtos/{cod_estab?}','EstabelecimentosController@allproducts')->middleware('auth')->name("products_loja");




















