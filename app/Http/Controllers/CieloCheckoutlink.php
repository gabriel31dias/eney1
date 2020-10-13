<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class CieloCheckoutlink extends Controller 
{

    private $Mercantid;
    private $Products;
    private $Address;
    private $Cep;
    private $Bairro;
    private $Number;
    private $Complemento;
    private $Cidade;
    private $Estado;
    private $Name;
    private $Telefone;
    private $Email;
    private $OrderNumber;
    private $UrlReturn;
    

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
           CURLOPT_TIMEOUT => 0, //dwadwadw
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => "POST",
           CURLOPT_POSTFIELDS =>"{  \n   \"OrderNumber\":\"".$this->OrderNumber."\",\n   \"SoftDescriptor\":\"Exemplo\",\n   \"Cart\":{  \n      \"Discount\":{  \n         \"Type\":\"Percent\",\n         \"Value\":00\n      },\n      \"Items\":".$this->Products."\n   },\n   \"Shipping\":{  \n      \"SourceZipCode\":\"".$this->Cep."\",\n      \"TargetZipCode\":\"".$this->Cep."\",\n      \"Type\":\"FixedAmount\",\n      \"Services\":[  \n         {  \n            \"Name\":\"Motoboy\",\n            \"Price\":1,\n            \"Deadline\":15,\n            \"Carrier\":null\n         },\n         {  \n            \"Name\":\"UPS Express\",\n            \"Price\":1,\n            \"Deadline\":2,\n            \"Carrier\":null\n         }\n      ],\n      \"Address\":{  \n         \"Street\":\"".$this->Address."\",\n         \"Number\":\"".$this->Number."\",\n         \"Complement\":\"".$this->Complemento."\",\n         \"District\":\"".$this->Bairro."\",\n         \"City\":\"".$this->Cidade."\",\n         \"State\":\"".$this->Estado."\"\n      }\n   },\n   \"Payment\":{  \n      \"BoletoDiscount\":15,\n      \"DebitDiscount\":10,\n      \"Installments\":null,\n      \"MaxNumberOfInstallments\": null\n   },\n   \"Customer\":{  \n      \"Identity\":\"\",\n      \"FullName\":\"".$this->Name."\",\n      \"Email\":\"".$this->Email."\",\n      \"Phone\":\"".$this->Telefone."\"\n   },\n   \"Options\":{  \n     \"AntifraudEnabled\":true,\n     \"ReturnUrl\": \"".$this->UrlReturn."\"\n   },\n   \"Settings\":null\n}\n",
           CURLOPT_HTTPHEADER => array(
        "MerchantId: ".$this->Mercantid,
        "Content-type: application/json",
        "Cookie: ARRAffinity=24b69ec43a385a35f00243c885d57b9207d8ca54474a7de7492216dc4f81280d"
         ),
         ));
        $response = curl_exec($curlx);
        curl_close($curlx);
        $response = json_decode($response);
        return $response->settings->checkoutUrl;
    }

    public function AddProductList($products){
        $this->Products = $products;
        return $this;
    }

    public function setAddress($value){
        $this->Address = $value;
        return $this;
    }

    public function setCep($value){
        $this->Cep = $value;
        return $this;
    }

    public function setBairro($value){
        $this->Bairro = $value;
        return $this;
    }

    public function setComplemento($value){
        $this->Complemento = $value;
        return $this;
    }

    public function setNumber($value){
        $this->Number = $value;
        return $this;
    }

  
    public function setCidade($value){
        $this->Cidade = $value;
        return $this;
    }

    public function setEstado($value){
        $this->Estado = $value;
        return $this;
    }

    public function setName($value){
        $this->Name = $value;
        return $this;
    }

    public function setTelefone($value){
       $this->Telefone = $value;
       return $this;
    }

    public function setEmail($value){
       $this->Email = $value;
       return $this;
    }

    public function setOrderNumber($value){
        $this->OrderNumber = $value;
        return $this;

    }

    public function setUrlReturn($value){
        $this->UrlReturn = $value.$this->OrderNumber;
        return $this;
    }


    public function Writemercantid(){
        
        return $this->Mercantid;
    }

    public function Writenumber(){
        return $this->Number;
    }
    
    public function VerifyPayment($req){
        if($req->payment_status == '2'){
            return true;
        }
    }

    public function getproperty_ident_venda($req){
      
      return  $req->order_number;

    }

    public function __call($name, array $args)
    {
        return $this;
    }

    

}
