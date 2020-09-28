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

    public function __construct($iduser){
        $this->user = new User;
        $this->user = $this->user->where('codigo_estabelecimento',$iduser)->first();
    }

   public function getForma(){

      $user =  $this->user;
    
      switch ($user->fpagamentoeletronico) {
        case 1:
            return new CieloCheckoutlink();
            break;
        case 2:
            return new RedeCheckoutlink();
            break;
       }

       return new CieloCheckoutlink();

   }

   public static function getcodeloja($req){

      $auxvend = explode("-", $req->order_number);
      return  $auxvend[0];

   }
   
  


}
