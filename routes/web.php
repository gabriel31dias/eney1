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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/openloja', 'HomeController@openloja')->name('openloja');


Route::get('/home', 'HomeController@index')->name('home2');



Route::get('/abreloja/{code?}', 'AberturaFechamentoController@abreloja')->name('abreloja');
Route::get('/fechaloja/{code?}', 'AberturaFechamentoController@fechaloja')->name('fechaloja');


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
Route::post('/formaspg/save','FormaController@create')->middleware('auth')->name("formaspgsave");
Route::get('/formaspg/list/{iduser?}','FormaController@list')->middleware('auth')->name("formaspglist");
Route::get('/formaspg/ativa/{id?}','FormaController@ativa')->middleware('auth')->name("formaspgativa");
Route::get('/formaspg/inativa/{id?}','FormaController@inativa')->middleware('auth')->name("formasinativa");
Route::get('/formaspg/testetoggle/{id?}','FormaController@inativado_ou_ativado')->middleware('auth')->name("testex");
Route::get('/formaspg/destroy/{id?}','FormaController@destroy')->middleware('auth')->name("formaspgdestroy");



///----Rotas Produtos
//-------Rota img produto
Route::get('/img/{id?}','ProdutosController@img')->middleware('auth')->name("img");
Route::get('/produtos','ProdutosController@index')->middleware('auth')->name("produtos");
Route::get('/produtoseditview/{id?}','ProdutosController@editview')->middleware('auth')->name("editview");
Route::post('/produtossave','ProdutosController@save')->middleware('auth')->name("produtossave");
Route::get('/produtositem/{idproduto?}','ProdutosController@item')->middleware('auth')->name("produtositem");
Route::get('/produtoslist','ProdutosController@list')->middleware('auth')->name("produtoslist");
Route::get('/produtosdelete/{id?}','ProdutosController@delete')->middleware('auth')->name("produtosdelete");
Route::get('/produtoslistformat','ProdutosController@listformatada')->middleware('auth')->name("produtoslistformat");
Route::post('/produtosupdate','ProdutosController@update')->middleware('auth')->name("produtosupdate");



///----Rotas Opcoes
Route::get('/opcoes','OpcoesController@index')->middleware('auth')->name("opcoes");////???
Route::post('/opcoes/save','OpcoesController@save')->middleware('auth')->name("opcoessave");////???
Route::get('/opcoes','OpcoesController@list')->middleware('auth')->name("opcoeslist");////???



//-------Rota grupos
Route::get('/grupos','GruposController@index')->middleware('auth')->name("grupos");
Route::post('/grupos/save','GruposController@save')->middleware('auth')->name("grupossave");
Route::get('/grupos/list','GruposController@list')->middleware('auth')->name("gruposlist");
Route::get('/grupos/delete/{id?}','GruposController@delete')->middleware('auth')->name("deletegrupo");
Route::get('/grupos/edit/{id?}','GruposController@delete')->middleware('auth')->name("deletegrupo");
Route::get('/grupos/item/{id?}','GruposController@item')->middleware('auth')->name("grupoitem");





///----Rotas do app que vai pra loja do estabelecimento

Route::get('/app','AppController@index')->name("lojas");//??
Route::get('/app/loja/{codigo_estab?}/{grupo?}','AppController@getloja')->name("get_loja");//??
Route::get('/app/produtos/{cod_estab?}','EstabelecimentosController@allproducts')->name("products_loja");
Route::get('/app/carrinho/{lojacode?}','CarrinhoController@index')->name("carrinho");
Route::post('/app/addproduto','CarrinhoController@add_produto')->name("add_produto");
Route::get('/app/add_adicional/{idproduto?}/{idadicional?}/{qtdadicional?}','CarrinhoController@add_adicional')->name("add_adicional");
//---teste
Route::get('/app/settotal','CarrinhoController@set_total')->name("set_total");
Route::get('/app/removeitemcarrinho/{code?}','CarrinhoController@removeproduct')->name("removeproduct");
Route::get('/app/searchproduto/{lojacode?}/{nomeproduto?}','AppController@searchproduto')->name("searchproduto");

Route::get('/app/gettotal/','CarrinhoController@gettotal')->name("gettotal");
Route::get('/app/removefotosall','CarrinhoController@removefotosall()')->name("removefotosall()");

Route::get('/app/setretiradalocal/{valor?}','CarrinhoController@setretiradalocal')->name("setretirada");
Route::post('/app/savevenda/{valor?}','CarrinhoController@savevenda')->name("savevenda");

Route::get('/app/verificacarrinho','CarrinhoController@verificasetemprodutos_nocarrinho')->name("verificacarrinho");
Route::get('/app/listteste','CarrinhoController@listteste')->name("listteste");

Route::get('/app/getformasdepagamento/{iduser?}','CarrinhoController@getformasdepagamento')->name("getformasdepagamento");






///----Rotas Config
Route::get('/config','ConfigController@index')->middleware('auth')->name("config");
Route::get('config/save','ConfigController@save')->middleware('auth')->name("configsave");
Route::post('config/update/image/','ConfigController@update_foto')->middleware('auth')->name("updateimage");


//-------Rota Adicionais
Route::get('/adicionais','AdicionaisController@index')->middleware('auth')->name("adicionais");
Route::post('/adicionais/save','AdicionaisController@save')->middleware('auth')->name("adicionaissave");
Route::get('/adicionais/list','AdicionaisController@list')->middleware('auth')->name("adicionaislist");
Route::get('/adicionais/delete/{id?}','AdicionaisController@delete')->middleware('auth')->name("adcionaisdelete");
Route::get('/adicionais/edit/{id?}','AdicionaisController@edit')->middleware('auth')->name("adicionaisedit");
Route::post('/adicionais/update/','AdicionaisController@update')->middleware('auth')->name("adicionaisupdate");
Route::get('/adicionais/item/{id?}','AdicionaisController@item')->middleware('auth')->name("adicionaisitem");


Route::get('/adicionaisindex/{idproduto?}','AdicionadoController@index')->middleware('auth')->name("addindex");
Route::get('/adicionados/{idproduto?}','AdicionadoController@adicionados')->name("addsearch");
Route::get('/getadicionais/{idproduto?}','AdicionadoController@getadicionais')->name("getadicionais");

Route::get('/addadicionalaoproduto/{idproduto?}/{idadicional?}','AdicionadoController@addadicionalaoproduto')->middleware('auth')->name("addadicionalaoproduto");
Route::get('/adicionado/delete/{id?}/{idproduto?}','AdicionadoController@destroy')->middleware('auth')->name("adcionadodelete");



///-----Vendas
Route::get('/vendas','VendaController@index')->middleware('auth')->name("vendas");
Route::get('/vendas/list','VendaController@listvendas')->middleware('auth')->name("listvendas");
Route::get('/vendas/searchbyname/{params?}','VendaController@search_nome')->middleware('auth')->name("search_nome");
Route::get('/vendas/searchentregue/{params?}','VendaController@searchentregue')->middleware('auth')->name("searchentregue");
Route::get('/vendas/searchnaoentregue/{params?}','VendaController@searchnaoentregue')->middleware('auth')->name("searchnaoentregue");
Route::get('/vendas/searchbairro/{params?}','VendaController@searchbairro')->middleware('auth')->name("searchbairro");
Route::get('/vendas/searchrua/{params?}','VendaController@searchrua')->middleware('auth')->name("searchrua");
Route::get('/vendas/searchnumero/{params?}','VendaController@searchnumero')->middleware('auth')->name("searchnumero");



Route::get('/vendas/telefone/{params?}','VendaController@searchtelefone')->middleware('auth')->name("searchtelefone");
Route::get('/vendas/getproductsjson/{id?}','VendaController@getproductsjson')->middleware('auth')->name("getproductsjson");



















