@extends('layouts.base')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
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
              Tela de Vendas
            </h2>
           
            
            <br>
            <br>
            <div class="row clearfix">
               <div class="col-sm-3">
                  <div class="form-group">
                     <div class="form-line">
                        <label style="margin-top:10px;"  for="cars">Filtro:</label>
                        <select name="tiposeach" id="tiposeach">
                           <option value="Nome">Nome</option>
                           <option value="Entregue">Entregue</option>
                           <option value="Pendente">Pendente</option>
                           <option value="Telefone">Telefone</option>
                           <option value="Bairro">Bairro</option>
                           <option value="Rua">Rua</option>
                           <option value="Numero">Numero residencia</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <div class="form-line">
                        <input id="busca" type="text" onkeyup="search(this.value);" placeholder="Escreva a busca.." class="form-control" >

                     </div>
                  </div>
               </div>
            </div>
            <h1>Vendas do dia</h1>
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
            <div style=" margin:30px 40px 30px 30px; " class="card-content">
               <table id="tb"  style=" margin:30px 40px 30px 30px;width:100% " id="example" class="display" >
                  <thead>
                     <tr>
                     <tr>
                        
                        <th>id</th>
                        <th>Nome cliente</th>
                        <th>Preço total (Adicionais+Produto+Entrega)</th>
                        <th>Tipo de retirada</th>
                        <th>Data e hora</th>
                        <th>Ver +</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                     <tr>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- #END# Browser Usage -->
</div>
</div>
</section>

<script>

    
function consulta(params) {
            
            $.ajax({
               url: `{{ route('listvendas') }}`,
               type: 'GET',
               success: function(data) {
                     var table = $('#tb').DataTable({
                        
                        "language": {
                           "lengthMenu": "Mostrar _MENU_ cadastros por pagina",
                           "zeroRecords": "Nenhum registro foi encontrado",
                           "info": "Showing page _PAGE_ of _PAGES_",
                           "infoEmpty": "Nenhum registro foi encontrado",
                           "infoFiltered": "(filtered from _MAX_ total records)",
                           "search": "Consulta: ",
                           "oPaginate": {
                           "sFirst": "Avançar", // This is the link to the first page
                           "sPrevious": "Voltar", // This is the link to the previous page
                           "sNext": "Avançar", // This is the link to the next page
                           "sLast": "Voltar" // This is the link to the last page
                        }
                        },
                        "pageLength": 40,
                        data: data,
                        destroy: true,
                        'order': [[0, 'dec']],
               
                        columns: [{
                                 "data": "id"
                           },
                           
                           
                           {
                                 "data": "nomecliente"
         
                                 
                           },
         
                           
                           {
                                 "data": "valor_total"
                           },
                           
                           {
                                 "data": "tiporetirada"
                           },
               
                           {
                                 "data": "created_at"
                           },
                           
         
                           { "data": "id", "name": "id",
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                        if(oData.nomecliente) {
                        
                           $(nTd).html(`<a style='margin:10px' class='waves-effect waves-light btn btn-large  bg-light-blue' onclick="localentrega('${oData.endereco}','${oData.bairro}','${oData.cidade}','${oData.cep}','${oData.numero}')"><i class='material-icons'>flag</i>Local entrega</a>`+`<a style='margin:10px' class='waves-effect waves-light btn btn-large  bg-light-blue' onclick="produtos('${oData.id}')"><i class='material-icons'>add_shopping_cart</i>Produtos</a><a style='margin:10px' class='waves-effect waves-light btn btn-large  bg-light-blue' onclick="localentrega('${oData.endereco}','${oData.bairro}','${oData.cidade}','${oData.cep}','${oData.numero}')"><i class='material-icons'>assignment_turned_in</i></a>`);
                        }
                        //] image
                        
                  }
               },
                           
                           
                        ],
                        responsive: true,
                     });
                     $('#datatable-json').on('click', 'button', function(e) {
                        e.preventDefault;
                        var rows = table.row($(this).parents('tr')).data(); //Get Data Of The Selected Row
                        console.log(rows)
                     });
               }
               });
            }


            consulta()



      
      
   function setSearch(rota,parametro){

       $.ajax({
           url: rota +'/'+ parametro,
           type: 'GET',
           success: function(data) {
               var table = $('#tb').DataTable({
                   "language": {
                       "lengthMenu": "Mostrar _MENU_ cadastros por pagina",
                       "zeroRecords": "Nenhum registro foi encontrado",
                       "info": "Showing page _PAGE_ of _PAGES_",
                       "infoEmpty": "Nenhum registro foi encontrado",
                       "infoFiltered": "(filtered from _MAX_ total records)",
                       "search": "Consulta: "
                   },
                   data: data,
                   "pageLength": 40,
                   
                   destroy: true,
      
                   columns: [{
                                 "data": "id"
                           },
                           
                           
                           {
                                 "data": "nomecliente"
         
                                 
                           },
         
                           
                           {
                                 "data": "valor_total"
                           },
                           
                           {
                                 "data": "tiporetirada"
                           },
               
                           {
                                 "data": "created_at"
                           },
                           
         
                           { "data": "id", "name": "id",
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                        if(oData.nomecliente) {
                        
                           $(nTd).html(`<a style='margin:10px' class='waves-effect waves-light btn btn-large  bg-light-blue' onclick="localentrega('${oData.endereco}','${oData.bairro}','${oData.cidade}','${oData.cep}','${oData.numero}')"><i class='material-icons'>flag</i>Local entrega</a>`+`<a style='margin:10px' class='waves-effect waves-light btn btn-large  bg-light-blue' onclick="produtos('${oData.id}')"><i class='material-icons'>add_shopping_cart</i>Produtos</a>`);
                        }
                        //] image
                        
                  }
               },
                           
                           
                        ],
                   responsive: true,
               });
               $('#datatable-json').on('click', 'button', function(e) {
                   e.preventDefault;
                   var rows = table.row($(this).parents('tr')).data(); //Get Data Of The Selected Row
                   console.log(rows)
               });
           }
       });
  
     }


            
    ///Evento keypress do documento
    $(document).on('keypress', function(e) {
     if (e.which == 13) {
         var getval_tiposearch = $('#tiposeach').val();
         let get_search = $('#busca').val();
        
        switch(getval_tiposearch){
           case 'Nome':
            setSearch('{{ route('search_nome') }}',get_search)
           break;
           case 'Entregue':
            setSearch('{{ route('searchentregue') }}',get_search)
           break;
           case 'Pendente':
            setSearch('{{ route('searchnaoentregue') }}',get_search)
           break;
           case 'Telefone':
            setSearch('{{ route('searchtelefone') }}',get_search)
           break;
           case 'Bairro':
            setSearch('{{ route('searchbairro') }}',get_search)
           break;
           case 'Rua':
            setSearch('{{ route('searchrua') }}',get_search)
           break;

           


           
      
         }
     }
    });


async function localentrega(endereco,bairro,cidade,cep,numero) {
    Swal.fire({
     title: 'Informações sobre local de entrega',
     width:800,
     html: `<label type="text">Rua: ${endereco}</label><br><label type="text">Numero: ${numero}</label><br><label type="text">Bairro:${bairro}</label><br><label type="text">Cidade:${cidade}</label><br><label type="text">Cep:${cep}</label>` ,
     imageUrl: 'https://image.freepik.com/vetores-gratis/icone-de-localizacao-de-cor-plana-no-mapa-de-papel_52465-148.jpg',
     imageWidth: 250,
     imageHeight: 250,
     imageAlt: 'Custom image',
    })
       
}

let getx
async function produtos(idproduto) {
   
  
    $.get( `{{route("getproductsjson")}}/${idproduto}`,function(data){
      getx = JSON.parse(data)
    }).done(function(data){
	
      setTimeout(function(){
         ///O comando verbatin escapa o blade para evitar erro na view
         @verbatim
            var example1 = new Vue({
             el: '#listaadd',
             data: {
             items: JSON.parse(data)
              }
             })
           $('#listaadd').show()

       },1000)
        @endverbatim
   })


    Swal.fire({
     title: 'Produtos e adicionais',
     width:800,
     html: `
 @verbatim
 <center>
 <div onshow="updateview_adicionais()" class="container-fluid"/.
 <ul class="container-fluid"  style="display:none;width:20px" id="listaadd">
 
	<table  class="table table-dark">
   <thead style="background-color:#FBB448;" class="thead-dark">
	 <tr>
	   <th scope="col">#</th>
	   <th scope="col">Nome produto + adicionais</th>
	   <th scope="col">Valor (adicionais + produtos)</th>
      <th scope="col">Quantidade</th>
	   <th scope="col">Observações do pedido</th>
	 </tr>
   </thead>
   <tbody>
  <tr v-for="item in items" :key="item.message">
   
	   <td> {{ item.idproduto }}</td>
	   <td> {{ item.nomeproduto }} <a style="color:red">{{ item.tags_adicionais }}</a></td>
	   <td> {{ item.precoproduto }}</td>
      <td> {{ item.quantidade }}</td>
      <td> {{ item.obs }}</td>

	 </tr>
	 
   
   </tbody>

 </table>

 
</ul>
</div>
</center>
@endverbatim` ,
     imageUrl: 'https://www.freepngimg.com/thumb/web_design/42851-3-cart-free-clipart-hd.png',
     imageWidth: 250,
     imageHeight: 250,
     imageAlt: 'Custom image',
    })
       
}


async function  precos(valortotalprodutos,valortotalentrega,valortotaladicionais) {

   let soproduto = (valortotalprodutos - valortotaladicionais) - valortotalentrega
   soproduto = soproduto.toFixed(2)
   valortotalprodutos = valortotalprodutos.toFixed(2)
   valortotalentrega = valortotalentrega.toFixed(2)
   valortotaladicionais = valortotaladicionais.toFixed(2)
   
   Swal.fire({
     title: '',
     width:500,
     html: `<center><h2 class="swal2-title" id="swal2-title" style="display: flex;">Total (produtos+adicionais): R$ ${valortotalprodutos}</h2><br><h2 class="swal2-title" id="swal2-title" style="display: flex;">Total adicionais: R$ ${valortotaladicionais}</h2><br><h2 class="swal2-title" id="swal2-title" style="display: flex;">Total produtos: R$ ${soproduto}</h2><br><h2 class="swal2-title" id="swal2-title" style="display: flex;">Total entrega: R$ ${valortotalentrega}</h2></center>` ,
     imageUrl: 'https://img.pngio.com/pricing-pricing-png-500_500.png',
     imageWidth: 250,
     imageHeight: 250,
     imageAlt: 'Custom image',
    })

}

</script>

@stop