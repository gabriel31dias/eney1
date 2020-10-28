
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
        
	
	<nav style="border:none;" class="gtco-nav" role="navigation">
		
		<div class="gtco-container">
	
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo">
						
						<img style="max-width:150px;max-height:40px"  src="{{$imagem_loja ?? ''}}" class="img-responsive">

						
						<h3 style="color:{{$style['color2']}}"> 
												
							@if($status_loja == true )

							<span style="color:#02d46e">Aberto</span>

							@else

							<span style="color:red">Fechado</span>

							@endif
							
						
						
						</h3>

					</div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li>
							<a href="{{$urlloja}}">Home</a>
						</li>
						<li>
							<a href="https://www.instagram.com/versatilinf/">Instagram versatil</a>
						</li>
						<li>
							<a href="https://www.facebook.com/www.versatilsoftware.com.br">Facebook versatil</a>
						</li>
						<li>
							<a  href="https://api.whatsapp.com/send?phone=55{{$whats_loja}}&text=Ola!">Contato loja</a>
						</li>
						<li class="btn-cta">
							<a href="https://api.whatsapp.com/send?phone=55{{env('APP_TELEFONE_VERSATIL')}}&text=Ola!">
								<span>Informar problema</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
	
		</div>
		<br>
		<br>
		<br>
		
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
					   
							@if($item->IMG)

							<img style="height:80px;width:100%" src="{{$item->IMG}}" alt="Image" class="img-responsive">
							@else
										<img style="height:80px;width:100%" src="data:image/png;base64,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dGlvbiByZGY6YWJvdXQ9JycKICB4bWxuczpBdHRyaWI9J2h0dHA6Ly9ucy5hdHRyaWJ1dGlvbi5jb20vYWRzLzEuMC8nPgogIDxBdHRyaWI6QWRzPgogICA8cmRmOlNlcT4KICAgIDxyZGY6bGkgcmRmOnBhcnNlVHlwZT0nUmVzb3VyY2UnPgogICAgIDxBdHRyaWI6Q3JlYXRlZD4yMDIwLTA5LTI1PC9BdHRyaWI6Q3JlYXRlZD4KICAgICA8QXR0cmliOkV4dElkPmE1YzcwZDBmLWU2YTUtNDBhOC1iZWU5LWVhZmUwMjhlMWY0OTwvQXR0cmliOkV4dElkPgogICAgIDxBdHRyaWI6RmJJZD41MjUyNjU5MTQxNzk1ODA8L0F0dHJpYjpGYklkPgogICAgIDxBdHRyaWI6VG91Y2hUeXBlPjI8L0F0dHJpYjpUb3VjaFR5cGU+CiAgICA8L3JkZjpsaT4KICAgPC9yZGY6U2VxPgogIDwvQXR0cmliOkFkcz4KIDwvcmRmOkRlc2NyaXB0aW9uPgoKIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PScnCiAgeG1sbnM6cGRmPSdodHRwOi8vbnMuYWRvYmUuY29tL3BkZi8xLjMvJz4KICA8cGRmOkF1dGhvcj52aWNpbyBqb2dvczwvcGRmOkF1dGhvcj4KIDwvcmRmOkRlc2NyaXB0aW9uPgoKIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PScnCiAgeG1sbnM6eG1wPSdodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvJz4KICA8eG1wOkNyZWF0b3JUb29sPkNhbnZhPC94bXA6Q3JlYXRvclRvb2w+CiA8L3JkZjpEZXNjcmlwdGlvbj4KPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KPD94cGFja2V0IGVuZD0ncic/Pm6QT5QAAAAASUVORK5CYII=" alt="Image" class="img-responsive">
			  
							@endif
							
	
						
						
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

	<footer id="gtco-footer" role="contentinfo" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-pb-md">


               
	
				<div  style="" class="col-md-12 text-center">
					<br>
					<br>
					<h1 style="padding:15px;color:{{$style['color2']}}"> {{$nameloja ?? ''}} </h1>
				   <div style="opacity: 1.0;z-index:2000;">
					<div class="gtco-widget">
						<h3>Redes Sociais</h3>
						<ul class="gtco-social-icons">
							<li>
								<a style="color:{{$style['color2']}} !important;opacity: 1.0"  href="{{$url_twitter ?? ''}}">
									<i class="icon-twitter"></i>
								</a>
							</li>
							<li>
								<a  style="color:{{$style['color2']}} !important;" href="{{$url_facebook ?? ''}}">
									<i class="icon-facebook"></i>
								</a>
							</li>
							<li>
								<a style="color:{{$style['color2']}} !important;" href="{{$url_instagram ?? ''}}">
									<i class="icon-instagram"></i>
								</a>
							</li>
							<li>
								<a style="color:{{$style['color2']}} !important;" href="{{$url_youtube ?? ''}}">
									<i class="icon-youtube"></i>
								</a>
							</li>
						</ul>
					</div>
					
											


											

											<h3 style="color:{{$style['color2']}}">Total</h3>

											<label style="background-color: #FBB448 ; color:white; padding:5px" id="painelt">0.00</label>

				   </div>
				</div>
			
				
			
	
				
			</div>
		
			<div class="dropdown">
            <div style="background-color: white" class="row">

                <div class="actionx col-xs-4 col-lg-4 col-md-4 col-sm-6">
                    <a  type="button"  data-toggle="modal" data-target="#exampleModal" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                        <p  style="text-align: center;margin-top:15px">
                            
                            <i  style="" class="material-icons">apps</i>
                            <br>
                            Menu
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

            
        

	 @if($gr)
			 
		<div class="container fh5co-card-item"  style="height: 500px;">
			<h2 style="color:#FBB448;padding:5px">Promoções</h2>  
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>
		
			 
			  <div  class="carousel-inner">
		@isset($promoces)
	
			  @foreach ($promoces as  $indexKey => $item)
		  
			  <!-- Wrapper for slides -->
				 @if($indexKey == 0  )
				
			   

				  <div  style="width:100%;" class="item active">
					<center>
					<h1 style="font-size:25px;color:red;padding:20px;">Preço promocional {{$item->PRECO_PROMOCAO}}</h1>
					</center>  
				  <img src="{{$item->IMG}}" onclick="open_product('{{$item->id}}','{{$item->NOME_PRODUTO}}','{{$item->PRECO_PROMOCAO}}','{{$item->DESCR}}','{{$item->IMG}}','{{$item->PROMOCAO}}',{{$item->PRECO_PROMOCAO}});	preco_old = {{$item->PRECO_PROMOCAO}}"  alt="Los Angeles" style="width:100%;height: 300px;">
				</div>

				 @else

				 <div  style="width:100%;" class="item">
					<center>
					<h1 style="font-size:25px;color:red;padding:20px;">Preço promocional {{$item->PRECO_PROMOCAO}}</h1>
			     	</center>
				  <img src="{{$item->IMG}}" onclick="open_product('{{$item->id}}','{{$item->NOME_PRODUTO}}','{{$item->PRECO_PROMOCAO}}','{{$item->DESCR}}','{{$item->IMG}}','{{$item->PROMOCAO}}',{{$item->PRECO_PROMOCAO}});	preco_old = {{$item->PRECO_PROMOCAO}}"  alt="Los Angeles" style="width:100%;height: 300px;">
				</div>
				 
				 @endif

			   
			     
	
			  @endforeach
		@endisset
			
		
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
			  
		  @endif
			  <div class="fullscreen" id="wrapper">
			
		 
			  </div>



         
			 
              
			<div style="max-height: 50px; "  class="row">
				
	          <div style="padding:10px"  class="col-md-12  text-center">
				<div  style="padding:10px"  class="btn-group btn-group-toggle" data-toggle="buttons">
				
					@if( $gettypelist== "false" )
                        
				    	<label class="btn btn-primary active">
						<input type="radio" name="options" id="option1"  checked>
						<i class="material-icons">apps</i>
						</label>
					    
						
					@else

				    	<label  class="btn btn-primary ">
						<input type="radio" name="options" id="option1"  >
						<i class="material-icons">apps</i>
						</label>
						

						
					@endif


					
					@if( $gettypelist== "true" )

					    <label    class="btn btn-primary active">
						<input type="radio" name="options" id="option2"  checked> 
						<i class="material-icons">chrome_reader_mode</i>
					    </label>
						
					@else

					    <label  onclick="location.href='/app/loja/{{$lojacod}}?list=litext'" class="btn btn-primary">
						<input type="radio" name="options" id="option2" > 
						<i class="material-icons">chrome_reader_mode</i>
					    </label>
						
					@endif
				
			
					
				</div>
			</div>

          <h1 style="color:#FBB448"> {{ $grupoitem }}</h1>
  
		  @if($gettypelist == 'false')
            @isset($produtos)
				@foreach ($produtos as $item)
				
				
					<div  class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
						<a href="{{$item->IMG ?? 'https://radio93fm.com.br/wp-content/uploads/2019/02/produto.png'}}" class="fh5co-card-item image-popup">
							
							@if($item->PROMOCAO && App\Produto::verifica_tempo_promocao( $lojacod , $item->id))

							  

								<img onclick="open_product('{{$item->id}}','{{$item->NOME_PRODUTO}}','{{$item->PRECO_UNIT}}','{{$item->DESCR}}','{{$item->IMG}}','{{$item->PROMOCAO}}',{{$item->PRECO_PROMOCAO}}); 	 preco_old = {{$item->PROMOCAO}} ? {{$item->PRECO_PROMOCAO}} : {{$item->PRECO_UNIT}};
								"   style="height:100%;width:100%" src="{{$item->IMG}}" alt="Image" class="img-responsive">

		                     @else
                            
							 <img onclick="open_product('{{$item->id}}','{{$item->NOME_PRODUTO}}','{{$item->PRECO_UNIT}}','{{$item->DESCR}}','{{$item->IMG}}', false ,{{$item->PRECO_PROMOCAO}}); 	 preco_old =  {{$item->PRECO_UNIT}} 
			"   style="height:100%;width:100%" src="{{$item->IMG}}" alt="Image" class="img-responsive">
	                      	@endif 
							<br>
							<br>
							
							<div class="fh5co-text">
								<h2>{{$item->NOME_PRODUTO}}</h2>
								
								<p>@if($item->PROMOCAO == true && App\Produto::verifica_tempo_promocao( $lojacod , $item->id))
									  
									
									<i style="margin-top:1px;color:greenyellow"  class="large material-icons">local_offer</i>
									<span class="price cursive-font">{{$item->PRECO_PROMOCAO}}  </span> -  <strike style="color:gray;font-size:25px;" class="price cursive-font">{{$item->PRECO_UNIT}} </strike>
                                   
								   @else
								     <span class="price cursive-font">{{$item->PRECO_UNIT}}</span>
								  @endif

                                    

									
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
		 @endif



			@if($gettypelist == 'true')

			
            @isset($produtos)
				@foreach ($produtos as $item)
				
				
					<div  class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
						<a href="{{$item->IMG ?? 'https://radio93fm.com.br/wp-content/uploads/2019/02/produto.png'}}" class="fh5co-card-item image-popup">
							
							@if($item->PROMOCAO && App\Produto::verifica_tempo_promocao( $lojacod , $item->id))

							  
									  
									
									<i style="margin-top:1px;color:greenyellow"  class="large material-icons">local_offer</i>
									<span class="price cursive-font">{{$item->PRECO_PROMOCAO}}  </span> -  <strike style="color:gray;font-size:25px;" class="price cursive-font">{{$item->PRECO_UNIT}} </strike>
                                   
								 

                                    

									
								</p>
							</div>

							 @else
							 <div class="text-center" style="max-height: 20px"  style="padding:30px" >
							 <h3  style="padding:0px;margin:0"> {{$item->NOME_PRODUTO}} </h3>
							 <span style="font-size:40px,">{{$item->PRECO_UNIT}}</span>

							 </div>
							 
	                      	@endif 
							<br>
							<br>
							
							
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

			@endif


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
var cash_addc = false
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
	$getlojacode = '{{$lojacod}}'
	//$('html').html('');
   // $('body').load('{{route('searchproduto')}}'+$getlojacode + '/' + txt );
	location.href = `{{route('searchproduto')}}/${$getlojacode}/${txt}`
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


			 
async function open_product(id,nomeproduto,preco,descr,img,promocao='',preco_promocao=''){
   

	var price = preco_old ? preco_old : preco;
	var tags_adicionais = cash_tags.toString(); //adicionais setados
	tags_adicionais = tags_adicionais.replace(",", "");
	tags_adicionais = tags_adicionais.replace(",", "");
	tags_adicionais = tags_adicionais.replace(",", "");
	tags_adicionais = tags_adicionais.replace(",", "");

	if(promocao == true){
		//alert('promo')
          //Verifica se esta em promocao
		  price = preco_promocao
		  preco = preco_promocao
		/// alert('passou')
	 }

	
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
	<br>
	</div>
	<br>
	<br>
	<center>
	<div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
		<button type="button"  style="background-color:#FBB448;color:white;border:none;width:100px;"  onclick="set_obs(${id})" >  <i style="margin-top:3px;"  class="large material-icons">assignment</i>OBSERVAÇÕES</button>

	</div>

	<div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
	
		<button type="button"  id="addc"  style="background-color:#FBB448;color:white;border:none;width:100px;" onclick="add_adicionais(${id});cash_addc = true" >  <i style="margin-top:3px;"  class="large material-icons">local_mall</i><br>ADICIONAIS</button>
	</div>


	</center>

<center>
	<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
         <br>
		 <br>
		<div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">

		<button type="button" id="addx"   style="background-color:#FBB448;color:white;border:none;width:50px;" onclick="addquantidade(${id})" >  <i style="margin-top:3px;"  class="large material-icons">add</i><br></button>
      
	    </div>
		<div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">
		<input type="text" id="quantidade" name="quantidade" style="height:30px;width:60px"  /> 
	    </div>

		<div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">
		<button type="button" id="removex"   style="background-color:#FBB448;color:white;border:none;width:50px;" onclick="removequantidade(${id})" >  <i style="margin-top:3px;"  class="large material-icons">remove</i><br></button>
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
	<button type="button" style="width:180px" onclick="adicionar_carrinho('${id}','${nomeproduto}')"  class="animated infinite pulse btn btn-success">  <i style="margin-top:3px;"  class="large material-icons">shopping_cart</i>ADICIONAR</button></center>
	<br>
	<br>

	<a style="font-size:20px;" href="https://api.whatsapp.com/send?phone=55{{$whats_loja}}&text=Ola eu quero este produto ${nomeproduto} %0A ele esta com o preço de  ${preco} no webapp "><img style="width:40px;height:40px;" src="https://i.pinimg.com/originals/91/9d/f0/919df067a8fbd22ce7b6f401b7688b35.png" ></img>PEDIDO RAPIDO</a>

	`,
   
     
  focusConfirm: false,
  preConfirm: function() {
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
	preco_old = null
	total_adicionais = 0
	cash_addc = false 
 }


 function addquantidade(){
	 swalWithBootstrapButtons.close()
	 cont_quantidade = cont_quantidade + 1
	 alert(parseFloat(total_adicionais ))
	 document.getElementById('quantidade').value =   cont_quantidade
	 let  auxz =  (parseFloat(preco_old) +  parseFloat(total_adicionais )) * cont_quantidade
	 alert(auxz)
	 cach_produto[2] = (preco_old + total_adicionais) * cont_quantidade
	 cach_produto[2] = auxz.toFixed(2)
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

   cash_addc = false 
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
		cont_quantidade = 1
        total_adicionais = 0
		total_adicionais = 0
		cash_addc = false 


		
let timerInterval
await Swal.fire({
  closeOnClickOutside: false,
  allowOutsideClick: false,
  title: '',
  html: '<h2 class="swal2-title" id="swal2-title" style="display: flex;">Adicionando produto ao seu carrinho...</h2>',
  timer: 2000,
  timerProgressBar: true,
  onBeforeOpen: function() {
    Swal.showLoading()
    timerInterval = setInterval(function(){
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
  onClose: function() {
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
	  console.log(typeof  total)
	  //com R$
       var f = total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});


	  document.getElementById('painelt').innerHTML = f
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



setInterval(function(){

	try {
      

	   if(cash_addc){
	     	var btn = document.getElementById("addc");
            btn.disabled = 1
			var addxx = document.getElementById("addx")
			addxx.disabled = 1
			var removexx = document.getElementById("removex")
            removexx.disabled = 1
	   }
	 

    
     }
    catch (e) {
 
     }

   
},1000)




	</script>

