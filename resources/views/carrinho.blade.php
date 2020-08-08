
<!DOCTYPE HTML>
<html>
	<head>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
       
	<!-- jQuery -->
	<script src="/lojavers/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/lojavers/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/lojavers/js/bootstrap.min.js"></script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Serviços - Restaurante Saboroso!</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Site do restaurante fictício Saboroso desenvolvido no curso de JavaScript da Hcode Treinamentos"
		/>
		<meta name="author" content="Hcode.com.br" />

		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

		<meta name="theme-color" content="#FBB448">
	
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!-- Animate.css -->
		<link rel="stylesheet" href="/lojavers/css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="/lojavers/css/icomoon.css">
		<!-- Themify Icons-->
		<link rel="stylesheet" href="/lojavers/css/themify-icons.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="/lojavers/css/bootstrap.css">
	
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="/lojavers/css/magnific-popup.css">
	
		<!-- Bootstrap DateTimePicker -->
		<link rel="stylesheet" href="/lojavers/css/bootstrap-datetimepicker.min.css">
	
		<!-- Owl Carousel  -->
		<link rel="stylesheet" href="/lojavers/css/owl.carousel.min.css">
		<link rel="stylesheet" href="/lojavers/css/owl.theme.default.min.css">
	
		<!-- Theme style  -->
		<link rel="stylesheet" href="/lojavers/css/style.css">
	
		<!-- Modernizr JS -->
		<script src="/lojavers/js/modernizr-2.6.2.min.js"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
        <![endif]-->
        
        <style>
		       .actionx:hover {
              background-color:darkgrey;
              color:white!important;
           }

        </style>
	
	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
	
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo">
						<a href="index.html">Saboroso
							<em>!</em>
						</a>
					</div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li>
							<a href="index.html">Home</a>
						</li>
						<li>
							<a href="menu.html">Menu</a>
						</li>
						<li>
							<a href="services.html">Serviços</a>
						</li>
						<li>
							<a href="contact.html">Contato</a>
						</li>
						<li class="btn-cta">
							<a href="reservation.html">
								<span>Reserva</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
	
		</div>
	</nav>
	
	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Selecione o grupo do cardapio</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
	
			@isset($grupos)
			@foreach ($grupos as $item)
			
				
				 

				<a onclick="setgrupo('/{{$item->NOME_GRUPO}}')" style="padding: 10px" class="grupos actionx col-xs-3 col-lg-3 col-md-3 col-sm-3">
					
						<center>
							<img style="height:80px;width:100%" src="{{$item->IMG}}" alt="Image" class="img-responsive">
	
						
						
						<div class="fh5co-text">
							<p  style="color:#FBB448"> {{ ucfirst(trans($item->NOME_GRUPO)) }}</p>
							
							<p>
							
              </p>

						</div>

					</center>
					</a>
				</a>
				
			@endforeach
		@endisset
	
		<div class="modal-footer">
		
		</div>
	  </div>
	</div>
  </div>

	<footer id="gtco-footer" role="contentinfo" style="background-image: url(images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-pb-md">


               
	
				<div class="col-md-12 text-center">
					<br>
					<br>
					<div class="gtco-widget">
						<h3>Redes Sociais</h3>
						<ul class="gtco-social-icons">
							<li>
								<a href="https://twitter.com/hcodebr">
									<i class="icon-twitter"></i>
								</a>
							</li>
							<li>
								<a href="https://www.facebook.com/hcodebr">
									<i class="icon-facebook"></i>
								</a>
							</li>
							<li>
								<a href="https://www.linkedin.com/company/grupo-hcode/">
									<i class="icon-linkedin"></i>
								</a>
							</li>
							<li>
								<a href="https://www.youtube.com/channel/UCjWENuSH2gX55-y7QSZiWxA">
									<i class="icon-youtube"></i>
								</a>
							</li>
						</ul>
					</div>
					
											<h3 style="color:#FBB448">Status <span style="color:green">Aberto</span></h3>
											<h3 style="color:#FBB448">Faça seu pedido </h3>

				</div>
				
			
	
				
			</div>
		
			<div class="dropdown">
            <div style="background-color: white" class="row">

                <div class="actionx col-xs-4 col-lg-4 col-md-4 col-sm-6">
                    <a  type="button"  data-toggle="modal" data-target="#exampleModal" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                        <p  style="text-align: center;margin-top:15px">
                            
                            <i  style="" class="material-icons">apps</i>
                            <br>
                            Grupos do cardapio
                        </p>
                    </a>
                </div>
        
              

                  
                <div class="actionx col-xs-4 col-lg-4 col-md-4 col-sm-6">
                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                        <p  style="text-align: center;margin-top:15px">
                            
                            <i  style="" class="material-icons">search</i>
                            <br>
                        Pesquisar produto
                        </p>
                    </a>
				</div>
				

				<div class="actionx col-xs-4 col-lg-4 col-md-4 col-sm-6">
                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                        <p  style="text-align: center;margin-top:15px">
                            
                            <i  style="" class="material-icons">add_shopping_cart
							</i>
                            <br>
                         Carrinho de compras
                        </p>
                    </a>
                </div>


                
    

                
           
              
              
            </div>

            
        

            
			  <br>
			  

			  <div class="fullscreen" id="wrapper">
			
		 
			  </div>

              
            <div style="max-height: 50px;"  class="row">
                

		  <h1 style="color:#FBB448">PRODUTOS EM SEU CARRINHO</h1>

		  <center>
			  <div class="row">
			<div  class="col-xs-12">
      
        <br>
        <br>
        <br>
        <h3 style="color:#1fe073;margin: 0 0 10px 0;"> 
          Valor total produtos R${{ number_format($totalemprodutos - $totaladc, 2) }} </h3>
      
        <h3 style="color:#FBB448; margin: 0 0 10px 0;">  Valor total adicionais  R${{ number_format($totaladc, 2) }} </h3>

        
        
        
		 </div>
		<div  class="col-xs-12">
		  <button type="button" onclick="finaliza_tela_1()" class="animated infinite pulse  btn btn-success"> <i class="large material-icons">check_circle</i><br>Finalizar compra <br>R${{ number_format($totalemprodutos   , 2) }} </button>
		</div>
			  </div>
  		  </center>
          <br>
            @isset($carrinho)
                @foreach ($carrinho as $item)
                
                <div  class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                    <a class="fh5co-card-item image-popup">
                        
                            <img  style="height:100%;width:100%" src="{{$item['img']}}" alt="Image" class="img-responsive">
    
                        <br>
                        <br>
                        
                        <div class="fh5co-text">
                            <h2>{{$item['nomeproduto']}} {{$item['tags_adicionais']}} </h2>
                            
                            <p>
                                <span class="price cursive-font"> {{ number_format($item['precoproduto'], 2) }} </span>
                            </p>

                            
                           
                            <button id="idtrigeremover" type="button" onclick="removerdocarrinho('{{$item['id']}}')" class="btn btn-danger">  <i style="margin-top:1px;"  class="large material-icons">close</i>remover</button>
                      
                        </div>
                    </a>
                </div>
                    
                @endforeach
                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                <center>
              
                </center>
                </div>
                </div>
            @endisset


            @isset($style)

             <style>

#gtco-footer .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background:{{$style['color1']}};
    -webkit-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
}

            </style>

          

            @endisset

        

               
		</div>
	</footer>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- Waypoints -->
	<script src="/lojavers/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="/lojavers/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="/lojavers/js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="/lojavers/js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="/lojavers/js/jquery.magnific-popup.min.js"></script>
	<script src="/lojavers/js/magnific-popup-options.js"></script>
	
	<script src="/lojavers/js/moment.min.js"></script>
	<script src="/lojavers/js/bootstrap-datetimepicker.min.js"></script>


	<!-- Main -->
	<script src="/lojavers/js/main.js"></script>


	</body>
</html>




<script>

  var lojacode = '{{$lojacod}}'

   $('.fh5co-text').click(function(){
      
    
      
   })

  function removerdocarrinho(id){

    location.href = "{{route('removeproduct')}}/"+id+"/"+lojacode

  // $.get('{{route('removeproduct')}}/'+id,function(data){
   
  /// }).done(function(){
     
     //setTimeout(function(){
     //  $getlojacode = '/{{$lojacod}}'
	    // $('html').html('');
     //  $('body').load('{{route('carrinho')}}'+$getlojacode);

    // },2000)


  // })


  }


   
	function limpa_formulário_cep() {
             //Limpa valores do formulário de cep.
             document.getElementById('ENDERECO').value=("");
             document.getElementById('BAIRRO').value=("");
             document.getElementById('CIDADE').value=("");
             document.getElementById('ESTADO').value=("");
            /// document.getElementById('ibge').value=("");
     }
   
     function meu_callback(conteudo) {
         if (!("erro" in conteudo)) {
             //Atualiza os campos com os valores.
             document.getElementById('ENDERECO').value=(conteudo.logradouro);
             document.getElementById('BAIRRO').value=(conteudo.bairro);
             document.getElementById('CIDADE').value=(conteudo.localidade);
             document.getElementById('ESTADO').value=(conteudo.uf);
             document.getElementById('ENDERECO').focus()
             document.getElementById('BAIRRO').focus()
             document.getElementById('CIDADE').focus()
             document.getElementById('ESTADO').focus()
             
             setTimeout(function(){
                document.getElementById('NUMEROR').focus()
                       
             },10)
   
   
   
           //  document.getElementById('ibge').value=(conteudo.ibge);
         } //end if.
         else {
             //CEP não Encontrado.
             limpa_formulário_cep();
             
   
             Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: 'CEP não encontrado.',
   })
         }
     }
         
     function pesquisacep(valor) {
   
    
         //Nova variável "cep" somente com dígitos.
         var cep = valor.replace(/\D/g, '');
   
         //Verifica se campo cep possui valor informado.
         if (cep != "") {
   
             //Expressão regular para validar o CEP.
             var validacep = /^[0-9]{8}$/;
   
             //Valida o formato do CEP.
             if(validacep.test(cep)) {
   
                 //Preenche os campos com "..." enquanto consulta webservice.
                 document.getElementById('ENDERECO').value="...";
                 document.getElementById('BAIRRO').value="...";
                 document.getElementById('CIDADE').value="...";
                 document.getElementById('ESTADO').value="...";
                // document.getElementById('ibge').value="...";
   
                 //Cria um elemento javascript.
                 var script = document.createElement('script');
   
                 //Sincroniza com o callback.
                 script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
   
                 //Insere script no documento e carrega o conteúdo.
                 document.body.appendChild(script);
   
             } //end if.
             else {
                 //cep é inválido.
                 limpa_formulário_cep();
               
   
                 Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: 'Formato de CEP inválido.',
   })
             }
         } //end if.
         else {
             //cep sem valor, limpa formulário.
             limpa_formulário_cep();
         }
     };
   
   
     function getFormData($form){
     var unindexed_array = $form.serializeArray();
     var indexed_array = {};
   
     $.map(unindexed_array, function(n, i){
         indexed_array[n['name']] = n['value'];
     });
   
     return indexed_array;
   }
    
   
   //-------------------------------------------------------------------------------------
	
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})


const temaapp = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-primary',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})
     
function setgrupo(grupo)
        {

			let resultado = grupo.replace(" ", "-");
			resultado = resultado.replace(" ", "-");
			resultado = resultado.replace(" ", "-");
			resultado = resultado.replace(" ", "-");
			

			$geturl = '{{route('get_loja')}}'
			$getlojacode = '/{{$lojacod}}'
			//alert($getlojacode+grupo)
			
		// $('html').html('');
        // $('body').load($geturl+$getlojacode+resultado);
		location.href = $geturl+$getlojacode+resultado
		}
			 
async function open_product(nomeproduto,preco,descr,img,id){

 const { value: formValues } = await swalWithBootstrapButtons.fire({
  closeOnClickOutside: false,
  allowOutsideClick: false,
  title: '<h1>'+ nomeproduto+'</h1>' ,
  width:500,showConfirmButton: false,


  confirmButtonText: 'Adicionar ao carrinho',
  html:
    `  <br>
        <br><h3>Preço: ${preco}</h3> ` +
    `<h3> ${descr}</h3>`+
	` <img style="height:30%;width:100%" src="${img}" >
	<br>
	<br>

	<button type="button"  onclick="add_adicionais()"  class="btn btn-primary">  <i style="margin-top:3px;" class="large material-icons">local_mall</i> ADICIONAIS</button>
	<button type="button" onclick="closeswal()" class="btn btn-danger">  <i style="margin-top:1px;"  class="large material-icons">close</i>FECHAR</button>
	<button type="button"  onclick="adicionar_carrinho('${id}','${nomeproduto}')"  class="animated infinite pulse btn btn-success">  <i style="margin-top:3px;"  class="large material-icons">shopping_cart</i>ADICIONAR AO CARRINHO</button>`,

  focusConfirm: false,
  preConfirm: () => {
    return [
      document.getElementById('swal-input1').value,
      document.getElementById('swal-input2').value
    ]
  }
})

if (formValues) {
  Swal.fire(JSON.stringify(formValues))
}

 }


 function closeswal(){
	swalWithBootstrapButtons.close()
	$( '.mfp-close' ).click();
 }


 async function adicionar_carrinho(id,nomeproduto){

  await $.get(`{{route("add_produto")}}${id}/${nomeproduto}`,function(data){
        alert(data)
  })

  Swal.fire(
    'Muito bom!',
    '<h3 style="color:#595959;">Produto adicionado ao carrinho com sucesso</h3>',
    'success'
    )

	$( '.mfp-close' ).click();
	
 }


 ///////////////////////////////////////

 async function tipodelv(){

   
  obj_venda = {
		room:lojacode,
    ID_USER:'{{$iduser}}',
		tipo:'novavenda',
    cep:document.getElementById('CEP').value,
    endereco:document.getElementById('ENDERECO').value,
    numero:document.getElementById('NUMERO').value,
    complemento:document.getElementById('COMPLEMENTO').value,
    pontoreferencia:document.getElementById('REFERENCIA').value,
    bairro:document.getElementById('BAIRRO').value,
    cidade:document.getElementById('CIDADE').value,
    uf:document.getElementById('ESTADO').value,

	}
   ///Selecao do tipo de retirada

const { value: formValues } = await temaapp.fire({
  closeOnClickOutside: false,
    allowOutsideClick: false,
  title: 'Selecione o tipo de retirada',
  width:600,
  confirmButtonText: 'Avançar',
  html:
    `
   <br>
   <br>

   <div class="form-group col-xs-6  col-md-6">
      <label for="inputZip">Qual seu nome ?</label>
	  <input type="text" value="" class="form-control"  id="nome" name="nome" placeholder="">

    </div>


    <div class="form-group col-xs-6  col-md-6">
      <label for="inputZip">Digite seu telefone ?</label>
	  <input type="text" class="form-control"  value="" id="telefone" name="telefone" placeholder="" >

    </div>

<div class="form-group col-xs-6  col-md-6">
      <label for="inputZip">Retirada no local</label>
	  <input type="radio" value="retirada" class="form-control"  id="retirada" name="tipodel" placeholder="">

    </div>


    <div class="form-group col-xs-6  col-md-6">
      <label for="inputZip">Entrega em domicílio</label>
	  <input type="radio" class="form-control"  value="entrega" id="entrega" name="tipodel" placeholder="" checked>

    </div>
    
` ,
    
  
})


obj_venda.nome = document.getElementById('nome').value 
obj_venda.telefone = document.getElementById('telefone').value 


   let retirada = $('#retirada:checked').val()

   alert(retirada)

   if(retirada){
     
   $.get('{{route('setretirada')}}/1',function(data){  //Seta como retirada
     }).done(function(){
      })

   }else{
   
   $.get('{{route('setretirada')}}/2',function(data){    //Seta como entrega
     }).done(function(){
    })

   }


   alert('entrou')
       if(document.getElementById('nome').value && document.getElementById('telefone').value){
          
        enviavenda()
      

       }else{
         alert('digite todos os campos')
       }
         

 }

 async function finaliza_tela_1(){
 
const { value: formValues } = await temaapp.fire({
  closeOnClickOutside: false,
    allowOutsideClick: false,
  title: 'Produtos adicionados',
  width:600,
  confirmButtonText: 'Avançar',
  html:
    `<BR>
	<table class="table table-dark">
  <thead style="background-color:#FBB448;" class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
	  
     
    </tr>
  </thead>
  <tbody>
   
      

	  @isset($carrinho)
                @foreach ($carrinho as $item)
				<tr>
					
				<td scope="row">{{$item['idproduto']}}</td>
				<td scope="row">{{$item['nomeproduto']}} <a style="color:red"> {{$item['tags_adicionais']}}<a></td>
				<td scope="row"> {{ number_format($item['precoproduto']  , 2) }}</td>

        
        
				
			</tr>

      
                    
                @endforeach

     <tr>
        <td scope="row"></td>
      	<td scope="row"> <a style="color:red"> Entrega delivery</a></td>
        <td > <a style="color:red"> 
        @if($valorentrega==0.00)
         Gratis
        @else
        {{ number_format($valorentrega  , 2) }}
        
        @endif
        
      
        
        
        </a></td>


      </tr>
               
      @endisset

     

    
  </tbody>
</table>

    <h1 style="color:#1fe073">Total {{ number_format($totalemprodutos + $valorentrega  , 2) }} </h1>
` ,
    
  
})

finaliza_tela_endereco()

 }


 
 







  
 async function finaliza_tela_endereco(){
 
 const { value: formValues } = await temaapp.fire({
  closeOnClickOutside: false,
    allowOutsideClick: false,
   title: 'Confirme seu endereço',
   width:600,
   confirmButtonText: 'Avançar',
   showConfirmButton:false,

   html:
	 `<form>
  <div class="form-row">
  <div  id="hidpartini">
    <div class="form-group col-md-6 ">
      <label for="inputEmail4">Digite seu Cep</label>
      <input type="text" class="form-control" onblur="pesquisacep(this.value);" id="CEP" name="CEP" placeholder="Cep">
    </div>
    <div class="form-group col-md-6">
      <label for="ENDERECO">Endereço (Rua, avenida, praça, travessa)</label>
      <input type="text" class="form-control" id="ENDERECO" name="ENDERECO" placeholder="ex: Rua portugal 5418, Vila Linda">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Numero residencia</label>
    <input type="text" class="form-control"  id="NUMERO" name="NUMERO" placeholder="Numero ">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Complemento</label>
    <input type="text" class="form-control"  id="COMPLEMENTO" name="COMPLEMENTO" placeholder="Complemento">
  </div>
  </div>
  <div style="display:none" id="hidpart">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Ponto de referencia ?</label>
	  <input type="text" class="form-control"  id="REFERENCIA" name="REFERENCIA" placeholder="Ponto de referencia ?">

    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Bairro</label>
	  <input type="text" class="form-control"  id="BAIRRO" name="BAIRRO" placeholder="Digite seu bairro ">

    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Cidade</label>
	  <input type="text" class="form-control"  id="CIDADE" name="CIDADE" placeholder="Digite o nome da cidade">

    </div>

	<div class="form-group col-md-6">
      <label for="inputZip">UF</label>
	  <input type="text" class="form-control"  id="ESTADO" name="ESTADO" placeholder="Digite o estado ">

    </div>
    
  </div>
<br>
 

    


	
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Lembrar do meu endereço
      </label>
    </div>
  </div>
</div>
 
</form> <button id="next" onclick="aux_showpart()"  type="submit" class="btn btn-primary">Próximo</button>
<button id="can" onclick="cancelar()"  type="submit" class="btn btn-error">Cancelar</button>
<button id="finalx" style="display:none" onclick="tipodelv()"  type="submit" class="btn btn-primary">Próximo</button>

` ,
	 
   
 }).then(function(){



 })


 
 
 
  }

  function aux_showpart(){
   ///Funçao que axolia divisao finalizacao no cadastro de enderoc
	
	$('#hidpart').show();
	$('#hidpartini').hide();
 
	$('#next').hide();
  $('#next').hide();
  $('#finalx').show();
  

  }


  function cancelar(){

    swalWithBootstrapButtons.close()
  }

  var socket = io('http://localhost:3000/')
  
setTimeout(function(){ //Aguarda para criar a room 
	socket_createroom()
},3000)


async function socket_createroom(){
    socket.emit('createroom', lojacode)
}

var obj_venda = {}

var datax = null;
function enviavenda(){

   
    $.get('{{route("verificacarrinho")}}',function(data){

     
    if(data=='0'){
      temaapp.fire({
      icon: 'error',
      title: 'O carrinho esta vazio',
      text: '',
      })
           
          return 
    }else{
      
   $.ajax({
            url: '{{route("savevenda")}}',
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
				     alert(JSON.stringify(data))
              emitsk()
            },

		   	error: function (data) {
				  
         // alert(JSON.stringify(data))
           
          },

            data: JSON.stringify(obj_venda)
        })
		


  async function emitsk(){
    await  Swal.fire(
      'Parabéns, a compra foi concluida com sucesso, caso tenha alguma duvida entre em contato.',
      '',
       'success'
      )
    socket.emit('canalcomunica', obj_venda);
    setTimeout(function(){
     

    },200)


  }
 





    }


    })
  

    


}


 async function add_adicionais(){


	const { value: formValues } = await temaapp.fire({
    
    closeOnClickOutside: false,
    allowOutsideClick: false,
   title: 'Selecione os adicionais',
   width:600,
   confirmButtonText: 'Avançar',
   showConfirmButton:false,

   html:
	 `


` ,
	 
   
 })
 


}




	</script>

