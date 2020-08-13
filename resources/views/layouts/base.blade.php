
<!DOCTYPE html>
<html>
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" ></script>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <title>Versátile Dlv</title>
      <!-- Favicon-->
      <link rel="icon" href="favicon.ico" type="image/x-icon">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
      <!-- Bootstrap Core Css -->
      <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
      <!-- Waves Effect Css -->
      <link href="../plugins/node-waves/waves.css" rel="stylesheet" />
      <!-- Animation Css -->
      <link href="../plugins/animate-css/animate.css" rel="stylesheet" />
      <!-- Morris Chart Css-->
      <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />
      <!-- Custom Css -->
      <link href="../css/style.css" rel="stylesheet">
      <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
      <link href="../css/themes/all-themes.css" rel="stylesheet" />
      <!-- Jquery Core Js -->
      <script src="../plugins/jquery/jquery.min.js"></script>
      <!-- Table -->
      <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
      </link>
      <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

      <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></link>
      <style>

      * {
          
      }

.select2-selection__rendered {
   background-color:#96DDEA; !important
  border: none;
  color: white;
 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  height:30px;
}

       
  .form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: white;
    background-color: #96DDEA;
    background-image: none;
    border: 1px  black;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
      .input-group{
         border: 2px  black;
         border-color:black;
         background-color:#96DDEA;
         padding:3px;

      }

      ::-webkit-input-placeholder {
         color: orange;
         font: 12px verdana, arial, sans-serif;
      }
      ::placeholder {
  color: blue;
  opacity: 1; /* Firefox */
}

input[type="placeholder"] {
   color: #111;
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: blue;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color:blue;
}

      .nav-tabs > li > a {
         

      }

      label {
         color: black !important;
         font-size:16px;
      }

      .form-control{
         color: #111 !important;
         font-size:16px;
      }

     
     .nav-tabs {
       
       }   

       .menuitens{
         color:black !important;
       }
     
     .pa:hover{
            border-color:#66afe9;
           
            border-style: solid;
            border-width: 2px;

         }


         .menuit:hover{
            border-color:#66afe9;
           
            border-style: solid;
            border-width: 2px;

         }

         .modal .modal-content {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    border-radius: 0;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.31) !important;
    border: none;
    margin-top:100px;
}


#example_previous{
  background-color: #03A9F4; !important
  border: none;
  color: white;
  padding: 4px 4px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

}


#example_next{
  background-color: #03A9F4; 
  border: none;
  color: white;
  padding: 4px 4px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  

}


.paginate_button {

  background-color: #03A9F4  !important; /* Green */
  border: none;
  color: white;
  padding: 4px 4px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

}

.dataTables_length{
   display:none;
}

#example_filter{
 z-index:-500;
 color:white;
 width:0,1px;
 display:none;

}

.obrigatorio{
   color:red;
}

.modal.in .modal-dialog {
    -webkit-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    width: 1500px;
}


.nav-tabs {
   
}

.modal .modal-header .modal-title {
    font-weight: bold;
    font-size: 16px;
    
    border-bottom: 2px solid #2E9AFE;
    
    line-height: 30px;
    

}


.card .header {
   color: #555;
    padding: 20px;
    padding-bottom: 0px;
    position: relative;

}


select {
    -webkit-appearance: button;
    -moz-appearance: button;
    -webkit-user-select: none;
    -moz-user-select: none;
    -webkit-padding-end: 20px;
    -moz-padding-end: 20px;
    -webkit-padding-start: 2px;
    -moz-padding-start: 2px;
    background-color: #96DDEA; /* Fallback color if gradients are not supported */
    background-image: url(../images/select-arrow.png), -webkit-linear-gradient(top,  #96DDEA,  #96DDEA); /* For Chrome and Safari */
    background-image: url(../images/select-arrow.png), -moz-linear-gradient(top, #E5E5E5, #F4F4F4); /* For old Firefox (3.6 to 15) */
    background-image: url(../images/select-arrow.png), -ms-linear-gradient(top, #E5E5E5, #F4F4F4); /* For pre-releases of Internet Explorer  10*/
    background-image: url(../images/select-arrow.png), -o-linear-gradient(top, #E5E5E5, #F4F4F4); /* For old Opera (11.1 to 12.0) */
    background-image: url(../images/select-arrow.png), linear-gradient(to bottom,  #96DDEA,  #96DDEA); /* Standard syntax; must be last */
    background-position: center right;
    background-repeat: no-repeat;
    border: 1px solid #AAA;
    border-radius: 0px;
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
    color: #555;
    font-size: inherit;
    margin: 0;
    overflow: hidden;
    padding-top: 2px;
    padding-bottom: 2px;
    text-overflow: ellipsis;
    white-space: nowrap;
  
}





      </style>
   </head>
   <body class="theme-red">
      <!-- Page Loader -->
      <div class="page-loader-wrapper">
         <div class="loader">
            <div class="preloader">
               <div class="spinner-layer pl-red">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
            </div>
            <p>Please wait...</p>
         </div>
      </div>
      <!-- #END# Page Loader -->
      <!-- Overlay For Sidebars -->
      <div class="overlay"></div>
      <!-- #END# Overlay For Sidebars -->
      <!-- Search Bar -->
      <div class="search-bar">
         <div class="search-icon">
            <i class="material-icons">search</i>
         </div>
         <input type="text" placeholder="START TYPING...">
         <div class="close-search">
            <i class="material-icons">close</i>
         </div>
      </div>
      <!-- #END# Search Bar -->
      <!-- Top Bar -->
      <nav class="navbar bg-light-blue">
         <div class="container-fluid">
            <div class="navbar-header">
               <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
               <a href="javascript:void(0);" class="bars"></a>
               <a class="navbar-brand" href="index.html">Versátile</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                  <!-- Call Search -->
                  <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                  <!-- #END# Call Search -->
                  <!-- Notifications -->
                  <li class="dropdown">
                     <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                     <i class="material-icons">notifications</i>
                     <span class="label-count">7</span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                           <ul class="menu">
                              <li>
                                 <a href="javascript:void(0);">
                                    <div class="icon-circle bg-light-green">
                                       <i class="material-icons">person_add</i>
                                    </div>
                                    <div class="menu-info">
                                       <h4>12 new members joined</h4>
                                       <p>
                                          <i class="material-icons">access_time</i> 14 mins ago
                                       </p>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="javascript:void(0);">
                                    <div class="icon-circle bg-cyan">
                                       <i class="material-icons">add_shopping_cart</i>
                                    </div>
                                    <div class="menu-info">
                                       <h4>4 sales made</h4>
                                       <p>
                                          <i class="material-icons">access_time</i> 22 mins ago
                                       </p>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="javascript:void(0);">
                                    <div class="icon-circle bg-red">
                                       <i class="material-icons">delete_forever</i>
                                    </div>
                                    <div class="menu-info">
                                       <h4><b>Nancy Doe</b> deleted account</h4>
                                       <p>
                                          <i class="material-icons">access_time</i> 3 hours ago
                                       </p>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="javascript:void(0);">
                                    <div class="icon-circle bg-orange">
                                       <i class="material-icons">mode_edit</i>
                                    </div>
                                    <div class="menu-info">
                                       <h4><b>Nancy</b> changed name</h4>
                                       <p>
                                          <i class="material-icons">access_time</i> 2 hours ago
                                       </p>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="javascript:void(0);">
                                    <div class="icon-circle bg-blue-grey">
                                       <i class="material-icons">comment</i>
                                    </div>
                                    <div class="menu-info">
                                       <h4><b>{{$user}}</b> commented your post</h4>
                                       <p>
                                          <i class="material-icons">access_time</i> 4 hours ago
                                       </p>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="javascript:void(0);">
                                    <div class="icon-circle bg-light-green">
                                       <i class="material-icons">cached</i>
                                    </div>
                                    <div class="menu-info">
                                       <h4><b>John</b> updated status</h4>
                                       <p>
                                          <i class="material-icons">access_time</i> 3 hours ago
                                       </p>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="javascript:void(0);">
                                    <div class="icon-circle bg-purple">
                                       <i class="material-icons">settings</i>
                                    </div>
                                    <div class="menu-info">
                                       <h4>Settings updated</h4>
                                       <p>
                                          <i class="material-icons">access_time</i> Yesterday
                                       </p>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="footer">
                           <a href="javascript:void(0);">View All Notifications</a>
                        </li>
                     </ul>
                  </li>
                  <!-- #END# Notifications -->
                  <!-- Tasks -->
                  <li class="dropdown">
                     <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                     <i class="material-icons">flag</i>
                     <span class="label-count">9</span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="header">TASKS</li>
                        <li class="body">
                           <ul class="menu tasks">
                              <li>
                                 <a href="javascript:void(0);">
                                    <h4>
                                       Footer display issue
                                       <small>32%</small>
                                    </h4>
                                    <div class="progress">
                                       <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="javascript:void(0);">
                                    <h4>
                                       Make new buttons
                                       <small>45%</small>
                                    </h4>
                                    <div class="progress">
                                       <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="javascript:void(0);">
                                    <h4>
                                       Create new dashboard
                                       <small>54%</small>
                                    </h4>
                                    <div class="progress">
                                       <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="javascript:void(0);">
                                    <h4>
                                       Solve transition issue
                                       <small>65%</small>
                                    </h4>
                                    <div class="progress">
                                       <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="javascript:void(0);">
                                    <h4>
                                       Answer GitHub questions
                                       <small>92%</small>
                                    </h4>
                                    <div class="progress">
                                       <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                       </div>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="footer">
                           <a href="javascript:void(0);">View All Tasks</a>
                        </li>
                     </ul>
                  </li>
                  <!-- #END# Tasks -->
                  <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- #Top Bar -->
      <section>
         <!-- Left Sidebar -->
         <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
               <div class="image">
                  <img src="images/user.png" width="48" height="48" alt="User" />
               </div>
               <div class="info-container">
                  <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$username}}</div>
                  <div class="email">{{$user}}</div>
                  <div class="btn-group user-helper-dropdown">
                     <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                     <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
               <ul class="list">
                  <li class="header">MAIN NAVIGATION</li>
                  <li>
                     <a  href="javascript:void(0);" class="menuit menu-toggle">
                     <i class="material-icons">create_new_folder</i>
                     <span>Cadastros</span>
                     </a>
                     <ul class="ml-menu">
                        <li>
                           <a href="{{route("grupos")}}" class="menuit menu-toggle">
                           <i class="material-icons" >create_new_folder</i>
                           <span style="margin-top:10px;">Grupos</span>
                           </a>
            
                        </li>
                        <li>
                           <a href="{{route("produtos")}}" class="menuit menu-toggle">
                           <i class="material-icons" >create_new_folder</i>
                           <span style="margin-top:10px;">Produtos</span>
                           </a>
            
                        </li>
                        <li>
                           <a href="{{route("adicionais")}}" class="menuit menu-toggle">
                           <i class="material-icons" >create_new_folder</i>
                           <span style="margin-top:10px;">Adicionais</span>
                           </a>
            
                        </li>
                        <li>
                           <a href="{{route("formaspg")}}" class="menuit menu-toggle">
                           <i class="material-icons" >create_new_folder</i>
                           <span style="margin-top:10px;">Formas de pagamento</span>
                           </a>
            
                        </li>
                     </ul>
                     
                  </li>

                  <li>
                     <a  href="javascript:void(0);" class="menuit menu-toggle">
                     <i class="material-icons">create_new_folder</i>
                     <span>Relatorios</span>
                     </a>
                     <ul class="ml-menu">
                        <li>
                           <a href="javascript:void(0);" class="menuit menu-toggle">
                           <i class="material-icons" >folder_shared</i>
                           <span style="margin-top:10px;">Produtos</span>
                           </a>
            
                        </li>
                     </li>
                        
                       
                  </li>

                  
               </ul>

               <li>
                  <a href="{{route("vendas")}}" class="menuit menu-toggle">
                  <i class="material-icons" >assistant_photo</i>
                  <span style="margin-top:10px;">Vendas</span>
                  </a>
   
               </li>

               
               <li>
                  <a href="{{route("config")}}" class="menuit menu-toggle">
                  <i class="material-icons" >build</i>
                  <span style="margin-top:10px;">Configurações</span>
                  </a>
   
               </li>
               <br>
              <center>
               @if($tipo_op == '1')


             
               <button type="button" class="btn btn-primary btn-block waves-effect" data-trigger="focus" data-container="body" data-toggle="popover" data-placement="right" title="" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="Popover Title">
                 ABRIR E FECHAR LOJA
              </button>
             
              <br>
              <br>

             
            
               <button id="abreloja" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                  <i class="material-icons">queue_play_next</i>
              </button>

              <button   id="fechaloja" type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
               <i class="material-icons">remove_from_queue</i>
             </button>

           @endif

           <a type="button" href="{{route('openloja')}}" class="btn bg-blue waves-effect">Acessar minha loja</a>

           
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
               <div class="copyright">
                  &copy; 2016 - 2017 <a href="javascript:void(0);">Versátile Web</a>.
               </div>
               <div class="version">
                  <b>Version: </b> 1.0.0
               </div>
            </div>
            <!-- #Footer -->
         </aside>
         <!-- #END# Left Sidebar -->
         <!-- Right Sidebar -->
         <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
               <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
               <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
               <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                  <ul class="demo-choose-skin">
                     <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                     </li>
                     <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                     </li>
                     <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                     </li>
                     <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                     </li>
                     <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                     </li>
                     <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                     </li>
                     <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                     </li>
                     <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                     </li>
                     <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                     </li>
                     <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                     </li>
                     <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                     </li>
                     <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                     </li>
                     <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                     </li>
                     <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                     </li>
                     <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                     </li>
                     <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                     </li>
                     <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                     </li>
                     <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                     </li>
                     <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                     </li>
                     <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                     </li>
                  </ul>
               </div>
               <div role="tabpanel" class="tab-pane fade" id="settings">
                  <div class="demo-settings">
                     <p>GENERAL SETTINGS</p>
                     <ul class="setting-list">
                        <li>
                           <span>Report Panel Usage</span>
                           <div class="switch">
                              <label><input type="checkbox" checked><span class="lever"></span></label>
                           </div>
                        </li>
                        <li>
                           <span>Email Redirect</span>
                           <div class="switch">
                              <label><input type="checkbox"><span class="lever"></span></label>
                           </div>
                        </li>
                     </ul>
                     <p>SYSTEM SETTINGS</p>
                     <ul class="setting-list">
                        <li>
                           <span>Notifications</span>
                           <div class="switch">
                              <label><input type="checkbox" checked><span class="lever"></span></label>
                           </div>
                        </li>
                        <li>
                           <span>Auto Updates</span>
                           <div class="switch">
                              <label><input type="checkbox" checked><span class="lever"></span></label>
                           </div>
                        </li>
                     </ul>
                     <p>ACCOUNT SETTINGS</p>
                     <ul class="setting-list">
                        <li>
                           <span>Offline</span>
                           <div class="switch">
                              <label><input type="checkbox"><span class="lever"></span></label>
                           </div>
                        </li>
                        <li>
                           <span>Location Permission</span>
                           <div class="switch">
                              <label><input type="checkbox" checked><span class="lever"></span></label>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </aside>

         <script>
async function novavenda(){
               
Swal.fire({
  title: 'Uma nova venda foi realizada via app',
  text: '',
  imageUrl: 'https://png.pngtree.com/png-vector/20190725/ourlarge/pngtree-box-icon-png-image_1606515.jpg',
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Custom image',
  confirmButtonText: 'Mais detalhes',
})

}

            $('#abreloja').click(function(){
                
               let getid = '{{$iduser}}'
               location.href = '{{route("abreloja")}}' + '/' + getid

            });

            $('#fechaloja').click(function(){
                
                let getid = '{{$iduser}}'
                location.href = '{{route("fechaloja")}}' + '/' + getid
 

             });

var socket = io('https://servidorsocket3636.herokuapp.com/')


setTimeout(function(){ //Aguarda para criar a room 
	socket_createroom()
},3000)


async function socket_createroom(){
    socket.emit('createroom', {{ App\Http\Controllers\AppController::getlojacode($iduser)}} )
}

socket.on('receive',function(data){
  
  if (data.tipo == 'novavenda'){
     novavenda()
     var audio = new Audio('http://127.0.0.1:8000/audio.mp3');
     audio.play();
     var audio1 = new Audio('http://127.0.0.1:8000/audio.mp3');
     audio1.play();
     var audio = new Audio('http://127.0.0.1:8000/audio.mp3');
     audio.play();
    // https://interactive-examples.mdn.mozilla.net/media/examples/t-rex-roar.mp3
     
  }

})

         </script>
         <!-- #END# Right Sidebar -->
      </section>
      <section class="content">

      @yield('content')


      </section>
         <!-- Dropzone Plugin Js -->
    <script src="../../plugins/dropzone/dropzone.js"></script>
      <!-- Bootstrap Core Js -->
      <script src="../plugins/bootstrap/js/bootstrap.js"></script>
      <!-- Select Plugin Js -->
      <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>
      <!-- Slimscroll Plugin Js -->
      <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
      <!-- Waves Effect Plugin Js -->
      <script src="../plugins/node-waves/waves.js"></script>
      <!-- Jquery CountTo Plugin Js -->
      <script src="../plugins/jquery-countto/jquery.countTo.js"></script>
      <!-- Morris Plugin Js -->
      <script src="../plugins/raphael/raphael.min.js"></script>
      <script src="../plugins/morrisjs/morris.js"></script>
      <!-- ChartJs -->
      <script src="../plugins/chartjs/Chart.bundle.js"></script>
      <!-- Sparkline Chart Plugin Js -->
      <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script>
      <!-- Custom Js -->
      <script src="../js/admin.js"></script>
      <script src="../loader.js"></script>
      <!-- Demo Js -->
      <script src="../js/demo.js"></script>
      <script src="../plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
   </body>
</html>