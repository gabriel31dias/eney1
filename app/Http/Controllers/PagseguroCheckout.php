<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \PagSeguro;

class PagseguroCheckout extends Controller 
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
    private $valor_total;
    
    

   ///https://www.youtube.com/watch?v=Emsh-hIadx0
  
    public function addMerchantId($mercantid){
      $this->Mercantid = $mercantid;
      return $this;
    }

    public function executa(){
                   // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://ws.pagseguro.uol.com.br/v2/checkout?email=gabrieldias@keemail.me&token=a6d998a5-b3a0-43c4-b1e2-84b69e347c52a97cd4b049dbb5325d003db5c6bc0bf7e77d-f4a8-4fa0-a4e2-1d1c3a890f0c');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "email=gabrieldias@keemail.me&token=a6d998a5-b3a0-43c4-b1e2-84b69e347c52a97cd4b049dbb5325d003db5c6bc0bf7e77d-f4a8-4fa0-a4e2-1d1c3a890f0c&currency=BRL&itemId1=001&itemDescription1=Items teste%201&itemAmount1=".$this->valor_total."&itemQuantity1=10&reference=124665c23f7896adff508377925&senderName=gabriel dias%20Green&senderAreaCode=51&senderPhone=988888888&senderEmail=gabrieldias@pagseguro.com.br&shippingAddressRequired=true&extraAmount=0.00");
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $xml=simplexml_load_string( $result ) or die("Error: Cannot create object");
        $checkoutUrl = "https://pagseguro.uol.com.br/v2/checkout/payment.html?code=" . $xml->code;
        return  $checkoutUrl;
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

    public function set_valor_total($value){
        $this->valor_total = $value ;
        return $this;
    }


    public function __call($name, array $args)
    {
        echo "";
    }

    
    
    

}
