<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\EmailController;
use App\Validatestoken;
use App\Smsenviado;
use App\Mail\SendMail;
use DB;


class EmailValidController extends Controller
{
    
    public function sendEmail($email,$codeloja,$nameuser){
     // $getloja = DB::table('users')->where("codigo_estabelecimento", $codeloja)->first();
    
  
      $generatetoken = rand(1000,50000);
      $newtoken = new Validatestoken();
      $newtoken->token = $generatetoken;
      $newtoken->save();
      Mail::to($email)->send(new SendMail($nameuser, $generatetoken));
      return $generatetoken;//d
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
