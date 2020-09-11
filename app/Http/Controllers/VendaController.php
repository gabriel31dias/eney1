<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Venda;
use Session;
use App\Http\Controllers\CieloCheckoutlink;


class VendaController extends Controller
{
    //
    

    private $vendas;

    public function __construct(Venda $venda)
    {
        $this->vendas = $venda;
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


    public function cielopagamento(){
        $cielo = new CieloCheckoutlink();
        $cielo = $cielo->addMerchantId('1111');
        

         return response()->json($cielo);
       // $cielo->AddProductList();
    }

}

