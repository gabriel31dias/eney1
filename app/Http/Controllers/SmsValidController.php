<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SmsController;
use App\Validatestoken;
use App\Smsenviado;
use Session;
class SmsValidController extends Controller
{
    
    public function sendSmsToken($telefone,$codeloja){
      $sms = new SmsController();
      $generatetoken = rand(1000,50000);
      $newtoken = new Validatestoken();
      $newtoken->token = $generatetoken;
      $newtoken->save();
      $smssave = new Smsenviado();
      $smssave =  $smssave->create(['code_loja'=>$codeloja ,'telefone'=>$telefone]);
      return   $sms->sendSinglesms('0030015529','O seu token do WebApp é '.$generatetoken, $telefone );
      $gg = $newtoken->all();
   }

   public function verificatoken($token){
      $sms = new Validatestoken();
      $sms = $sms->where('token',$token)->first();
      
      if(isset($sms->id)){
        $sms->delete();
          Session::put('usertemp_vr', "0030015529");
          return   response()->json(['su'=>true]) ;
      }else{
      ////  $sms->delete();
          return   response()->json(['su'=>false]) ;
      }
       
   }

}
