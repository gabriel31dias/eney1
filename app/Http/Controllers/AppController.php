<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\User;
use App\Produto;
use App\Config;
use App\Grupo;
use Session;
use DB;
use Carbon\Carbon;


class AppController extends Controller
{
    private $users;
    private $produtos;
    private $configs;
    private $grupos;

    public function __construct(User $apps,Produto $produtos,Config $con,Grupo $grupos){
       $this->users = $apps;
       $this->produtos = $produtos;
       $this->configs = $con;
       $this->grupos = $grupos;
    } 

    public function index(){  ///Todas as lojas
      $status_loja = true;
      $user = Auth::user()->email;
      $username = Auth::user()->name;
      $iduser = Auth::user()->id;
      $getlojas =  $this->users->all();
      $tipo_op = Auth::user()->tipo_op;
      $getconfigs = $this->users->find($iduser);
      $style = ['color1'=>'#3949ab',
        'color2'=>''
        ];
      if($getconfigs->COR1){
        $style = ['color1'=>'#3949ab',
        'color2'=>''
        ];
      }
    
      return view('appview',['user'=>$user , 'username' => $username,'iduser' => $iduser,'getlojas'=> $getlojas,'tipo_op'=> $tipo_op,'tipo_op'=>$tipo_op,'style'=>$style,'status_loja'=>$status_loja]);
    }


    public function getloja($codigo,$grupoitem=''){ ///A loja apenas
     

     //return  Session::get('CODLOJA');
     date_default_timezone_set('America/Sao_Paulo');
     
    
      $grupoitem = str_replace("-", " ", $grupoitem);
     
      $status_loja = true;
      $getloja = $this->users->where('codigo_estabelecimento',$codigo)->first();

    
      if(strtotime($getloja->horarioinicio) >= strtotime("now") && strtotime($getloja->horariofinal) < strtotime("now")  ){ //Horario de funcionamento
        $status_loja = true;
      }else{
        $status_loja = false;
      }
      $gg =  gettype($getloja->horarioinicio);
      echo  $gg;
      $ff =  gettype(date("H:i:s"));
      echo  $ff;

      var_dump(date("H:i:s"));
      var_dump(strtotime($getloja->horarioinicio));
      var_dump($getloja->horariofinal);

    
      if($getloja->status_at == 'true'){
        $status_loja = true;
      }else{
        $status_loja = false;
      }
      
     
      $getidloja  = '';
      if(isset( $getloja->id)){
         $getidloja =  $getloja->id; // o id da loja e o i do usuario
      }

      
       //padraoes
      $style = ['color1'=>'black',
      'color2'=>''
      ];

      if($getloja->COR1){
        $style = ['color1'=>$getloja->COR1,
        'color2'=>$getloja->COR2
        ];
      }

      

     if($grupoitem){
         $getproducts = $this->produtos->where('NOME_GRUPO',$grupoitem)->paginate(10);
     }else{
         $getproducts = $this->produtos->where('ID_USER',$getidloja)->paginate(10);
     }
     


      $getgrupos = $this->grupos->where('ID_USER',$getidloja)->paginate(10);
    
      return view('loja',['produtos'=>$getproducts,'style'=>$style,'grupos'=> $getgrupos,'lojacod'=>$codigo,'grupoitem'=>$grupoitem,'status_loja'=>$status_loja]);
    }


    public function searchproduto($loja,$nomeproduto){

     
      $getiduserloja = $this->users->where('codigo_estabelecimento',$loja)->first();

      if($getiduserloja->status_at == 'true'){
        $status_loja = true;
      }else{
        $status_loja = false;
      }
      
       //padraoes
       $style = ['color1'=>'black',
       'color2'=>''
       ];
 
       if($getiduserloja->COR1){
         $style = ['color1'=>$getiduserloja->COR1,
         'color2'=>$getiduserloja->COR2
         ];
       }
 
      $getiduserloja =    $getiduserloja->id ;
      $getprodutossearch = $this->produtos->where('ID_USER',  $getiduserloja)->where('NOME_PRODUTO', 'like', '%' . $nomeproduto . '%')->paginate(10);
      $getgrupos = $this->grupos->where('ID_USER', $getiduserloja)->paginate(10);
      return view('loja',['produtos'=> $getprodutossearch,'style'=>$style,'grupos'=> $getgrupos,'lojacod'=>$loja,'grupoitem'=>'','status_loja'=>$status_loja]);

    }

    public static function getlojacode($id){
        
        $users = DB::table('users')->where('id',$id)->first();

        $getcode =  $users->codigo_estabelecimento;

        return $getcode;


    }

   
    public function process_tags(Request $req){
          //processa as tags do front end
          $tags = $req->tags;
          $arrayresult = [];
    
          foreach($tags as $val){
             $getname_adcional = DB::table('adicionais')->where('id',$val)->first();
             $getname_adcional = '+ '.$getname_adcional->ADICIONAL;
             array_push($arrayresult, $getname_adcional);
          }

          return response()->json($arrayresult);
    }

    



}
