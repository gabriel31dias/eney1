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
use Illuminate\Support\Facades\DB as FacadesDB;

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

      
     
      $getsucesso = '';
    
      if(isset( $_GET['success'])){
        $getsucesso =  $_GET['success'];
      if($getsucesso == true){
        $getsucesso = 'true';
      }else{
        $getsucesso = 'false';
      }
     }

     //return  Session::get('CODLOJA');
     date_default_timezone_set('America/Sao_Paulo');
     
     var_dump(Carbon::now());
      $grupoitem = str_replace("-", " ", $grupoitem);
      
      $status_loja = true;
      $getloja = $this->users->where('codigo_estabelecimento',$codigo)->first();
      $hora1 = strtotime($getloja->horarioinicio);
      $hora2 = strtotime($getloja->horariofinal);
      $horaAtual = strtotime(date('H:i:s'));
      $imagem_loja = $getloja->imagem_loja ;
  
      if($horaAtual >= $hora1 && $horaAtual <= $hora2  ){ //Horario de funcionamento 
        $status_loja = true;
      }else{
        $status_loja = false;
        //Se nao tiver assume o manual
        if($getloja->status_at == 'true'){
            $status_loja = true;
        }else{
            $status_loja = false;
         }
      
      }

      $facebook =  $getloja->FACEBOOK;
      $instagram =  $getloja->INSTAGRAM;
      $twitter = $getloja->TWITTER;
      $youtube = $getloja->YOUTUBE;

      $promoces = FacadesDB::table('produtos')->where('ID_USER', $getloja->id)->where('PROMOCAO',true)
      ->where('DATA_INICIO_PROMOCAO', '<=' , Carbon::now())
      ->where('DATA_FINAL_PROMOCAO', '>' , Carbon::now() )
      ->get();
        
   


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
         $getproducts = $this->produtos->where('ID_USER',$getidloja)->where('CODIGO_SISTEMA_GRUPO',$grupoitem)->paginate(10);
         $grupoitem = $this->grupos->where('id',$grupoitem)->first();

     }else{
         $getproducts = $this->produtos->where('ID_USER',$getidloja)->paginate(10);
     }
     

   
     if(isset($grupoitem->NOME_GRUPO)){
   
      $grupoitem = $grupoitem->NOME_GRUPO;

     }
    


      $getgrupos = $this->grupos->where('ID_USER',$getidloja)->paginate(10);
    
      return view('loja',['produtos'=>$getproducts,'style'=>$style,'grupos'=> $getgrupos,'lojacod'=>$codigo,'grupoitem'=>$grupoitem,'status_loja'=>$status_loja,'imagem_loja'=>$imagem_loja,'url_facebook'=>$facebook,'url_instagran'=>$instagram,'url_twitter'=>$twitter,'url_youtube'=>$youtube,'getsucesso'=>$getsucesso,'promoces'=>$promoces]);
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

    public function verifica_tempo_promocao($codeloja,$id){
      
      $iduser =  FacadesDB::table('users')->where('codigo_estabelecimento',$codeloja)->first();


      $promoces = FacadesDB::table('produtos')->where('ID_USER',  $iduser->id )->where('id', $id)->where('PROMOCAO',true)
      ->where('DATA_INICIO_PROMOCAO', '<=' , Carbon::now())
      ->where('DATA_FINAL_PROMOCAO', '>' , Carbon::now() )
      ->firstOrFail();


      return  $promoces;

      
        
    }

    



}
