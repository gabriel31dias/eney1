
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



         
			 
              
			<div style="max-height: 50px;"  class="row">
				
	       

          <h1 style="color:#FBB448"> {{ $grupoitem }}</h1>

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
	</script>

