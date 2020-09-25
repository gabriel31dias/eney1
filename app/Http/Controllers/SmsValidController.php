<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SmsController;

class SmsValidController extends Controller
{
    
    public function sendSmsToken($telefone){
      return  $this->sendSinglesms('0030015529',$telefone,'dwadaw token dwadwadadawdw5555');
   }
}
