
<!DOCTYPE HTML>
<html>
	<head>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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
	    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>

		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

       <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" ></script>
	
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
			.fh5co-card-item .fh5co-text h2 {
           font-size: 20px;
           font-weight: 400;
           margin: 0 0 10px 0;
           color: black;
          }
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
						
						<img style="max-width:150px;max-height:40px"  src="{{$imagem_loja}}" class="img-responsive">

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
		 
		</div>
	
			@isset($grupos)
			@foreach ($grupos as $item)
			
				
				

				<a onclick="setgrupo('/{{$item->CODIGO_SISTEMA}}')" style="padding: 10px" class="grupos actionx col-xs-6 col-lg-4 col-md-6 col-sm-6">
					
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
								<a href="{{$url_twitter ?? 'https://keep.google.com/#home'}}">
									<i class="icon-twitter"></i>
								</a>
							</li>
							<li>
								<a href="{{$url_facebook ?? ''}}">
									<i class="icon-facebook"></i>
								</a>
							</li>
							<li>
								<a href="{{$url_instagram ?? ''}}">
									<i class="icon-instagram"></i>
								</a>
							</li>
							<li>
								<a href="{{$url_youtube ?? ''}}">
									<i class="icon-youtube"></i>
								</a>
							</li>
						</ul>
					</div>
					
											<h3 style="color:#FBB448">Status 
												
												@if($status_loja == true )

												<span style="color:green">Aberto</span>

												@else

												<span style="color:red">Fechado</span>

												@endif
												
											
											
											</h3>


											<h3 style="color:#FBB448">Faça seu pedido </h3>

											<h3 style="color:#FBB448">Total</h3>

											<label style="background-color: #FBB448 ; color:white; padding:5px" id="painelt">0.00</label>


				</div>
				
			
	
				
			</div>
		
			<div class="dropdown">
            <div style="background-color: white" class="row">

                <div class="actionx col-xs-4 col-lg-4 col-md-4 col-sm-6">
                    <a  type="button"  data-toggle="modal" data-target="#exampleModal" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                        <p  style="text-align: center;margin-top:15px">
                            
                            <i  style="" class="material-icons">apps</i>
                            <br>
                            Grupos
                        </p>
                    </a>
                </div>
        
                
               

                  
                <div class="actionx col-xs-4 col-lg-4 col-md-4 col-sm-6">
                    <a onclick="searchproduto()" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                        <p  style="text-align: center;margin-top:15px">
                            
                            <i  style="" class="material-icons">search</i>
                            <br>
                        Pesquisar
                        </p>
                    </a>
				</div>
				

				<div class="actionx col-xs-4 col-lg-4 col-md-4 col-sm-6">
                    <a onclick="open_car()" role="button" id="carrinhobtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                        <p  style="text-align: center;margin-top:15px">
                            
                            <i  style="" class="material-icons">add_shopping_cart
							</i>
                            <br>
						    Carrinho 
                        </p>
                    </a>
                </div>


                
    

                
           
              
              
			</div>
			
			
		<br>		

            
        

            
			 
		<div class="container fh5co-card-item"  style="height: 400px;">
			<h2 style="color:#FBB448">Promoções</h2>  
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>
		
			 
			  <div  class="carousel-inner">
				<div  class="item active">
					<img src="https://www.danny.com.br/wp-content/uploads/2015/12/imagem-branca-grande.png" alt="Los Angeles" style="width:100%;">
				  </div>
			  @foreach ($promoces as $item)
		  
			  <!-- Wrapper for slides -->

			   
			 
				<div  style="width:100%;" class="item">
					<h1 style="color:green">Preço promocional {{$item->PRECO_PROMOCAO}}</h1>
					<br>
					<br>
				  <img src="{{$item->IMG}}" onclick="open_product('{{$item->id}}','{{$item->NOME_PRODUTO}}','{{$item->PRECO_UNIT}}','{{$item->DESCR}}','{{$item->IMG}}');	preco_old = {{$item->PRECO_UNIT}}"  alt="Los Angeles" style="width:100%;height: 300px;">
				</div>
		  
			 
		
			  @endforeach
		
			
		
			</div>
		  
			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
		  </div>
			  

			  <div class="fullscreen" id="wrapper">
			
		 
			  </div>



         

              
			<div style="max-height: 50px;"  class="row">
				
	       

          <h1 style="color:#FBB448"> {{ $grupoitem }}</h1>

            @isset($produtos)
                @foreach ($produtos as $item)
                
					<div  class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
						<a href="{{$item->IMG ?? 'https://radio93fm.com.br/wp-content/uploads/2019/02/produto.png'}}" class="fh5co-card-item image-popup">
							
								<img onclick="open_product('{{$item->id}}','{{$item->NOME_PRODUTO}}','{{$item->PRECO_UNIT}}','{{$item->DESCR}}','{{$item->IMG}}');	preco_old = {{$item->PRECO_UNIT}}" style="height:100%;width:100%" src="{{$item->IMG}}" alt="Image" class="img-responsive">
		
							<br>
							<br>
							
							<div class="fh5co-text">
								<h2>{{$item->NOME_PRODUTO}}</h2>
								
								<p>
									<span class="price cursive-font">{{$item->PRECO_UNIT}}</span>
								</p>
							</div>
						</a>
                    </div>
                    
                @endforeach
                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                <center>
                {{ $produtos->links() }}
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
	
	<!-- jQuery -->
	<script src="/lojavers/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/lojavers/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/lojavers/js/bootstrap.min.js"></script>
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
var cash_produto_adicionais = null
var total_adicionais = 0

var cont_quantidade = 1
var socket = io('http://localhost:3000/')
var lojacode = '{{$lojacod}}'
	gettotal()
var preco_old = ''
var cash_tags = []
var new_cash_tags = []
var cash_obs = ''
const temaapp = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-primary',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

var getsuccesso ='{{$getsucesso ?? ""}}'

if (getsuccesso == 'true'){
 

Swal.fire(
  'Muito bom, a venda foi concluida com sucesso',
  '',
  'success'
)


}




async function searchproduto(){
const { value: txt } = await temaapp.fire({
  title: 'Digite o nome do produto',
  input: 'text',
  inputPlaceholder: 'Nome produto'
})

if (txt) {
	$getlojacode = '/{{$lojacod}}'
	$('html').html('');
    $('body').load('{{route('searchproduto')}}'+$getlojacode + '/' + txt );
 }
}

function open_car(){

//	$getlojacode = '/{{$lojacod}}'
	//$('html').html('');
   // $('body').load('{{route('carrinho')}}'+$getlojacode);
   location.href = "{{route('carrinho')}}/{{$lojacod}}"
}

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
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
			 
async function open_product(id,nomeproduto,preco,descr,img){
	var price = preco_old ? preco_old : preco;
	var tags_adicionais = cash_tags.toString(); //adicionais setados
	tags_adicionais = tags_adicionais.replace(",", "");
	tags_adicionais = tags_adicionais.replace(",", "");
	tags_adicionais = tags_adicionais.replace(",", "");
	tags_adicionais = tags_adicionais.replace(",", "");
	cach_produto = [id,nomeproduto,preco,descr,img]
//alert(preco_old)
 const { value: formValues } = await swalWithBootstrapButtons.fire({
  title: '<h1>'+ nomeproduto+ ' ' + '<a style="color:green">'+ '' +  '</a>' + ' ' + '</h1>' , 
  width:500,showConfirmButton: false,
   closeOnClickOutside: false,
    allowOutsideClick: false,
	onBeforeOpen () {
     update_tags()
	 updatequantidade()
   },


  confirmButtonText: 'Adicionar ao carrinho',
  html:
    `  
	<div style='display: inline;'>
      <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">

	
				
	<h3  style=";background-color:green; color:white">Preço unitário: ${price}</h3>
	</div>
	<div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
				
		<h3  style="background-color:#FBB448; color:white">Valor total : <br> ${preco}</h3>
				</div>
	
        <br> ` +
	
    `<h3 style="font-size:16px;"> ${descr}</h3>`+
	` <img style="height:150px;width:80%" src="${img}" >
	</div>
	<br>
	<br>
	<center>
	<div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
		<button type="button"  style="background-color:#FBB448;color:white;border:none;width:100px;"  onclick="set_obs(${id})" >  <i style="margin-top:3px;"  class="large material-icons">assignment</i>OBSERVAÇÕES</button>

	</div>

	<div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
		<button type="button"   style="background-color:#FBB448;color:white;border:none;width:100px;" onclick="add_adicionais(${id})" >  <i style="margin-top:3px;"  class="large material-icons">local_mall</i><br>ADICIONAIS</button>
	</div>


	</center>

<center>
	<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
         <br>
		 <br>
		<div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">

		<button type="button"   style="background-color:#FBB448;color:white;border:none;width:50px;" onclick="addquantidade(${id})" >  <i style="margin-top:3px;"  class="large material-icons">add</i><br></button>
      
	    </div>
		<div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">
		<input type="text" id="quantidade" name="quantidade" style="height:30px;width:60px"  /> 
	    </div>

		<div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">
		<button type="button"   style="background-color:#FBB448;color:white;border:none;width:50px;" onclick="removequantidade(${id})" >  <i style="margin-top:3px;"  class="large material-icons">remove</i><br></button>
	    </div>
       
		
		 
	</div>

	<br>
		 <br>
		 <br>
		 
</center>

	
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<button type="button" onclick="closeswal()" class="btn btn-danger">  <i style="margin-top:1px;"  class="large material-icons">close</i>FECHAR</button>
	<center>
	<button type="button" style="width:180px" onclick="adicionar_carrinho('${id}','${nomeproduto}')"  class="animated infinite pulse btn btn-success">  <i style="margin-top:3px;"  class="large material-icons">shopping_cart</i>ADICIONAR</button></center>`,

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
	cach_adicionais = ''
	cach_produto  = ''
	cash_tags = null
	cash_tags = new Map()
	cont_quantidade = 1
	cash_obs  = null
 }


 function addquantidade(){
	 swalWithBootstrapButtons.close()
	 cont_quantidade = cont_quantidade + 1
	 document.getElementById('quantidade').value =   cont_quantidade
	 cach_produto[2] = (preco_old + total_adicionais) * cont_quantidade
	 cach_produto[2] = parseFloat(cach_produto[2]).toFixed(2)
	 //cach_produto[2] =  cach_produto[2] * cont_quantidade
	 //cach_produto[2] = parseFloat(cach_produto[2]).toFixed(2)
	 open_product(...cach_produto)

 }


 function removequantidade(){
	if (cont_quantidade == 1){

    }else{
	  swalWithBootstrapButtons.close()
	  cont_quantidade = cont_quantidade - 1
	  document.getElementById('quantidade').value =  cont_quantidade
	  cach_produto[2] = (preco_old + total_adicionais) * cont_quantidade
	  cach_produto[2] = parseFloat(cach_produto[2]).toFixed(2)
	  open_product(...cach_produto)
    }

 }

 function updatequantidade(){
	document.getElementById('quantidade').value =  cont_quantidade
 }


async function adicionar_carrinho(id,nomeproduto){
   cach_adicionais = ''
   cach_produto = ''
   preco_old = ''
   cach_inputs_adicionados_chave = ''
 
    var produto = {
		    lojacode:lojacode,
            nomeproduto:nomeproduto,
            idproduto: id,
            adicionais:arrayadd,
			tagsadicionais:new_cash_tags,
			obs:cash_obs,
			quantidade:cont_quantidade
        }

		if(status_loja=='1'){

			
		}else{

			
         Swal.fire(
         'A loja esta fechada neste momento, tente mais tarde.',
         '',
         'error'
          )

			return
		}



      

        $.ajax({
            url: '{{route("add_produto")}}',
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
				//alert(JSON.stringify(data))
            },

			error: function (data) {
				//alert(JSON.stringify(data))
            },

            data: JSON.stringify(produto)
        })
		

		arrayadd = []

		$( '.mfp-close' ).click();
		swalWithBootstrapButtons.close()


		
let timerInterval
await Swal.fire({
  closeOnClickOutside: false,
  allowOutsideClick: false,
  title: '',
  html: '<h2 class="swal2-title" id="swal2-title" style="display: flex;">Adicionando produto ao seu carrinho...</h2>',
  timer: 2000,
  timerProgressBar: true,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  closeOnClickOutside: false,
  allowOutsideClick: false,
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})



Swal.fire(
  'Adicionado ao carrinho !',
  '',
  'success'
)


temaapp.fire({
  closeOnClickOutside: false,
  allowOutsideClick: false,
  title: 'Adicionado ao carrinho !',
  text: '',
  icon: 'success',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: "Ir para o meu carrinho",
  confirmButtonText: 'Continuar comprando'
}).then((result) => {
  if (result.value) {
   
  }else{
	open_car()
  }
})


  //  alert(id)
	//alert(nomeproduto)
///	await $.get('{{route("add_produto")}}/' + id + '/' +nomeproduto,function(data){
      //  alert(data)
 // }).done(function(){
//	eval(cach_adicionais)
//	Swal.fire(
   // 'Muito bom!',
 //   '<h3 style="color:#595959;">Produto adicionado ao carrinho com sucesso</h3>',
 //   'success'
 //   )

//	$( '.mfp-close' ).click();
  //})
  
  cash_tags = null
  cash_tags = new Map()

  cash_obs = null


  gettotal()
 }

 var  global_idproduto = ''
 
 async function add_adicionais(idproduto){
     
	/// $gettotalinclu = ''  // cria rota
     ///$gettotalreais = '' // cria rota

     global_idproduto = idproduto
	 $.get(`{{route('addsearch')}}/${idproduto}`,function(data){
      
	 /// alert(JSON.stringify(data))

	 }).done(function(data){
		
	setTimeout(function(){
		///O comando verbatin escapa o blade para evitar erro na view
	@verbatim

		var example1 = new Vue({
        el: '#listaadd',
        data: {
          items: data
        }
      })

     $('#listaadd').show()
	},1000)
         
        
     @endverbatim
		 
	 })


const { value: formValues } = await temaapp.fire({
	closeOnClickOutside: false,
    allowOutsideClick: false,
	onBeforeOpen () {
    updateview_adicionais()
  },
title: 'Selecione os adicionais',
width:600,
confirmButtonText: 'Avançar',
showConfirmButton:true,

html:
 `

 @verbatim
 <center>
 <div onshow="updateview_adicionais()" class="container-fluid"/.
 <ul class="container-fluid"  style="display:none;width:20px" id="listaadd">
 
	<table  class="table table-dark">
   <thead style="background-color:#FBB448;" class="thead-dark">
	 <tr>
	   <th scope="col">#</th>
	   <th scope="col">Nome</th>
	   <th scope="col">Preço</th>
	   <th scope="col">Total em reais</th>
	   <th scope="col"></th>
	  
	 </tr>
   </thead>
   <tbody>
  <tr v-for="item in items" :key="item.message">
   

   
	   <td > {{ item.ID_ADICIONAL }}</td>
	   <td> {{ item.adicionais.ADICIONAL }}</td>
	   <td> {{ item.adicionais.PRECO }}
		
	   </td>

	   <td> <input style="width:25px" type="text" class="header-title" :id="'itemx' + item.ID_ADICIONAL" @input="() => {}">
		
	</td>
	 

	   <td>  

		<button v-on:click="set_adicionais( global_idproduto ,item.ID_ADICIONAL,item.adicionais.ADICIONAL,  item.adicionais.PRECO )" type="button" class="btn-small btn-primary">  <i class="material-icons">add</i>
			<button v-on:click="removeadicional( item.ID_ADICIONAL, item.adicionais.PRECO)" type="button" class="btn-small btn-danger">  <i class="material-icons">remove</i>

	   
	    </button>
	  </td>




	  
	  
	 </tr>
	 
   


  
   </tbody>

 </table>
</ul>
</div>
</center>
@endverbatim

<h3 onshow="updateview_adicionais()" style="color:white" type="button" id="painelvalor" class="btn-small btn-success">Valor total ${cach_produto[2]}</h3>

		
		 


` ,
 
}).then(function(){

	open_product(...cach_produto)
})

 }

var cach_adicionais = ''
var cach_produto = []
var cach_inputs_adicionados_chave = new Map() // cach dos ids dos adicionados chave valor
var status_loja = '{{$status_loja}}'

var arrayadd = []

async function set_adicionais(idproduto,idadicional,nomeproduto,preco,nomeadicional){
	total_adicionais = parseFloat(total_adicionais) + parseFloat(preco)
	total_adicionais = total_adicionais.toFixed(2)
	update_tags()
	cach_produto[2] = parseFloat(cach_produto[2])	+ parseFloat(preco)
	cach_produto[2] = parseFloat(cach_produto[2]).toFixed(2)
	
	
	document.getElementById('painelvalor').innerText  = 'Valor Total ' + cach_produto[2]
	//alert(cach_produto[2])
	arrayadd.push(idadicional)


	let quantidadeemmemoria = null
	let leng = arrayadd.length
	for(let i = 0; i<leng ;i++){
		if(idadicional == arrayadd[i]){
			quantidadeemmemoria = quantidadeemmemoria + 1
		}
	
	}
    let geraid = 'itemx' + idadicional
	document.getElementById(geraid).value = quantidadeemmemoria
    cach_inputs_adicionados_chave.set(geraid, quantidadeemmemoria);
      
		  // $.get( `{{route("add_adicional")}}/${idproduto}/${idadicional}/`,function(data){
           //   alert(JSON.stringify(data))
		  //  })
           let valx = ' +' + nomeproduto+ '  '
		  cash_tags.push(valx)


		
	
}


function removeadicional(idadicional,preco){

  total_adicionais = parseFloat(total_adicionais) - parseFloat(preco)
  total_adicionais = total_adicionais.toFixed(2)
	
  let lgt = arrayadd.length
  let geraid = 'itemx' + idadicional
  let getvalue = document.getElementById(geraid).value
  if(getvalue>0){
	cach_produto[2] = parseFloat(cach_produto[2])	- parseFloat(preco)
    cach_produto[2] = parseFloat(cach_produto[2]).toFixed(2)
  }

  
  if(cach_produto[2]<preco_old){
	cach_produto[2] = preco_old
  }

  document.getElementById('painelvalor').innerText  = 'Valor total ' + cach_produto[2]

  if( cach_produto[2] < preco){

	cach_produto[2] =   preco_old

  }

  for(let i = 0 ; i < lgt ; i++ ){
      if  (arrayadd[i] == idadicional){
		arrayadd.splice(i, 1);
           removeattscreen(idadicional)
		return

	  }

  }


  update_tags()

}

 function removeattscreen(idadicional){
	update_tags()
	let quantidadeemmemoria = null
	let leng = arrayadd.length
	for(let i = 0; i<leng ;i++){
		if(idadicional == arrayadd[i]){
			quantidadeemmemoria = quantidadeemmemoria + 1
		}
	
	}
    let geraid = 'itemx' + idadicional
	document.getElementById(geraid).value = quantidadeemmemoria

	cach_inputs_adicionados_chave.set(geraid, quantidadeemmemoria);

 }


 function resulttotaltela(){
 

 return "s"

}


function updateview_adicionais(){

 setTimeout(function(){

 for (var [key, value] of cach_inputs_adicionados_chave) {
	 
    document.getElementById(key).value = value
 }

 },1500)


setTimeout(function(){

for (var [key, value] of cach_inputs_adicionados_chave) {
	
   document.getElementById(key).value = value
}

},1500)


}


function abreloja(){
  //Essa funcao recarrega com a mudança de status de loja aberta ou fechada



}


async function set_obs(id){

	
$( '.mfp-close' ).click();
const { value: formValues } = await temaapp.fire({
  title: 'Observações do produto',
  confirmButtonText:'Salvar',
  closeOnClickOutside: false,
    allowOutsideClick: false,
  html:` 
      <textarea type="" class="form-control"  id="OBSIN" name="OBSIN" placeholder="Cep"> </textarea>
  `,
})

let getobs = document.getElementById('OBSIN').value

cash_obs = getobs

open_product(...cach_produto)

}



function exec(){
	set_obs(1)

}


function escreve(){

	//alert()
}


async function gettotal(){
   
   $.get('{{route("gettotal")}}',function(data){
      total = data
	  document.getElementById('painelt').innerHTML = data
   })

}

setTimeout(function(){ //Aguarda para criar a room 
	socket_createroom()
},3000)


async function socket_createroom(){
    socket.emit('createroom', lojacode)
}


function testeenvia(){
    let ob = {
		room:lojacode,
		texto:'sdsss',
		tipo:'novavenda'
	}
	socket.emit('canalcomunica', ob);
}

socket.on('receive',function(data){
  
  if (data.tipo == 'novavenda'){
	 // alert('novavenda fechada')
  }

})

async function update_tags(){

	obj_tags = new Object();
	obj_tags.tags = arrayadd;

	$.ajax({
            url: '{{route("updatetags")}}',
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            success: function (data) {
				new_cash_tags = data;
                //alert(JSON.stringify(data))
            },

			error: function (data) {
				//alert(JSON.stringify(data))
            },

            data: JSON.stringify(obj_tags)
        })

}

	</script>

