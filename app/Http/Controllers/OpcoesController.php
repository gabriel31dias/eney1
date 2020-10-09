<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Opcoes_produto;

class OpcoesController extends Controller
{

    private $opcoes;

    public function __construct(Opcoes_produto $pro){
       $this->opcoes = $pro;
    }


    public function indexcad(){
      $user = Auth::user()->email;
      $codeloja =  Auth::user()->codigo_estabelecimento;
      $username = Auth::user()->name;
      $iduser = Auth::user()->id;
      $tipo_op = Auth::user()->tipo_op;
      $opcoes =   $this->opcoes->all();


      return view("cadopcoes",['user'=>$user , 'opcoes' => $opcoes , 'username' => $username,'iduser' => $iduser, 'tipo_op'=> $tipo_op,"codeloja"=>$codeloja]);
    }

   public function index(){

    return view('opcoes',[]);
   }
   
   public function save(Request $req){
     $req = $req->all();
     $opt = $this->opcoes->create( $req );
     return  $req;
   }

   public function list(){
      $opcoes = $this->opcoes->all();
      return  $opcoes;

   }

   public function saveopt(Request $req) {
        
      $opt  =  $this->opcoes->create(['ID_USER'=> $req->ID_USER ,'DESCROPT' => $req->DESCROPT , 'CAMPOSOPCOES' =>  $req->CAMPOSOPCOES  ]);
     return $opt;

   }


   public function editopt(Request $req) {
      $opt  =  $this->opcoes->find($req->id);
      $opt->CAMPOSOPCOES = "wddw";
      $opt->DESCROPT = "wddw";
      $res =  $opt->save();
      return  $res;
   }


   public function itemopt(Request $req) {
      $opt  =  $this->opcoes->find($req->id);
      $opt->CAMPOSOPCOES = "wddw";
      $opt->DESCROPT = "wddw";
      $res =  $opt->save();
      return  $res;
   }


   


}
