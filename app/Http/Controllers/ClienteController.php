<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
   private $clientes;
   public $user;


    public function __construct(cliente $clientes ){
        $this->clientes = $clientes;
    }


    public function index(){
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        return view('clientes',['user'=>$user , 'username'=>$username ,'tipo_op'=> $tipo_op]);
    }


    public function getall(){
        $clients = $this->clientes->all();
        return response()->json($clients);
    }

    public function Save(Request $req){
        $data = $req->all();
        $cli = $this->clientes->create($data);
        if($cli){
            return redirect()->route('clientes',['success'=>true]);
        }
    }

    public function search_id($id){
        $cliente = $this->clientes->find($id);
        return response()->json([$cliente]);
    }


    public function search_name_like($param){
        $cliente = $this->clientes->where('NOME', 'like', '%' . $param . '%')->get();
        return response()->json($cliente);
    }

    public function search_razao_like($param){
        $cliente = $this->clientes->where('RAZAO', 'like', '%' . $param . '%')->get();
        return response()->json($cliente);
    }

    public function search_cpf_cnpj_like($param){
        $cliente = $this->clientes->where('CPF_CNPJ',  $param )->get();
        return response()->json($cliente);
    }

    public function search_cidade($param){
        $cliente = $this->clientes->where('CIDADE',  $param )->get();
        return response()->json($cliente);

    }

    public function search_endereco($param){
        $cliente = $this->clientes->where('ENDERECO','like', '%'.  $param .'%' )->get();
        return response()->json($cliente);
    }

    public function search_telefone($param){
        $clienter = $this->clientes->where('RESIDENCIAL','like', '%'.  $param .'%' )->orWhere('CELULAR','like', '%'.  $param .'%')->get();
     
        if($clienter){
            return response()->json($clienter);
        }  
    }

    public function search_bairro($param){
        $cliente = $this->clientes->where('BAIRRO','like', '%'.  $param .'%' )->get();
        return response()->json($cliente);
    }
    
}
