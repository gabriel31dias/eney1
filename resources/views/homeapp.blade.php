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
                   <div class="info-box hover-zoom-effect">
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
                   <div class="info-box hover-zoom-effect">
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
                   <div class="info-box hover-zoom-effect">
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
                   <div class="info-box hover-zoom-effect">
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
                    VENDAS AGUARDANDO APROVAÇÃO
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
                            @desktop
                            <th>NOME CLIENTE</th>
                            @elsedesktop
                           
                            @enddesktop
                            <th>VALOR TOTAL</th>
                            <th>HORA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendasaguardando as $item)

                        <tr>
                            @desktop
                            <td>{{$item->nomecliente}}</td>
                            @elsedesktop
                            @enddesktop
                            <td>{{$item->preco_total_produto + $item->preco_total_entrega }}</td>
                            <td>{{$item->created_at}}</td>
                            <td><a href="https://api.whatsapp.com/send?phone=55{{$item->numerotelefone}}&text=Ola%20{{$item->nomecliente}}!" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">chat</i>
                            </a></td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    VENDAS NÃO APROVADAS 
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
                            @desktop
                            <th>NOME CLIENTE</th>
                            @elsedesktop
                            @enddesktop
                           
                            <th>VALOR TOTAL</th>
                            <th>HORA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendasnaoaprovadas as $item)

                        <tr>
                            @desktop
                            <td>{{$item->nomecliente}}</td>
                            @elsedesktop
                            @enddesktop
                            <td>{{$item->preco_total_produto + $item->preco_total_entrega }}</td>
                            <td>{{$item->created_at}}</td>
                            <td><a href="https://api.whatsapp.com/send?phone=55{{$item->numerotelefone}}&text=Ola%20{{$item->nomecliente}}!" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">chat</i>
                            </a></td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    VENDAS APROVADAS 
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
                            @desktop
                            <th>NOME CLIENTE</th>
                            @elsedesktop
                            @enddesktop
                           
                            <th>VALOR TOTAL</th>
                            <th>HORA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendasaprovadas as $item)

                        <tr>
                            @desktop
                            <td>{{$item->nomecliente}}</td>
                            @elsedesktop
                            @enddesktop
                            <td>{{$item->preco_total_produto + $item->preco_total_entrega }}</td>
                            <td>{{$item->created_at}}</td>
                            <td><a href="https://api.whatsapp.com/send?phone=55{{$item->numerotelefone}}&text=Ola%20{{$item->nomecliente}}!" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">chat</i>
                            </a></td>
                        </tr>
                            
                        @endforeach
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