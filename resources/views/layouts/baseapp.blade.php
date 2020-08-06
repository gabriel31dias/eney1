<!DOCTYPE html>
<html lang="en" >
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <meta charset="UTF-8">
      <title></title>
     
<style>
    .colorbtn{
  background-color: #ba68c8;
  }
    </style>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue"></script>
      <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/reqwest/2.0.5/reqwest.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
      <script type="text/javascript"
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-xdK578x_wYnPi9vTOT2Qws6aVuZDr-M" ></script>
      <style>
         #map {
         height: 90%;
         }
         html, body {
         height: 100%;
         margin: 0;
         padding: 0;
         }
         .map-icon-label .map-icon {
         font-size: 24px;
         color: #FFFFFF;
         line-height: 48px;
         text-align: center;
         white-space: nowrap;
         }
      </style>
      <link rel="stylesheet" href="/map-icons.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css'>
      <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
      <link rel="stylesheet" href="../style.css">
   </head>
   <body>
      <!-- partial:index.partial.html -->
      <nav class"blue">
         <div class="nav-wrapper blue">
            <a href="#" data-activates="mobile-demo" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
            <a href="https://codepen.io/collection/nbBqgY/" class="brand-logo" target="_blank"></a>
            <ul class="right hide">
               <li><a href="https://codepen.io/collection/nbBqgY/" target="_blank">Sass</a></li>
               <li><a href="https://codepen.io/collection/nbBqgY/" target="_blank">Components</a></li>
               <li><a href="https://codepen.io/collection/nbBqgY/" target="_blank">Javascript</a></li>
               <li><a href="https://codepen.io/collection/nbBqgY/" target="_blank">Mobile</a></li>
            </ul>
            <ul class="side-nav grey darken-2" id="mobile-demo">
               <li class="sidenav-header blue">
                  <div class="row">
                     <div class="col s4">
                     </div>
                     <div class="col s8">
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text" href="#" data-activates="profile-dropdown">Usuario anônimo<i Jayclass="mdi-navigation-arrow-drop-down right"></i></a>
                        <ul id="profile-dropdown" class="dropdown-content">
                           <li><a href="#"><i class="material-icons">person</i>Profile</a></li>
                           <li><a href="#"><i class="material-icons">settings</i>Setting</a></li>
                           <li><a href="#"><i class="material-icons">help</i>Help</a></li>
                           <li class="divider"></li>
                           <li><a href="#"><i class="material-icons">lock</i>Lock</a></li>
                           <li><a href="#"><i class="material-icons">exit_to_app</i>Logout</a></li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li class="blue"><a href="#" style="color:white" class="waves-effect waves-blue"><i  style="color:white" class="material-icons">account_circle</i>Meu perfil</a></li>
               <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">assignment</i> Minhas compras</a></li>
               <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">assistant_photo</i>Entregas</a></li>
               <li class="blue"><a href="#"  style="color:white" class="waves-effect waves-blue"><i style="color:white" class="material-icons">add_shopping_cart</i>Carrinho</a></li>
      </nav>
      </div>
      @yield('content')

      <div class="fixed-action-btn">
         <a onclick="searchfn()" class="btn-floating btn-large  purple darken-1">
         <i class="large material-icons">search</i>
         </a>
         <ul>
           
         </ul>
      </div>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js'></script>
      <script src='https://codepen.io/j_holtslander/pen/pLNzQb.js'></script><script  src="../script.js"></script>
   </body>
   <script></script>
</html>