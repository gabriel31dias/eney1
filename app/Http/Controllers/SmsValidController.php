<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SmsController;
use App\Validatestoken;

class SmsValidController extends Controller
{
    
    public function sendSmsToken($telefone){
      $sms = new SmsController();
      $generatetoken = rand(100,1000);
      $newtoken = new Validatestoken();
      $newtoken->token = $generatetoken;
      $newtoken->save();
      return   $sms->sendSinglesms('0030015529',$telefone,'O seu token do WebApp é'.$generatetoken );
   }

}
