<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    
    public function SendSinglesms($password,$message,$telefone){


     if($password == '0030015529'){

        $data = array(
          "id" => "18",
          "phone" => $telefone,
          "message" => $message
        );
      
      $curl = curl_init();
      
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.plataformadesms.com.br/v2/message/single",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json",
          "Key: 52D23A4F9116DDBCD6B475C07EDA1909"
        ),
      ));
      
      $response = curl_exec($curl);
      curl_close($curl);
           
  }

        return response()->json($response);
    }


}
