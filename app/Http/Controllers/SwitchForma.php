<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SwitchForma extends Controller
{

    private $user;
    private $iduser;

    public function __construct(User $user,$iduser){
        $this->user = $user;
        $this->iduser = $iduser;
        $this->setForma($iduser);
    }

   public function setForma($id){

      $user =  $this->user->find($id)->first();
    
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
