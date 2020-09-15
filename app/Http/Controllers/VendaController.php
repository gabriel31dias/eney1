<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Venda;
use Session;
use App\Http\Controllers\CieloCheckoutlink;
use Log;
use App\Temp;


class VendaController extends Controller
{
    //
    

    private $vendas;
    private $temp;

    public function __construct(Venda $venda, Temp $temp)
    {
        $this->vendas = $venda;
        $this->temp = $temp;
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
            ->where('ID_USER', $iduser)->where('nomecliente', 'like', '%' . $param . '%')->get();

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
            ->where('ID_USER', $iduser)->where('nomecliente', 'like', '%' . $param . '%')->get();

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
            ->where('ID_USER', $iduser)->where('nomecliente', 'like', '%' . $param . '%')->get();

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
            ->where('ID_USER', $iduser)->where('numerotelefone', $param)->get();

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
            ->where('ID_USER', $iduser)->where('bairro', 'like', '%' . $param . '%')->get();

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
            ->where('ID_USER', $iduser)->where('endereco', 'like', '%' . $param . '%')->get();

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
            ->where('ID_USER', $iduser)->where('endereco', 'like', '%' . $param . '%')->get();

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
        $cielo = new CieloCheckoutlink();
        Log::info('Novo pagamento cielo');
        $cielo = $cielo->addMerchantId('35c778b2-f9b1-478c-bc7a-2667f6027652');
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
        $cielo = $cielo->setTelefone($req->telefone);
        $cielo = $cielo->setUrlReturn($req->urlretorno);

        
        $cielo = $cielo->executa();
        
        return response()->json($cielo);

       // $cielo->AddProductList();
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
        $tt =  $this->temp;
        $auxvend = explode(".",$req->order_number) ;
        
        


        $req = json_encode($req->all()) ;
        $tt =  $tt->create(['value'=> $auxvend[0]]);
        return  response()->json($tt);
    }

}

