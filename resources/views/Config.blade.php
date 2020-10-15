@extends('layouts.base')
@section('content')
<script src="/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<meta name="_token" content="{{ csrf_token() }}">

<script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js
"></script>

<link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
   />

   <script src='https://bgrins.github.io/spectrum/spectrum.js'></script>
<link rel='stylesheet' href='https://bgrins.github.io/spectrum/spectrum.css' />
   <style>

*:focus {
outline: none;
}
* {
font-family: sans-serif;
}
:root {
    --color1:hsl(1, 100%, 50%);
    --color2:hsl(1, 100%, 50%);
    --color3:hsl(1, 100%, 50%);
}
#div1 {
position: absolute;
width: 300.1499938964844px;
height: 450px;
background: white;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);
text-align: center;
/* border: solid 2px silver; */
border-radius: 20px;
resize: none;
}
#view {
position: absolute;
top: 0;
width: 100%;
height: 40%;
border-top-left-radius: 20px;
border-top-right-radius: 20px;
}
#colors {
position: absolute;
bottom: 0;
width: 100%;
height: 60%;
}
.inp {
width: 90%;
height: 8px;
border-radius: 20px;
margin: 13px 0;
-webkit-transition: 0.3s;
}
#inp1, #inp2, #inp3 {
-webkit-appearance: none;
-moz-appearance: none;
/* position: absolute; */
/* top: 50%;
left: 50%;
transform: translate(-50%, 50%); */
background: linear-gradient();
}
#inp1::-webkit-slider-thumb {
    background: var(--color1);
}
#inp2::-webkit-slider-thumb {
    background: var(--color2);
}
#inp3::-webkit-slider-thumb {
    background: var(--color3);
}

.inp::-webkit-slider-thumb {
-webkit-appearance: none;
width: 20px;
height: 20px;
border: solid 2px white;
background: #f2f2f2;
/* box-shadow: inset 0 0 2px silver; */
border-radius: 50%;
}
input[type="range"]::-moz-range-thumb {
-moz-appearance: none;
width: 25px;
height: 25px;
border: solid 1px #f2f2f2;
background: #f2f2f2;
box-shadow: inset 0 0 2px silver;
border-radius: 50%;
}
#txt {
    margin:13px 0;
    padding: 8px;
    border: solid 1px silver;
    border-radius: 5px;
    text-align: center;
    background: #ffffff;
}
#copy {
    padding: 8px 8px;
    border-radius: 5px;
    border: solid 1px silver;
    background: #ffffff;
    cursor: pointer;
    margin:13px 0;
    -webkit-transition: 0.3s;
}
#copy:hover {
    background: #f1f1f1;
}
@media only screen and (max-width: 700px) {
#copy {
    cursor: default;
}
}

.label-info {
    background-color: #00b0e4;
    height: 20px;
    font-size: 20px;
}
       input, button, select, textarea {
    height: 40px;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
       /* Esconde o input */
input[type='file'] {
  display: none
}

/* Aparência que terá o seletor de arquivo */
#kk {
  background-color: #3498db;
  border-radius: 5px;
  color: #fff !important;
  cursor: pointer;
  margin: 10px;
  padding: 6px 20px
}
      .dataTables_wrapper .dataTables_filter {
float: right;
text-align: right;
visibility: hidden;
}
.custom-input-class::-webkit-input-placeholder {
  color: #f00 !important;
  opacity: 1 !important;
}
   </style>
<script src="../binjs/helpersvers.js"></script>
<style>
</style>
<script src="../binjs/clientes.js"></script>
<script src="../helpers.js"></script>
<div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
         <div class="header">
            <h2 style="margin:10px 10px 10px 10px; " >
               Configurações loja - Todas essas Configurações serão exibidas para os clientes
            </h2>
            



          
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#home" data-toggle="tab" aria-expanded="true"> <i class="large material-icons">build</i>Configurações de loja</a></li>
                    <li role="presentation" class=""><a href="#profile" data-toggle="tab" aria-expanded="false">  <i class="large material-icons">brush</i>
                        Designer</a></li>

                        <li role="presentation" class=""><a href="#bandeiras" data-toggle="tab" aria-expanded="false">  <i class="large material-icons">card_membership</i>
                            Configurações de pagamento</a></li>


                        
                </ul>





                

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home">
                        <form method="GET" action="{{route('configsave')}}">
                        <input style="display: none" type="text" value="{{$iduser}}"  id="ID_USER" name="ID_USER" class="form-control">
                        <div class="form-line">
                            <label class="form-label">Nome empreendimento:</label>
                            <input name="nome_estabelecimento" value="{{$usercf->nome_estabelecimento ?? ''}}" id="nome_estabelecimento" type="text" class="form-control">
                           
                        </div>
                        <p>

                            <div class="form-line">
                                <label class="form-label">Nome representante:</label>
                                <input value="{{$usercf->nome_repre ?? ''}}" name="nome_repre" id="nome_repre" type="text" class="form-control">
                               
                            </div>
                            <p>

                        <div class="form-line">
                            <label class="form-label">Celular Whatsapp 1:</label>
                            <input  value="{{$usercf->telefone1 ?? ''}}" name="telefone1"  name="telefone1" type="text" class="form-control">
                           
                        </div>
                        <p>
                        <div class="form-line">
                            <label class="form-label">Telefone ou Celular 2:</label>
                            <input value="{{$usercf->telefone2 ?? ''}}" name="telefone2"  name="telefone2" type="text" class="form-control">
                        </div>
                    <br>

                    
                    
                   

                    <div class="demo-checkbox">
                        <div class="row">

                        <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                            <h3>Hora de entrada</h3>
                            <input  type="time"  class="form-control" name="horarioinicio" id="horarioinicio" value="{{$usercf->horarioinicio ?? ''}}"  type="text" />
                            </div>
        
                            <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                                <h3>Hora de saida</h3>
                                <input  type="time" class="form-control" name="horariofinal" id="horariofinal" value="{{$usercf->horariofinal ?? ''}}" type="text" />
                            </div>
                            
                    </div>
                    </div>

                    
                    <br> <br>
                    <div class="row">
                     
                                        
                  </div>


                    <br>
                    <div class="row">
                    <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                    <h3>Entrega gratis, a partir de</h3>
                    <input onfocus="masc(this)"  class="form-control" name="MINIMOPRECOENTREGAGRATIS" id="MINIMOPRECOENTREGAGRATIS" value="{{$usercf->MINIMOPRECOENTREGAGRATIS ?? ''}}"  type="text" />
                    </div>

                    <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                        <h3>Preço da entrega</h3>
                        <input onfocus="masc(this)" class="form-control" name="PRECOENTREGA" id="PRECOENTREGA" value="{{$usercf->PRECOENTREGA ?? ''}}" type="text" />
                    </div>
                    
                      
                    
                    
                
                    
                    </div>
                      
                   
                  

                    
                    <br>
                    <div class="row">
                    <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                    <h3>Facebook link</h3>
                    <input   class="form-control" name="FACEBOOK" id="FACEBOOK" value="{{$usercf->FACEBOOK ?? ''}}"  type="text" />
                    </div>

                    <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                        <h3>Instagram Link</h3>
                        <input  class="form-control" name="TWITTER" id="TWITTER" value="{{$usercf->TWITTER ?? ''}}" type="text" />
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                        <h3>Facebook link</h3>
                        <input   class="form-control" name="YOUTUBE" id="YOUTUBE" value="{{$usercf->YOUTUBE ?? ''}}"  type="text" />
                        </div>
    
                        <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                            <h3>Youtube Link</h3>
                            <input  class="form-control" name="INSTAGRAM" id="INSTAGRAM" value="{{$usercf->INSTAGRAM ?? ''}}" type="text" />
                        </div>
                    </div>
                
                    <br>
                     <br>  <br>
                    <h3>Selecione o meio de pagamento eletrônico padrão</h3>
                    <br>
                    <p>
                        <div class="demo-switch">
                            <div class="switch">
                                 CieloCheckout<br><label>OFF<input class="payment_opt" onclick="UpdatePayment(1)" id="payment1" type="checkbox" checked="true"><span class="lever"></span>ON</label>
                            </div>
                            <div class="switch">
                                Pagseguro<br><label>OFF<input class="payment_opt" onclick="UpdatePayment(2)" type="checkbox" id="payment2" name="pagseguro" checked=""><span class="lever"></span>ON</label>
                            </div>
                        </div>
                        <div class="row">
            
                            <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                                <h3>Código cielo</h3>
                                <input type="text"  class="form-control" name="cielocode" id="cielocode" value="{{$usercf->cielocode ?? ''}}">
                            </div>
            
                                <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                                    <h3>Código Skytef</h3>
                                    <input type="text"  class="form-control" name="redecode" id="redecode"  value="{{$usercf->redecode ?? ''}}">
                                </div>

                                <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                                    <h3>Email Pagseguro</h3>
                                    <input type="text" class="form-control" name="emailpagseguro" id="emailpagseguro"  value="{{$usercf->emailpagseguro ?? ''}}">
                                </div>

                                <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                                    <h3>Código Pagseguro</h3>
                                    <input type="text" class="form-control" name="pagsegurocode" id="pagsegurocode"  value="{{$usercf->pagsegurocode ?? ''}}">
                                </div>
                        </div>
                        <br>
                        <br>
                    <input class="btn bg-blue waves-effect" type="submit" value="Salvar">

                    </form>
            
        </div>

                      
                    <div role="tabpanel" class="tab-pane fade" id="profile">
                    
                      
                 
                
                    <div class="card">
                        <div class="header">
                            <h2>
                             IMAGEM DA LOJA
                                <small>utilize uma imagem com boa resulução</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        
                        <div class="body">
                            <div class="button-demo">
                                <center >

                                    <form action="{{route('updateimage')}}" method="post">

                                        @csrf

                                    <input style="display: none" type="text" value="{{$iduser}}"  id="ID_USER" name="ID_USER" class="form-control">

                                    <input id="selecao-arquivo"  type='file' accept='image/*' onchange='openFile(event)'><br>

                                    <input style="display: none" src="{{$usercf->imagem_loja ?? ''}}"  id='imagem_loja' name="imagem_loja" type="text">
                                    <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6">
                                    <img src="{{$usercf->imagem_loja ?? ''}}" id='output' style="height:300px; width:300px;">
                                    <br>
                                    <label for='selecao-arquivo' id="kk">Selecionar imagem para a loja</label>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6">
                                    <br>
                                    <input style="padding: 500px" value="{{$usercf->COR1 ?? ''}}" type='text' id="customhead" name="customhead" />
                                    <br>
                                    <h3 for='selecao-arquivo' id="kk">Cor cabeçalho</h3>

                                    
                                    </div>

                                    <div class="col-xs-12 col-lg-4 col-md-4 col-sm-6">

                                  
                                    <br>
                                    <input style="padding: 500px" type='text' value="{{$usercf->COR2 ?? ''}}" id="custombody" name="custombody"/>
                                    <br>
                                    <h3 for='selecao-arquivo' id="kk">Cor corpo</h3>
                                    <br>

                                    </div>
                                    <br>


                                    <input id="save" class="btn bg-blue waves-effect" type="submit" value="Salvar">



                                </form>
                                </center>
            
                            </div>
                        </div>
                    </div>
                
                
                
                
                </div>


                    
                <form method="GET" action="{{route('configsave')}}">
                    <div role="tabpanel" class="tab-pane fade" id="bandeiras">
                      
                                    
                                    <br>
                                    <input id="save" class="btn bg-blue waves-effect" type="submit" value="Salvar">

                            </div>
                        </p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="settings">
                        <b>Settings Content</b>
                        <p>
                            Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                            Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                            pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                            sadipscing mel.
                        </p>
                    </div>
                </div>

            <
        
</section>


<script>


var openFile = function(file) {
   document.getElementById('save').disabled = true;
    var input = file.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
    setTimeout(function(){
        document.getElementById('imagem_loja').value = document.getElementById('output').src
        document.getElementById('save').disabled = false;
    },1000)
  

  };
   


  $("#customhead").spectrum({
    preferredFormat: "hex",
    flat: true,
    showInput: true,
    allowEmpty:true
 });

 $("#custombody").spectrum({
    preferredFormat: "hex",
    flat: true,
    showInput: true,
    allowEmpty:true
 });
 
 
 
 function masc(val) {
   $(val).maskMoney({
      prefix: "",
      decimal: ".",
      thousands: ","
   });
   }

   
   var items_payments = document.getElementsByClassName("payment_opt");
     
     for(let item of items_payments){
         item.checked = false
         console.log('dis lect')
     }

   document.getElementById(`payment{{$usercf->fpagamentoeletronico ?? ''}}`).checked = true;



   async function UpdatePayment(valor) {
    var items_payments = document.getElementsByClassName("payment_opt");
     
    for(let item of items_payments){
        item.checked = false
    }
    
     document.getElementById(`payment${valor}`).checked = true

      

    let get_id_user = document.getElementById('ID_USER').value
       let Obj_payment = {
         iduser: get_id_user,
         idpayment:valor
       }

        $.ajax({
            url: '{{route("configPaymentDefault")}}',
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
               alert("sucesso")
               console.log(data)
            },
            error: function (request) {
                alert("error")
                console.log(request)
                
            },
            data: Obj_payment
        });
       
   }






  

       
</script>
@stop