<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Produto;
use App\Grupo;
use App\adicionado;
use App\Adicional;

class ProdutosController extends Controller
{
    //
    private $user;
    private $email;
    private $produtos;
    private $adicionados;
    private $adicionais;

    
    public function __construct(Produto $produtos,adicionado $adicionados,Adicional $adicionais){
        $this->produtos = $produtos;
        $this->adicionados = $adicionados;
        $this->adicionais = $adicionais;
    }

    public function index(){
        $user = Auth::user()->email;
        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $grupos = new Grupo;
        $grupos = $grupos->where('ID_USER',$iduser)->get();
        $tipo_op = Auth::user()->tipo_op;
        return view('produtos',['user'=>$user , 'username' => $username,'iduser' => $iduser, 'grupos'=>$grupos,'tipo_op'=> $tipo_op]);
    }

    public function save(Request $req){
        $req = $req->all();
        $produtos = $this->produtos->create($req);
        return $produtos;
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


}
