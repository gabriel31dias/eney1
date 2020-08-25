<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Carrinho;
use Illuminate\Http\Request;

use App\User;
use App\Produto;
use App\Config;
use App\Grupo;
use Session;
use DB;
use App\Venda;
use App\Forma;

use ElephantIO\Client as Elephant;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $users;
    private $produtos;
    private $configs;
    private $grupos;
    private $vendas;
    private $formas;

    public function __construct(User $apps, Produto $produtos, Config $con, Grupo $grupos, Venda $vendas,Forma $formas)
    {
        $this->users = $apps;
        $this->produtos = $produtos;
        $this->configs = $con;
        $this->grupos = $grupos;
        $this->vendas = $vendas;
        $this->formas = $formas;
    }

    public function index($codigo = '')
    {
        
        $produtosjson = json_encode(['produtos'=>$this->removefotosall(Session::get('carrinho'))]);
        $iduser = DB::table('users')->where('codigo_estabelecimento', $codigo)->first();
        $iduser = $iduser->id;
        $teste = Session::get('idloja');
        $getvalorentrega = Session::get('entrega');
        $totaladc = Session::get('totaladicionais');
        $status_loja = true;
        $totalemprodutos = Session::get('totalprodutos');
        $adicionaissalvos = Session::get('adicionais');
        $getloja = $this->users->where('codigo_estabelecimento', $codigo)->first();
        $getidloja = '';
        if (isset($getloja->id))
        {
            $getidloja = $getloja->id; // o id da loja e o i do usuario
            
        }

        $getcarrinhoitems = Session::get('carrinho'); //pega seção gravada em navegador
        //var_dump( $getcarrinhoitems );
        //padraoes
        $style = ['color1' => 'black', 'color2' => ''];

        if ($getloja->COR1)
        {
            $style = ['color1' => $getloja->COR1, 'color2' => $getloja->COR2];
        }

        $getgrupos = $this->grupos->where('ID_USER', $getidloja)->paginate(10);

        return view('carrinho', ['totalemprodutos' => $totalemprodutos, 'carrinho' => $getcarrinhoitems, 'style' => $style, 'grupos' => $getgrupos, 'lojacod' => $codigo, 'adicionais' => $adicionaissalvos, 'totaladc' => $totaladc, 'valorentrega' => $getvalorentrega, 'teste' => $teste, 'iduser' => $iduser,'produtosjson'=>$produtosjson]);
    }

    public function add_produto(Request $req)
    {
     $array_cod_adicionais_sistema = []; // array dos codigos do adicionais no sistema

       
        $idproduto = $req->idproduto;
        $nomeproduto = $req->nomeproduto;
        $adicionais = strval($req->adicionais);
        $obs = $req->obs;
        $getlojacode = $req->lojacode;
        $quantidade = $req->quantidade;

        
        
        $getpro = DB::table('produtos')->where('id', $idproduto)->first();
        $get_cod_sist_grupo =  $getpro->NOME_GRUPO;
        $get_cod_sist_grupo = DB::table('grupos')->where('NOME_GRUPO',  $getpro->NOME_GRUPO)->first() ;

        if($get_cod_sist_grupo){ 

             $get_cod_sist_grupo =   $get_cod_sist_grupo->CODIGO_SISTEMA;
             
         }else{
            $get_cod_sist_grupo =  '0';
         }

         $getcfop = $getpro->CFOP;
       

        $tags_adicionais = $req->tagsadicionais;
        $tags_adicionais = implode(", ", $tags_adicionais);

       
        $getpreco_adicionais = null;
        //Codigo interno do sistema
       


        $getcodigoproduto = $getpro->CODIGO_SISTEMA; //Código produto no sistema da versatil

        if(!$getcodigoproduto){
            $getcodigoproduto = 0 ;
        }

        foreach ($adicionais as $value)
        {

            $getad = DB::table('adicionais')->where('id', $value)->first();
            $getprc =  $getad->PRECO;
            $getpreco_adicionais = $getpreco_adicionais + $getprc;

            array_push($array_cod_adicionais_sistema, $getad->CODIGO_SISTEMA);

        }
        $aux = Session::get('totaladicionais');
        $getpreco_adicionais = $getpreco_adicionais * $quantidade;
        Session::put('totaladicionais', $getpreco_adicionais + $aux); ///Salva valor total dos
        $idproduto_gerado =  rand(10, 500000);

        $getpreco = $getpro->PRECO_UNIT;
        $getimg = $getpro->IMG;
        
        $produtos_salvos = Session::get('carrinho');

        if (!$produtos_salvos)
        {
            $produtos_salvos = [];
        }
        
         //Salva informações no array produtos savos que posteriormente sera salvo no cash do carrinho
        array_push($produtos_salvos, ['id' => $idproduto_gerado, 'codigoproduto'=>$getcodigoproduto , 'cod_adc_sistema'=>$array_cod_adicionais_sistema  ,
         'cfop'=> $getcfop, 'code_grupo_sitema'=> $get_cod_sist_grupo, 'idproduto' => $idproduto,
         'nomeproduto' => $nomeproduto, 'precoproduto' => ($getpreco + $getpreco_adicionais) * $quantidade ,
         'img' => $getimg, 'adicionais'=>$adicionais, 'tags_adicionais'=>$tags_adicionais, 'obs'=>$obs, 'soproduto'=>$getpreco, //soproduto é o preço do produto sem adicionaç
        'precoadicionais' => $getpreco_adicionais * $quantidade, 'quantidade'=> $quantidade]);


        Session::put('carrinho', $produtos_salvos);
        $this->set_total($getlojacode);
        $testexxx = Session::get('carrinho');
        return response()->json($testexxx);
    }

    public function get_total_adicionais()
    {

        $adicionaissalvos = Session::get('adicionais');

    }

    public function convert_dinheiro_float($numx)
    {

        foreach ($numx as $valuex)
        {
            if (strpos($valuex, "0") == 0)
            {
                $valuex = str_replace(',', '.', $valuex);
                $valuex = number_format($valuex, 2, ',', '.');

                $valuex = str_replace(',', '.', $valuex);
                echo $valuex;
            }
            else
            {
                $valuex = str_replace('.', '', $valuex);
                $valuex = str_replace(',', '.', $valuex);
                $valuex = number_format($valuex, 2, ',', '.');

                $valuex = str_replace(',', '.', $valuex);
                echo $valuex;
            }
        }
    }

    public function set_total($getlojacode = '')
    {

        if (!$getlojacode == '')
        {

            Session::put('lojaappcode', $getlojacode);

        }

        $getlojacode = Session::get('lojaappcode');

        $getadicionais = [];
        $produtos_salvos = Session::get('carrinho');

        $produtos_salvos_ids = [];
        $contador_valor = null;

        foreach ($produtos_salvos as $value)
        {
            $contador_valor = (double)$value['precoproduto'] + $contador_valor;
            array_push($getadicionais, $value['adicionais']);
        }

        $getpreco_adicionais = null;

        // foreach ($getadicionais as $value) {
        // $this->set_total_adicionais($value);
        //}
        /// Session::put('totaladicionais',$getpreco_adicionais);
        Session::put('totalprodutos', $contador_valor);
        /// return  $get_total = Session::get('totalprodutos');
        

        $getentrega = DB::table('users')->where('codigo_estabelecimento', $getlojacode)->first();

        if (isset($getentrega->MINIMOPRECOENTREGAGRATIS))
        { ///Evita erros verifica se tem pedido minimo para entrega
            $getprecominimo_entrega = $getentrega->MINIMOPRECOENTREGAGRATIS;
            $getprecoentrega_entrega = $getentrega->PRECOENTREGA;

            if ($contador_valor < $getprecominimo_entrega)
            { ///Se for menor que o preço minimo de etrega gratis
                Session::put('entrega', $getprecoentrega_entrega); //passa o total dda entrega
                Session::put('entregagratis', false);

            }
            else
            {

                Session::put('entrega', 0.00); // entrega gratis
                Session::put('entregagratis', true);

            }

        }

        return Session::get('totaladicionais');

    }

    public function set_total_adicionais()
    {
        Session::put('totaladicionais', 0);
        $produtos_salvos = Session::get('carrinho');

        $getadicionais = [];

        foreach ($produtos_salvos as $value)
        {
            array_push($getadicionais, $value['adicionais']);
        }

        foreach ($getadicionais as $value)
        {

            $this->set_total_add_callback($value);

        }

    }

    public function set_total_add_callback($array)
    {

        $getpreco_adicionais = null;
        foreach ($array as $value)
        {

            $getprc = DB::table('adicionais')->where('id', $value)->first();
            $getprc = $getprc->PRECO;
            $getpreco_adicionais = $getpreco_adicionais + $getprc;

        }
        $aux = Session::get('totaladicionais');
        Session::put('totaladicionais', $getpreco_adicionais + $aux);

    }

    public function removeproduct($codeid)
    {
        $produtos_salvos = Session::get('carrinho');
        foreach ($produtos_salvos as $key => $value)
        {

            if ($value['id'] == $codeid)
            {
                unset($produtos_salvos[$key]);
            }

        }

        var_dump($produtos_salvos );

     Session::put('carrinho', $produtos_salvos);

     //  $gg = Session::get('carrinho');

       
        $this->set_total();
        $this->set_total_adicionais();
       // $getcodeloja = DB::table('users')->where('id', $value)->first();

       header("Refresh:0");
       header("Refresh:0");
       header("Refresh:0");
       return redirect()->back();

    }

    public function listteste(){
        $gg = Session::get('carrinho');

        return $gg;
    }

    public function generate_code_ident_product()
    {

        $numero_de_bytes = 4;
        $restultado_bytes = random_bytes($numero_de_bytes);
        $resultado_final = bin2hex($restultado_bytes);

        return $resultado_final;
    }

    public function gettotal()
    {

        $total = Session::get('totalprodutos');

        if (!$total)
        {
            return response()->json(0.00);
        }

        return response()
            ->json($total);

    }

    public function setretiradalocal($valor)
    {

        if ($valor == 1)
        {
            Session::put('retirada', true);
            Session::put('entrega', 0.00); // entrega gratis
            
        }
        if ($valor == 2)
        {
            Session::put('retirada', false);

        }

        return Session::get('retirada');

    }

    public function removefotosall($carrinho)
    {
        $produtos = $carrinho;

        $newproducts = array_map(function ($value)
        {
            $value['img'] = '';
            return $value;
        }
        , $produtos);

        return $newproducts;
    }

    public function savevenda(Request $req)
    {

        $venda = $this->vendas;
        $venda->produtos_array = json_encode($this->removefotosall(Session::get('carrinho')));

        $venda->tiporetirada = Session::get('retirada');
        $venda->preco_total_entrega = Session::get('entrega');
        $venda->preco_total_produto = Session::get('totalprodutos'); //--ja incluido o valor dos adicionais
        $venda->preco_total_adicionais = Session::get('totaladicionais');

        $venda->valor_total = Session::get('totalprodutos') + Session::get('entrega');

        $venda->nomecliente = $req->nome;
        $venda->numerotelefone = $req->telefone;
        $venda->entregagratis = Session::get('entregagratis'); // tipo de entrega
        $venda->ID_USER = $req->ID_USER;
        $venda->endereco = $req->endereco;
        $venda->cep = $req->cep;
        $venda->numero = $req->numero;
        $venda->complemento = $req->complemento;
        $venda->pontoreferencia = $req->pontoreferencia;
        $venda->bairro = $req->bairro;
        $venda->cidade = $req->cidade;
        $venda->uf = $req->uf;
        $venda->troco = $req->troco;
        $venda->forma = $req->forma;  //Forma pagamento

        $venda = $venda->save();

        ////------Limpezas do cash em browser
        Session::put('carrinho', null);
        Session::put('retirada', null);
        Session::put('entrega', null);
        Session::put('totalprodutos', null);
        Session::put('totaladicionais', null);

        return $venda;

    }

    public function verificasetemprodutos_nocarrinho()
    {

        $carrinhoproduto = Session::get('carrinho');
        if (isset($carrinhoproduto))
        {
            return count($carrinhoproduto);
        }
        else
        {
            return 0;
        }

    }

    public function getformasdepagamento($codeloja){
        $iduser = $this->users->where('codigo_estabelecimento',$codeloja)->first();
        $iduser = $iduser->id;   
        $getformas = $this->formas->where('ID_USER',$iduser)->get();
        return  response()->json($getformas);
    }

}

