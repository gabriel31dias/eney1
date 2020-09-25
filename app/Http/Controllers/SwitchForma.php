<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SwitchForma extends Controller
{

    private $user;
    private $iduser;

    public function __construct($iduser){
        $this->user->find(1)->first();
      
        $this->setForma();
    }

   public function setForma(){

      $user =  $this->user;
    
      switch ($user->fpagamentoeletronico) {
        case 1:
            return "CieloCheckoutlink";
            break;
        case 2:
            return "RedeCheckoutlink";
            break;
       }

   }
   
  


}
