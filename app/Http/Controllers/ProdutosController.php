<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Produto;
use App\Grupo;
use App\adicionado;
use App\Adicional;
use Grupos;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


class ProdutosController extends Controller
{
    //
    private $user;
    private $email;
    private $produtos;
    private $adicionados;
    private $adicionais;
    private $grupos;

    
    public function __construct(Produto $produtos,adicionado $adicionados,Adicional $adicionais,Grupo $grupos){
        $this->produtos = $produtos;
        $this->adicionados = $adicionados;
        $this->adicionais = $adicionais;
        $this->grupos = $grupos;
    }

    public function index(){
        $user = Auth::user()->email;
        $codeloja =  Auth::user()->codigo_estabelecimento;

        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $grupos = new Grupo;
        $grupos = $grupos->where('ID_USER',$iduser)->get();
        $tipo_op = Auth::user()->tipo_op;
        return view('produtos',['user'=>$user , 'username' => $username,'iduser' => $iduser, 'grupos'=>$grupos,'tipo_op'=> $tipo_op,"codeloja"=>$codeloja]);
    }

    public function save(Request $req){
    
        $getgrupo = $this->grupos->where('CODIGO_SISTEMA', $req->CODIGO_SISTEMA_GRUPO)->first();

        if(!Isset($getgrupo->id)){
            $grupo = $this->grupos->create(['NOME_GRUPO'=>$req->NOME_GRUPO, 'CODIGO_SISTEMA'=>$req->CODIGO_SISTEMA_GRUPO,'ID_USER'=>$req->ID_USER]);
         }

        $req = $req->all();
        $produtos = $this->produtos->create($req);
        return  $produtos;
    }

    public function list(){
       $iduser = Auth::user()->id;
       $pro =  $this->produtos->where('ID_USER',$iduser)->get();
       return response()->json($pro);
    }


    public function listformatada(){
        $iduser = Auth::user()->id;
       /// $produtos =  $this->produtos->where('ID_USER',$iduser)->get(['id', ' NOME_PRODUTO+id as text']);
        $produtos =  $this->produtos->where('ID_USER',$iduser)->get();
        $formatted_tags = [];

        foreach ($produtos as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->id.'-'.$tag->NOME_PRODUTO ];
        }

        return \Response::json($formatted_tags);
        
     ///   return ['results' => $produtos];

     }
 
    public function editview($id){
        $tipo_op = Auth::user()->tipo_op;
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $getproduto = $this->produtos->find($id);
        return view('produtosedit',['user'=>$user , 'username' => $username,'produto'=>$getproduto]);
    }

    public function img($id){
        $produ = $this->produtos->find($id);
        $produimg = $produ;
      
        return view('img',['img'=> $produimg]);
    }

    public function delete($id){
        $produto = $this->produtos->find($id);
        $adicionados = $this->adicionados->where('ID_PRODUTO',$id);
        $adicionados = $adicionados->delete();
        $produto =  $produto->delete();
       return redirect()->route('produtos');
    }

    public function item($id){
        $produto = $this->produtos->find($id);

        return response()->json($produto);

    }

    public function update(Request $req){
       $getproduto = $this->produtos->find($req->id);

       $getproduto =  $getproduto->update($req->all());
       return response()->json($getproduto);
  
    }

    public function searchbyname($nomeproduto){
        $iduser = Auth::user()->id;
        $getproduto = $this->produtos->where('ID_USER',$iduser)->where('NOME_PRODUTO', 'like', '%' . $nomeproduto . '%')->get();
        return response()->json($getproduto);
    }

    public function selectcodeid($nomegrupo){
     ///Passa o nome do grupo e retorna codigo do sistema pro front end
       $codegrupo = $this->grupos->where('NOME_GRUPO',$nomegrupo)->first();
       $codegrupo = $codegrupo->CODIGO_SISTEMA;
       return response()->json( $codegrupo);
    }

    public function setpromocao(){
        
        $user = Auth::user()->email;
        $codeloja =  Auth::user()->codigo_estabelecimento;
     
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $grupos = new Grupo;
        $grupos = $grupos->where('ID_USER',$iduser)->get();
        $tipo_op = Auth::user()->tipo_op;

        $produtos =  $this->produtos->where('ID_USER',$iduser)->paginate(15);

    
        return view('promocaoset',['user'=>$user , 'username' => $username,'iduser' => $iduser, 'grupos'=>$grupos,'tipo_op'=> $tipo_op,"codeloja"=>$codeloja,'produtos'=> $produtos]);
    }


    public function updatepromocoes($idproduto,$preco,$horaini,$horafn){
       //Passa true e hora para promocao
        $getproduto = $this->produtos->find($idproduto)->first();
        $getproduto->PRECO_CUSTO = $preco;
        $getproduto->DATA_INICIO_PROMOCAO = $horaini;
        $getproduto->DATA_FINAL_PROMOCAO = $horafn;
        $getproduto->PROMOCAO = true;
        $getproduto =  $getproduto->save();
        return response()->json($getproduto);
    }

    public function cancelpromocao($idproduto,$preco,$horaini,$horafn){
        //Passa true e hora para promocao
         $getproduto = $this->produtos->find($idproduto);
         $getproduto->PRECO_CUSTO = $preco;
         $getproduto->DATA_INICIO_PROMOCAO = $horaini;
         $getproduto->DATA_FINAL_PROMOCAO = $horafn;
         $getproduto->PROMOCAO = false;
         $getproduto =  $getproduto->save();
     }

    



}
