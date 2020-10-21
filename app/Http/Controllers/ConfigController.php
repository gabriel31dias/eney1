<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;

class ConfigController extends Controller
{

    private $configs;

    public function __construct(User $config){
       $this->configs = $config;
    }

    public function index(){
        $user = Auth::user()->email;
        $codeloja =  Auth::user()->codigo_estabelecimento;

        $username = Auth::user()->name;
        $iduser = Auth::user()->id;
        $user_cf = $this->select_user_config($iduser);
        $tipo_op = Auth::user()->tipo_op;
        return view('Config',['user'=>$user , 'username' => $username,'iduser' => $iduser,'usercf'=>$user_cf,'tipo_op'=> $tipo_op,"codeloja"=>$codeloja]);
    }

    public function save(Request $req){ 
        $req_id_USER = $req->ID_USER;
        $con_user =  $this->configs->find($req_id_USER);
        $con_user =   $con_user->update(['nome_estabelecimento' => $req->nome_estabelecimento,
        'nome_repre'=> $req->nome_repre,
        'telefone1'=> $req->telefone1,
        'telefone2'=> $req->telefone2,
        'tipo_op'=> $req->tipo_op,
        'MINIMOPRECOENTREGAGRATIS'=> $req->MINIMOPRECOENTREGAGRATIS,
        'PRECOENTREGA'=> $req->PRECOENTREGA,
        'horarioinicio'=> $req->horarioinicio,
        'horariofinal'=> $req->horariofinal,
        'cielocode' => $req->cielocode,
        'redecode' => $req->redecode,
        'emailpagseguro'=> $req->emailpagseguro,
        'pagsegurocode'=> $req->pagsegurocode,
        'FACEBOOK'=> $req->FACEBOOK,
        'TWITTER'=> $req->TWITTER,
        'YOUTUBE'=> $req->YOUTUBE,
        'INSTAGRAM'=> $req->INSTAGRAM,

        ]);

        return redirect()->route('config');
    }

    public function update_foto(Request $req){ ///Update designer
        $req_id_USER = $req->ID_USER;
        $COLOR1 = $req->customhead ;
        $COLOR2 = $req->custombody ;
        $con_user =  $this->configs->find($req_id_USER);
        $con_user =   $con_user->update(['imagem_loja' => $req->imagem_loja ,
        'COR1' => $COLOR1,
        'COR2' => $COLOR2,
        ]);
        return redirect()->route('config');
    }



    public function list(){
        
    }

    public function select_user_config($id){
        $user_conf = $this->configs->find($id);
        return  $user_conf;
    }

    public function setPaymentDefault(Request $req){
          $user_conf = $this->configs->find($req->iduser)->first();
          $user_conf->fpagamentoeletronico = null;
          $user_conf = $user_conf->save();

          $user_conf = $this->configs->find($req->iduser)->first();
          $user_conf->fpagamentoeletronico = $req->idpayment;
          $user_conf = $user_conf->save();

        
          return $user_conf;
    }



    
}
