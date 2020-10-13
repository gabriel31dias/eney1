<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Venda;
use Session;
use App\Http\Controllers\CieloCheckoutlink;
use Log;
use App\Temp;
use Ephp\SocketIOClient;
use Ephp\Message;
use Ephp\EngineInterface;
use App\Http\Controllers\SwitchForma;
use  ElephantIO\Client;
use  ElephantIO\Engine\SocketIO\Version2X;
use App\User;
use Rede;
use Rede\Store;
use Rede\Environment;
use Rede\Transaction;
use Rede\eRede;
use Rede\Exception\RedeException;
use App\Http\Controllers\SmsController ;
use \PagSeguro ;
use PagSeguroLibrary\PagSeguroLibrary ;







class VendaController extends Controller
{
    //
    

    private $vendas;
    private $temp;
    private $users;

    public function __construct(Venda $venda, Temp $temp, User $user)
    {
        $this->vendas = $venda;
        $this->temp = $temp;
        $this->users = $user;
    }

    public function index(Request $req)
    {
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $tipo_op = Auth::user()->tipo_op;
        Session::put('ID_USER', $iduser);
        return view('vendas', ['user' => $user, 'username' => $username, 'iduser' => $iduser, 'tipo_op' => $tipo_op]);
    }

    public function listvendas()
    {

        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $tipo_op = Auth::user()->tipo_op;

        $getvendas = $this->vendas;
        $getvendas = $getvendas->where('ID_USER', $iduser)->where('statuspvenda_pg',true)->orderBy('id', 'ASC')->get();

        $filtrad_vendas = array_map(function ($value)
        {

            if ($value['statuspvenda'])
            {
                $value['statuspvenda'] = "<p style='color:green;width:50%;padding:10px'>Entregue</p>";
            }
            else
            {
                $value['statuspvenda'] = "<p style='color:red;width:50%;padding:10px'>Pendente</p>";
            }

            $value['created_at'] = date('Y-m-d H:i:s', strtotime($value['created_at']));

            $value['valor_total'] = "<a onclick='precos(" . number_format($value['preco_total_produto'], 2) . "," . number_format($value['preco_total_entrega'], 2) . "," . number_format($value['preco_total_adicionais'], 2) . ")'>" . $value['valor_total'] . " Ver mais..</a>";

            if ($value['tiporetirada'] == "0")
            {
                $value['tiporetirada'] = "<p style='color:#1de9b6;width:50%;padding:10px'>Entrega</p>";
            }
            else
            {
                $value['tiporetirada'] = "<p style='color:#0277bd;width:50%;padding:10px'>Retirada</p>";
            }
            if ($value['entregagratis'] == 1)
            {

                $value['preco_total_entrega'] = "<p style='color:white;background-color:#7cb342;width:50%;padding:10px'>Grátis</p>";
            }
            return $value;
        }
        , $getvendas->toArray());

        return response()->json($filtrad_vendas);

    }


    public function listvendasnaoaprovadas()
    {

        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $tipo_op = Auth::user()->tipo_op;

        $getvendas = $this->vendas;
        $getvendas = $getvendas->where('ID_USER', $iduser)->orderBy('id', 'ASC')->get();

        $filtrad_vendas = array_map(function ($value)
        {

            if ($value['statuspvenda'])
            {
                $value['statuspvenda'] = "<p style='color:green;width:50%;padding:10px'>Entregue</p>";
            }
            else
            {
                $value['statuspvenda'] = "<p style='color:red;width:50%;padding:10px'>Pendente</p>";
            }

            $value['created_at'] = date('Y-m-d H:i:s', strtotime($value['created_at']));

            $value['valor_total'] = "<a onclick='precos(" . number_format($value['preco_total_produto'], 2) . "," . number_format($value['preco_total_entrega'], 2) . "," . number_format($value['preco_total_adicionais'], 2) . ")'>" . $value['valor_total'] . " Ver mais..</a>";

            if ($value['tiporetirada'] == "0")
            {
                $value['tiporetirada'] = "<p style='color:#1de9b6;width:50%;padding:10px'>Entrega</p>";
            }
            else
            {
                $value['tiporetirada'] = "<p style='color:#0277bd;width:50%;padding:10px'>Retirada</p>";
            }
            if ($value['entregagratis'] == 1)
            {

                $value['preco_total_entrega'] = "<p style='color:white;background-color:#7cb342;width:50%;padding:10px'>Grátis</p>";
            }
            return $value;
        }
        , $getvendas->toArray());

        return response()->json($filtrad_vendas);

    }

    public function search_nome($param)
    {
        $iduser = Session::get('ID_USER');
        $cliente = $this
            ->vendas
            ->where('ID_USER', $iduser)->where('nomecliente', 'like', '%' . $param . '%')->where('statuspvenda_pg',true)->get();

        $filtrad_vendas = array_map(function ($value)
        {

            if ($value['statuspvenda'])
            {
                $value['statuspvenda'] = "<p style='color:green;width:50%;padding:10px'>Entregue</p>";
            }
            else
            {
                $value['statuspvenda'] = "<p style='color:red;width:50%;padding:10px'>Pendente</p>";
            }

            $value['created_at'] = date('Y-m-d H:i:s', strtotime($value['created_at']));

            $value['valor_total'] = "<a onclick='precos(" . number_format($value['preco_total_produto'], 2) . "," . number_format($value['preco_total_entrega'], 2) . ")'>" . $value['valor_total'] . "</a>";

            if ($value['tiporetirada'] == "0")
            {
                $value['tiporetirada'] = "<p style='color:#1de9b6;width:50%;padding:10px'>Entrega</p>";
            }
            else
            {
                $value['tiporetirada'] = "<p style='color:#0277bd;width:50%;padding:10px'>Retirada</p>";
            }
            if ($value['entregagratis'] == 1)
            {

                $value['preco_total_entrega'] = "<p style='color:white;background-color:#7cb342;width:50%;padding:10px'>Grátis</p>";
            }
            return $value;
        }
        , $cliente->toArray());

        return response()
            ->json($filtrad_vendas);

    }

    public function searchentregue($param)
    {
        $iduser = Session::get('ID_USER');
        $cliente = $this
            ->vendas
            ->where('statuspvenda', true)
            ->where('ID_USER', $iduser)->where('nomecliente', 'like', '%' . $param . '%')->where('statuspvenda_pg',true)->get();

        $filtrad_vendas = array_map(function ($value)
        {

            if ($value['statuspvenda'])
            {
                $value['statuspvenda'] = "<p style='color:green;width:50%;padding:10px'>Entregue</p>";
            }
            else
            {
                $value['statuspvenda'] = "<p style='color:red;width:50%;padding:10px'>Pendente</p>";
            }

            $value['created_at'] = date('Y-m-d H:i:s', strtotime($value['created_at']));
            $value['valor_total'] = "<a onclick='precos(" . number_format($value['preco_total_produto'], 2) . "," . number_format($value['preco_total_entrega'], 2) . ")'>" . $value['valor_total'] . "</a>";

            if ($value['tiporetirada'] == "0")
            {
                $value['tiporetirada'] = "<p style='color:#1de9b6;width:50%;padding:10px'>Entrega</p>";
            }
            else
            {
                $value['tiporetirada'] = "<p style='color:#0277bd;width:50%;padding:10px'>Retirada</p>";
            }
            if ($value['entregagratis'] == 1)
            {

                $value['preco_total_entrega'] = "<p style='color:white;background-color:#7cb342;width:50%;padding:10px'>Grátis</p>";
            }
            return $value;
        }
        , $cliente->toArray());

        return response()
            ->json($filtrad_vendas);

    }

    public function searchnaoentregue($param)
    {
        $iduser = Session::get('ID_USER');
        $cliente = $this
            ->vendas
            ->where('statuspvenda', false)
            ->where('ID_USER', $iduser)->where('nomecliente', 'like', '%' . $param . '%')->where('statuspvenda_pg',true)->get();

        $filtrad_vendas = array_map(function ($value)
        {
            if ($value['statuspvenda'])
            {
                $value['statuspvenda'] = "<p style='color:green;width:50%;padding:10px'>Entregue</p>";
            }
            else
            {
                $value['statuspvenda'] = "<p style='color:red;width:50%;padding:10px'>Pendente</p>";
            }

            $value['created_at'] = date('Y-m-d H:i:s', strtotime($value['created_at']));
            $value['valor_total'] = "<a onclick='precos(" . number_format($value['preco_total_produto'], 2) . "," . number_format($value['preco_total_entrega'], 2) . ")'>" . $value['valor_total'] . "</a>";

            if ($value['tiporetirada'] == "0")
            {
                $value['tiporetirada'] = "<p style='color:#1de9b6;width:50%;padding:10px'>Entrega</p>";
            }
            else
            {
                $value['tiporetirada'] = "<p style='color:#0277bd;width:50%;padding:10px'>Retirada</p>";
            }
            if ($value['entregagratis'] == 1)
            {

                $value['preco_total_entrega'] = "<p style='color:white;background-color:#7cb342;width:50%;padding:10px'>Grátis</p>";
            }
            return $value;
        }
        , $cliente->toArray());

        return response()
            ->json($filtrad_vendas);
    }

    public function searchtelefone($param)
    {

        $iduser = Session::get('ID_USER');
        $cliente = $this
            ->vendas
            ->where('ID_USER', $iduser)->where('numerotelefone', $param)->where('statuspvenda_pg',true)->get();

        $filtrad_vendas = array_map(function ($value)
        {

            if ($value['statuspvenda'])
            {
                $value['statuspvenda'] = "<p style='color:green;width:50%;padding:10px'>Entregue</p>";
            }
            else
            {
                $value['statuspvenda'] = "<p style='color:red;width:50%;padding:10px'>Pendente</p>";
            }

            $value['created_at'] = date('Y-m-d H:i:s', strtotime($value['created_at']));
            $value['valor_total'] = "<a onclick='precos(" . number_format($value['preco_total_produto'], 2) . "," . number_format($value['preco_total_entrega'], 2) . ")'>" . $value['valor_total'] . "</a>";

            if ($value['tiporetirada'] == "0")
            {
                $value['tiporetirada'] = "<p style='color:#1de9b6;width:50%;padding:10px'>Entrega</p>";
            }
            else
            {
                $value['tiporetirada'] = "<p style='color:#0277bd;width:50%;padding:10px'>Retirada</p>";
            }
            if ($value['entregagratis'] == 1)
            {

                $value['preco_total_entrega'] = "<p style='color:white;background-color:#7cb342;width:50%;padding:10px'>Grátis</p>";
            }
            return $value;
        }
        , $cliente->toArray());

        return response()
            ->json($filtrad_vendas);
    }

    public function searchbairro($param)
    {

        $iduser = Session::get('ID_USER');
        $cliente = $this
            ->vendas
            ->where('ID_USER', $iduser)->where('bairro', 'like', '%' . $param . '%')->where('statuspvenda_pg',true)->get();

        $filtrad_vendas = array_map(function ($value)
        {

            if ($value['statuspvenda'])
            {
                $value['statuspvenda'] = "<p style='color:green;width:50%;padding:10px'>Entregue</p>";
            }
            else
            {
                $value['statuspvenda'] = "<p style='color:red;width:50%;padding:10px'>Pendente</p>";
            }

            $value['created_at'] = date('Y-m-d H:i:s', strtotime($value['created_at']));
            $value['valor_total'] = "<a onclick='precos(" . number_format($value['preco_total_produto'], 2) . "," . number_format($value['preco_total_entrega'], 2) . ")'>" . $value['valor_total'] . "</a>";

            if ($value['tiporetirada'] == "0")
            {
                $value['tiporetirada'] = "<p style='color:#1de9b6;width:50%;padding:10px'>Entrega</p>";
            }
            else
            {
                $value['tiporetirada'] = "<p style='color:#0277bd;width:50%;padding:10px'>Retirada</p>";
            }
            if ($value['entregagratis'] == 1)
            {

                $value['preco_total_entrega'] = "<p style='color:white;background-color:#7cb342;width:50%;padding:10px'>Grátis</p>";
            }
            return $value;
        }
        , $cliente->toArray());

        return response()
            ->json($filtrad_vendas);
    }

    public function searchrua($param)
    {

        $iduser = Session::get('ID_USER');
        $cliente = $this
            ->vendas
            ->where('ID_USER', $iduser)->where('endereco', 'like', '%' . $param . '%')->where('statuspvenda_pg',true)->get();

        $filtrad_vendas = array_map(function ($value)
        {

            if ($value['statuspvenda'])
            {
                $value['statuspvenda'] = "<p style='color:green;width:50%;padding:10px'>Entregue</p>";
            }
            else
            {
                $value['statuspvenda'] = "<p style='color:red;width:50%;padding:10px'>Pendente</p>";
            }

            $value['created_at'] = date('Y-m-d H:i:s', strtotime($value['created_at']));
            $value['valor_total'] = "<a onclick='precos(" . number_format($value['preco_total_produto'], 2) . "," . number_format($value['preco_total_entrega'], 2) . ")'>" . $value['valor_total'] . "</a>";

            if ($value['tiporetirada'] == "0")
            {
                $value['tiporetirada'] = "<p style='color:#1de9b6;width:50%;padding:10px'>Entrega</p>";
            }
            else
            {
                $value['tiporetirada'] = "<p style='color:#0277bd;width:50%;padding:10px'>Retirada</p>";
            }
            if ($value['entregagratis'] == 1)
            {

                $value['preco_total_entrega'] = "<p style='color:white;background-color:#7cb342;width:50%;padding:10px'>Grátis</p>";
            }
            return $value;
        }
        , $cliente->toArray());

        return response()
            ->json($filtrad_vendas);
    }

    public function searchnumero($param)
    {

        $iduser = Session::get('ID_USER');
        $cliente = $this
            ->vendas
            ->where('ID_USER', $iduser)->where('endereco', 'like', '%' . $param . '%')->where('statuspvenda_pg',true)->get();

        $filtrad_vendas = array_map(function ($value)
        {

            if ($value['statuspvenda'])
            {
                $value['statuspvenda'] = "<p style='color:green;width:50%;padding:10px'>Entregue</p>";
            }
            else
            {
                $value['statuspvenda'] = "<p style='color:red;width:50%;padding:10px'>Pendente</p>";
            }

            $value['created_at'] = date('Y-m-d H:i:s', strtotime($value['created_at']));
            $value['valor_total'] = "<a onclick='precos(" . number_format($value['preco_total_produto'], 2) . "," . number_format($value['preco_total_entrega'], 2) . ")'>" . $value['valor_total'] . "</a>";

            if ($value['tiporetirada'] == "0")
            {
                $value['tiporetirada'] = "<p style='color:#1de9b6;width:50%;padding:10px'>Entrega</p>";
            }
            else
            {
                $value['tiporetirada'] = "<p style='color:#0277bd;width:50%;padding:10px'>Retirada</p>";
            }
            if ($value['entregagratis'] == 1)
            {

                $value['preco_total_entrega'] = "<p style='color:white;background-color:#7cb342;width:50%;padding:10px'>Grátis</p>";
            }
            return $value;
        }
        , $cliente->toArray());

        return response()
            ->json($filtrad_vendas);
    }

    public function getproductsjson($id)
    {
        $iduser = Session::get('ID_USER');
        $product = $this
            ->vendas
            ->where('ID_USER', $iduser)->where('id', $id)->first();
        $product = str_replace("/", " ", $product->produtos_array);

        return response()
            ->json($product);
    }


    public function setUpdate_statusvenda($idvenda,$status){
       $venda = $this->vendas->where('id',$idvenda)->first();
       $venda = $venda->update(['statuspvenda'=>$status]);
       return $venda;
    }


    public function cielopagamento(Request $req){
        $selectf = new SwitchForma($req->codeloja );///Seleciona forma pagamento da loja
        $selectf = $selectf->getForma();
        $cielo = $selectf;
        $getmercantid = $this->users->where('codigo_estabelecimento', $req->codigo_estabelecimento )->first();
        Log::info('Novo pagamento cielo');
        $cielo = $cielo->addMerchantId($getmercantid->cielocode);
       /// $cielo = $cielo->addMerchantId( '35c778b2-f9b1-478c-bc7a-2667f6027652');
        $cielo = $cielo->AddProductList($req->produtos);
        $cielo = $cielo->setCep($req->cep);
        $cielo = $cielo->setAddress($req->endereco);
        $cielo = $cielo->setBairro($req->bairro);
        $cielo = $cielo->setNumber($req->numero);
        $cielo = $cielo->setComplemento($req->complemento);
        $cielo = $cielo->setCidade($req->cidade);
        $cielo = $cielo->setEstado($req->estado);
        $cielo = $cielo->setEmail($req->email);
        $cielo = $cielo->setName($req->nomecompleto);
        $cielo = $cielo->setOrderNumber($req->codeloja .'-'. $req->numerovenda);
        $cielo = $cielo->setTelefone($this->soNumero($req->telefone));
        $cielo = $cielo->setUrlReturn($req->urlretorno);
        $cielo = $cielo->executa();
        return response()->json($cielo);
       // $cielo->AddProductList();
    }

    public function soNumero($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }

    public function notificao(Request $req){
        $tt =  $this->temp;
        $req = json_encode($req->all()) ;
        $tt =  $tt->create(['value'=>$req]);
        return  response()->json($tt);
    }

    public function listteste(){
     ///Funcao para teste
        $list = $this->temp;
        $list =  $list->all();
        return view('testelist',['list'=> $list->all()]);
    }

    public function mudastatus( Request $req){
        //Função responsavel por mudar status da tranzação
        $getcodeloja = SwitchForma::getcodeloja($req);
        $selectf = new SwitchForma($getcodeloja);///Seleciona forma pagamento da loja
        $selectf = $selectf->getForma();
        $payment_vr =  $selectf;
       // $payment_vr = new CieloCheckoutlink();

        $tt =  $this->temp;
        $auxvend = explode("-",  $payment_vr->getproperty_ident_venda($req));//Separa codigo da loja e o da venda --> getproperty_ident_venda() pega a propriedade de identificao da venda da forma de pagamento
        $venda = $this->vendas->find($auxvend[1]);
     
        
        if( $payment_vr->VerifyPayment($req)){ //Verifica se a forma de pagamento aceitou o pagamento
            $venda->statuspvenda_pg = true;
            $venda = $venda->save();
            $client = new Client(new Version2X('https://servidorsocket3636.herokuapp.com/'));
            $getvenda =  $this->vendas->find($auxvend[1])->first();
            $client->initialize();
            // send for server (listen) the any array
            $client->emit('canalcomunica', ['valuexx' =>  $getvenda->venda_json]);///Joga pra tabela de logs de mudança de status de venda
            $client->close();
            $SendSms = new SmsController();
            $SendSms->SendSinglesms('0030015529','Uma venda foi realizada no aplicativo para o cliente ' +  $getvenda->nomecliente + 'no valor de ' +  $getvenda->valor_total , $getvenda->numerotelefone ) ;

        }else{
            $venda->statuspvenda_pg = false;
            $venda = $venda->save();
        }

        //if($venda){

         // $response = Http::post('http://localhost:3000/', [
           //  'name' => 'Steve',
           //  'role' => 'Network Administrator',
          // ]);

       // }

        // Socket io --------->>>> Envia
     
        $req = json_encode($req->all()) ;
        $tt =  $tt->create(['value'=>  $getcodeloja ]);
        return  response()->json($tt);
    }
    
    public function testsmartpg(){

        return view('testesmart',[]);
    }

    public function TesteHttpSocket(){
           
    }

    public function enviaVendasNaoenviadas(){

        $vendasnaoenviadas = $this->vendas->where('vendas_received', null)->where('statuspvenda_pg', true)->get();
        $tt =  $this->temp;
        $array_loja_enviada = [];
       
        foreach ($vendasnaoenviadas as $value) {

         // if(! array_search($value->cod_venda_web ,$array_loja_enviada ,false) ){
              $this->socketEmitVenda($value->venda_json);
           ///   echo $value->id;
             // $updatevenda = $this->vendas->find($value->id);
             // $updatevenda = $updatevenda->vendas_received 
         // }
         

          array_push($array_loja_enviada , $value->cod_venda_web);
        
        }



        $tt =  $tt->create(['value'=> 'Cron app' ]);
      return  response()->json($vendasnaoenviadas);



    }


    public function setVendaRecebida($codevenda){
        
       $vendasnaoenviadas = $this->vendas->where("cod_venda_web",$codevenda)->first();
       $vendasnaoenviadas->vendas_received = true;
       $vendasnaoenviadas->save();
      //  var_dump($codevenda);
     
     //   $tt =  $this->temp;//Logs
     //   $tt =  $tt->create(['value'=>  $codevenda]);
       return response()->json( $vendasnaoenviadas);
    }

    

    
    public function ReenvioVendaSimples($codvenda){
        $venda = $this->vendas->where("cod_venda_web",$codvenda)->first();
        $this->socketEmitVenda($venda->venda_json);
    } 

    public function socketEmitVenda($json){
        $client = new Client(new Version2X('https://servidorsocket3636.herokuapp.com/'));
        $client->initialize();
        // send for server (listen) the any array
        $client->emit('canalcomunica', ['valuexx' => $json ]);///Joga pra tabela de logs de mudança de status de venda
        $client->close();
    }

    public function Validacod_venda($codevenda){
        $vendas = $this->vendas->where('cod_venda_web',$codevenda)->first();
        $result = true;
        if(isset($vendas->id)){
            $result = false;
        }else{
            $result = true;
        }
        return response()->json($result);
    }

    public function switch(){
        $gg = new SwitchForma(1);
        $gg = $gg->getForma();
    
         var_dump($gg);
  
      }

      public function testesteservidorsocket(){
       return env('SERVIDOR_SOCKET');
      }


      public function testerede()
      {
          // Configuração da loja em modo produção
         $store = new Store('PV', 'TOKEN', Environment::production());

          // Configuração da loja em modo sandbox
         // $store = new \Rede\Store('PV', 'TOKEN', \Rede\Environment::sandbox());

       // Transação que será autorizada
        $transaction = (new Transaction(20.99, 'pedido' . time()))->creditCard(
            '5448280000000007',
            '235',
            '12',
            '2020',
            'John Snow'
         );

          // Autoriza a transação
         $transaction = (new eRede($store))->create($transaction);
       
 
         if ($transaction->getReturnCode() == '00') {
              printf("Transação autorizada com sucesso; tid=%s\n", $transaction->getTid());
           }
      }


      public function testepagseguro(){

          
             // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://ws.pagseguro.uol.com.br/v2/checkout?email=gabrieldias@keemail.me&token=a6d998a5-b3a0-43c4-b1e2-84b69e347c52a97cd4b049dbb5325d003db5c6bc0bf7e77d-f4a8-4fa0-a4e2-1d1c3a890f0c');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "email=gabrieldias@keemail.me&token=a6d998a5-b3a0-43c4-b1e2-84b69e347c52a97cd4b049dbb5325d003db5c6bc0bf7e77d-f4a8-4fa0-a4e2-1d1c3a890f0c&currency=BRL&itemId1=001&itemDescription1=Items teste%201&itemAmount1=169.90&reference=124665c23f7896adff508377925&senderName=gabriel dias%20Green&senderAreaCode=51&senderPhone=988888888&senderEmail=emaildocomprador@pagseguro.com.br&shippingAddressRequired=true&extraAmount=0.00");

$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

 var_dump($result);
         return view('pagseguro',[]);
      }

}

