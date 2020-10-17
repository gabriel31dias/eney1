<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \PagSeguro;
USE DB;
use App\Temp;


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
    private $taxadlv;
    private $getemailpagseguro;
    private $getcodpagseguro;
  //  private $url_notificacao  = 'https://ws.pagseguro.uol.com.br/v2/transactions/notifications/';
    private $url_notificacao  = 'https://ws.pagseguro.uol.com.br/v2/transactions/notifications/';
    private $email_token = "";//NÃO MODIFICAR
    
   ///https://www.youtube.com/watch?v=Emsh-hIadx0


    public function __construct($cod){
        $user = DB::table('users')->where('codigo_estabelecimento',$cod)->first();
        $this->getemailpagseguro =  $user->emailpagseguro;
        $this->getcodpagseguro =  $user->pagsegurocode;
        $temp = new Temp();
        $this->temp = $temp;
        $this->email_token = "?email=".$this->getemailpagseguro."&token=".$this->getcodpagseguro;
    }
  
    public function addMerchantId($mercantid){
        $this->Mercantid = $mercantid;
       return $this;
    }

    public function executa(){
                   // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/

        $text_payment = '';
        if(!$this->taxadlv == '0.00'){
            $text_payment = 'Total em produtos, mais entrega';
        }else{
            $text_payment = 'Total em produtos ';
        }
        $this->getemailpagseguro =  $this->getEmailPagseguro();
        $this->getcodpagseguro =  $this->getTokenPagseguro() ;
        $ch = curl_init();
       // curl_setopt($ch, CURLOPT_URL, 'https://ws.pagseguro.uol.com.br/v2/checkout?email=gabrieldias@keemail.me&token=a6d998a5-b3a0-43c4-b1e2-84b69e347c52a97cd4b049dbb5325d003db5c6bc0bf7e77d-f4a8-4fa0-a4e2-1d1c3a890f0c');
        curl_setopt($ch, CURLOPT_URL, 'https://ws.pagseguro.uol.com.br/v2/checkout?email='.$this->getemailpagseguro.'&token='.$this->getcodpagseguro.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$this->getemailpagseguro."&token=".$this->getcodpagseguro."&currency=BRL&itemId1=001&itemDescription1=".$text_payment."%201&itemAmount1=".$this->valor_total + $this->taxadlv ."&itemQuantity1=1&reference=".$this->OrderNumber."&senderName=gabriel dias%20Green&senderAreaCode=51&senderPhone=".$this->soNumero($this->Telefone)."&senderEmail=".$this->Email."&shippingAddressRequired=true&extraAmount=0.00");
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $xml=simplexml_load_string( $result ) or die("Error: Cannot create object");
      //  $checkoutUrl = "https://pagseguro.uol.com.br/v2/checkout/payment.html?code=" . $xml->code;
      $checkoutUrl = "https://pagseguro.uol.com.br/v2/checkout/payment.html?code=" . $xml->code;
       $getcodeloja = explode("-", $this->OrderNumber); 
      
        DB::table('calbackpagseguro')->insert(
          ['code_loja' =>  $getcodeloja[0] , 'tokenvenda' => $xml->code ]
        );
    
        return  $checkoutUrl;
    }

    public function getEmailPagseguro(){
       $getcodeloja = explode("-", $this->OrderNumber);
       $getemailpg = DB::table('users')->where('codigo_estabelecimento',$getcodeloja[0])->first();
       $getemailpg = $getemailpg->emailpagseguro ;
       return   $getemailpg;
    }

    public function getTokenPagseguro(){
        $getcodeloja =  explode("-", $this->OrderNumber);
        $gettokenpg = DB::table('users')->where('codigo_estabelecimento',$getcodeloja[0])->first();
        $gettokenpg =  $gettokenpg->pagsegurocode;
        return  $gettokenpg;
    }

    public function soNumero($str) {
        $data ="996519810";
        return preg_replace("/[^0-9]/", "",  $data);
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
        if(isset($req->notificationType) && $req->notificationType == 'transaction'){
            $response = $this->executeNotification($_POST);
            if( $response->status==3 || $response->status==4 ){
                //PAGAMENTO CONFIRMADO
                //ATUALIZAR O STATUS NO BANCO DE DADOS
                return true;
                
            }else{
                //PAGAMENTO PENDENTE
                return false;
            }
        }
    }

    public function getproperty_ident_venda($req){
      
      return  $req->order_number;

    }

    public function set_valor_total($value){
        
        $nombre_format_francais = number_format( $value, 2, '.', ' ');
        $this->valor_total =  $nombre_format_francais  ;
        return $this;
    }

    public function set_taxa_deliv($value){
        $this->taxadlv = $value;
        return $this;
    }

    public function getIdentId(){

    }


    //RECEBE UMA NOTIFICAÇÃO DO PAGSEGURO
	//RETORNA UM OBJETO CONTENDO OS DADOS DO PAGAMENTO
	public function executeNotification($POST){
		$url = $this->url_notificacao.$POST['notificationCode'].$this->email_token;
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		
		$transaction= curl_exec($curl);
		if($transaction == 'Unauthorized'){
			//TRANSAÇÃO NÃO AUTORIZADA
			
		    exit;
		}
        curl_close($curl);
        
        $transaction_obj = simplexml_load_string($transaction);
       
        $transaction_ob = json_encode($transaction_obj);
        $tt =  $this->temp;
        $tt =  $tt->create(['value'=>  $transaction_ob ]);

        return $transaction_obj;		 
	}



}
