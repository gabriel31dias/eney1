<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Opcoes_produto;

class OpcoesController extends Controller
{

    private $opcoes;

    public function __construct(Opcoes_produto $pro){
       $this->opcoes = $pro;
    }


    public function indexcad(){


      return view("cadopcoes",[]);
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
   


}
