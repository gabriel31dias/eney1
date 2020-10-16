<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\CieloCheckoutlink;
use App\Http\Controllers\RedeCheckoutlink;

class SwitchForma extends Controller
{

    private $user;
    private $iduser;
    private $cod_estabelecimento;

    public function __construct($iduser){
        $this->user = new User;
        $this->user = $this->user->where('codigo_estabelecimento',$iduser)->first();
        $this->cod_estabelecimento = $iduser;
    }

   public function getForma(){

      $user =  $this->user;
    
      switch ($user->fpagamentoeletronico) {
        case 1:
           // return new CieloCheckoutlink();
           return new CieloCheckoutlink( $this->cod_estabelecimento);
            break;
        case 2:
            return new PagseguroCheckout( $this->cod_estabelecimento);
            break;
       }

       return new CieloCheckoutlink( $this->cod_estabelecimento);

   }

   public static function isJson($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
   }


   public static function getcodeloja($req){
    //  $tt =  $this->temp; 


    if(isset($req->order_number)){
        $auxvend = explode("-", $req->order_number);
        return  $auxvend[0];
    }


    if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
        ///Se for pagseguro entra aqui

       $venda = SwitchForma::requestVenda($_POST['notificationCode']);

         
        return $venda;
        
    }
    


    if(isset($req->reference)){
       // $auxvend = explode("-", $req->reference);
       // return  $auxvend[0];
       return "abriel";
    }
    return $req;

 
    

   }


   public static function requestVenda(){


   }
   
  


}
