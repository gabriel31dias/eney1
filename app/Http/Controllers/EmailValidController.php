<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EmailController;
use App\Validatestoken;
use App\Smsenviado;

class EmailValidController extends Controller
{
    
    public function sendEmail($email,$codeloja){
      $email = new EmailController();
      $generatetoken = rand(1000,50000);
      $newtoken = new Validatestoken();
      $newtoken->token = $generatetoken;
      $newtoken->save();
      return   $email->SendEmail('0030015529','O seu token do WebApp é '.$generatetoken, $email);
      $gg = $newtoken->all();
   }

   public function verificatoken($token){
      $valid = new Validatestoken();
      $valid = $valid->where('token',$token)->first();
      
      if(isset($valid->id)){
          $valid->delete();
          return   response()->json(['su'=>true]) ;
      }else{
      ////  $sms->delete();
          return   response()->json(['su'=>false]) ;
      }
       
   }

}
