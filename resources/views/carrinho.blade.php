
<!DOCTYPE HTML>
<html>
	<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
    

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
       <!-- production version, optimized for size and speed -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
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
    <style>

  .fh5co-card-item .fh5co-text h2 {
    font-size: 20px;
    font-weight: 400;
    margin: 0 0 10px 0;
    color: black;
   }

   

    </style>

	
		<!-- Modernizr JS -->
		<script src="/lojavers/js/modernizr-2.6.2.min.js"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
        <![endif]-->
        <script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js
"></script>

<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

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
									<i class="icon-instagram"></i>
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
                    <a onclick="chama()" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
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

        
        <img onclick="formas_pagamento()" calss>
        
     </div>
     
     <button type="button" onclick="getx()" >
    
		<div  class="col-xs-12">
		  <button type="button" onclick="getx()" class="animated infinite pulse  btn btn-success"> <i class="large material-icons">check_circle</i><br>Finalizar compra <br>R${{ number_format($totalemprodutos   , 2) }} </button>
		</div>
			  </div>
  		  </center>
          <br>
            @isset($carrinho)
                @foreach ($carrinho as $item)

                @isset($item['nomeproduto'])
                    
              
                
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
                            <p>
                              <h2 class="fh5co-text"> Quantidade {{$item['quantidade']}} </h2>
                          </p>
                          
                            
                           
                            <button id="idtrigeremover" type="button" onclick="removerdocarrinho('{{$item['id']}}')" class="btn btn-danger">  <i style="margin-top:1px;"  class="large material-icons">close</i>remover</button>
                      
                        </div>
                    </a>
                </div>
                @endisset
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
alert('')
    



	</script>

