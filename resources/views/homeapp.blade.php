@extends('layouts.base')
@section('content')
<script src="/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js
"></script>

<link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
   />

   <style>
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
              
            </h2>

            <div class="row clearfix">
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="info-box">
                       <div class="icon bg-red">
                           <i class="material-icons">shopping_cart</i>
                       </div>
                       <div class="content">
                           <div class="text">TOTAL VENDAS</div>
                           <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">125</div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="info-box">
                       <div class="icon bg-indigo">
                           <i class="material-icons">face</i>
                       </div>
                       <div class="content">
                           <div class="text">TOTAL CLIENTES</div>
                           <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="info-box">
                       <div class="icon bg-purple">
                           <i class="material-icons">bookmark</i>
                       </div>
                       <div class="content">
                           <div class="text">TOTAL VISUALIZAÇÕES</div>
                           <div class="number count-to" data-from="0" data-to="117" data-speed="1000" data-fresh-interval="20">117</div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="info-box">
                       <div class="icon bg-deep-purple">
                           <i class="material-icons">favorite</i>
                       </div>
                       <div class="content">
                           <div class="text">LIKES</div>
                           <div class="number count-to" data-from="0" data-to="1432" data-speed="1500" data-fresh-interval="20">1432</div>
                       </div>
                   </div>
               </div>
           </div>
            
   </div>

   
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    BASIC TABLES
                    <small>Basic example without any additional modification classes</small>
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
            <div class="body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>USERNAME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Larry</td>
                            <td>Jellybean</td>
                            <td>@lajelly</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Larry</td>
                            <td>Kikat</td>
                            <td>@lakitkat</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</div>
</div>
</section>


<script>
   
</script>
@stop