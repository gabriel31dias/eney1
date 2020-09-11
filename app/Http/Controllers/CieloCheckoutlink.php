<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CieloCheckoutlink extends Controller
{

    private $Mercantid;
    private $Producs;
   ///https://www.youtube.com/watch?v=Emsh-hIadx0
  
    public function addMerchantId($mercantid){
      $this->Mercantid = $mercantid;
      return $this;
    }

    public function executa(){
        $curlx = curl_init();
        curl_setopt_array($curlx, array(
           CURLOPT_URL => "https://cieloecommerce.cielo.com.br/api/public/v1/orders",
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => "",
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 0,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => "POST",
           CURLOPT_POSTFIELDS =>"{  \n   \"OrderNumber\":\"Pedido013232\",\n   \"SoftDescriptor\":\"Exemplo\",\n   \"Cart\":{  \n      \"Discount\":{  \n         \"Type\":\"Percent\",\n         \"Value\":00\n      },\n      \"Items\":[  \n         {  \n            \"Name\":\"wohax sistema\",\n            \"Description\":\"sistema xxx\",\n            \"UnitPrice\":100,\n            \"Quantity\":1,\n            \"Type\":\"Asset\",\n            \"Sku\":\"ABC001\",\n            \"Weight\":500\n         },\n        ]\n   },\n   \"Shipping\":{  \n      \"SourceZipCode\":\"20020080\",\n      \"TargetZipCode\":\"21911130\",\n      \"Type\":\"FixedAmount\",\n      \"Services\":[  \n         {  \n            \"Name\":\"Motoboy\",\n            \"Price\":1,\n            \"Deadline\":15,\n            \"Carrier\":null\n         },\n         {  \n            \"Name\":\"UPS Express\",\n            \"Price\":1,\n            \"Deadline\":2,\n            \"Carrier\":null\n         }\n      ],\n      \"Address\":{  \n         \"Street\":\"Rua Cambui\",\n         \"Number\":\"92\",\n         \"Complement\":\"Apto 201\",\n         \"District\":\"Freguesia\",\n         \"City\":\"Rio de Janeiro\",\n         \"State\":\"RJ\"\n      }\n   },\n   \"Payment\":{  \n      \"BoletoDiscount\":15,\n      \"DebitDiscount\":10,\n      \"Installments\":null,\n      \"MaxNumberOfInstallments\": null\n   },\n   \"Customer\":{  \n      \"Identity\":\"84261300206\",\n      \"FullName\":\"Test de Test\",\n      \"Email\":\"test@cielo.com.br\",\n      \"Phone\":\"21987654321\"\n   },\n   \"Options\":{  \n     \"AntifraudEnabled\":true,\n     \"ReturnUrl\": \"http://www.cielo.com.br\"\n   },\n   \"Settings\":null\n}\n",
           CURLOPT_HTTPHEADER => array(
        "MerchantId: 35c778b2-f9b1-478c-bc7a-2667f6027652",
        "Content-type: application/json",
        "Cookie: ARRAffinity=24b69ec43a385a35f00243c885d57b9207d8ca54474a7de7492216dc4f81280d"
         ),
         ));
       $response = curl_exec($curlx);
       curl_close($curlx);
       return $response;
    }

 


    public function AddProductList($products){
    

        $this->Producs = $products;
        return $this;
    }

    public function Writemercantid(){

        return $this->Mercantid;
    }

    
    
    
 






}
