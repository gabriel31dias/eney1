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
               Cadastro de formas de pagamento 
            </h2>
            <a onclick="cad_produto()" class="waves-effect waves-light btn btn-large  bg-light-blue"><i  style="margin-top:-6px" class="material-icons right">add_circle_outline</i> <span style="margin-right:5px;" >Incluir</span> </a>
            <a class="waves-effect waves-light btn bg-light-blue "><i  style="margin-top:-6px" class="material-icons right">autorenew</i> <span style="margin-right:5px;" >Alterar</span> </a>
            <a class="waves-effect waves-light btn bg-light-blue"><i  style="margin-top:-6px" class="material-icons right">swap_vertical_circle</i> <span style="margin-right:5px;" >Ativar/Desativar</span> </a>
            <a class="waves-effect waves-light btn  bg-light-blue"><i  style="margin-top:-6px" class="material-icons right">settings_ethernet</i> <span style="margin-right:5px;" >Filtros</span> </a>
            <a class="waves-effect waves-light btn bg-light-blue"><i  style="margin-top:-6px" class="material-icons right">local_printshop
            </i> <span style="margin-right:5px;" >Imprimir</span> </a>
            <a class="waves-effect waves-light btn bg-light-blue "><i  style="margin-top:-6px" class="material-icons right">history
            </i> <span style="margin-right:5px;" >Históricos</span> </a>
            <a class="bg-light-blue  waves-effect waves-light btn bg-light-blues "><i  style="margin-top:-6px" class="material-icons right">launch
            </i> <span style="margin-right:5px;" >Recebimentos</span> </a>
            <br>
            <br>
            <div class="row clearfix">
               <div class="col-sm-3">
                  <div class="form-group">
                     <div class="form-line">
                        <label style="margin-top:10px;"  for="cars">Filtro:</label>
                        <select name="tiposeach" id="tiposeach">
                           <option value="Busca Versatil">Busca Versatil</option>
                           <option value="Nome">Nome</option>
                           <option value="Razão social">Razão social</option>
                           <option value="Código">Código</option>
                           <option value="Cpf/Cnpj">Cpf/Cnpj</option>
                           <option value="Cidade">Cidade</option>
                           <option value="Endereço">Endereço</option>
                           <option value="Telefone">Telefone</option>
                           <option value="audi">Numero residencia</option>
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
                        <th>Nome forma</th>
                        <th>Descrição forma</th>
                        <th>Ações</th>
                        
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
   var cont_insert2 = 2
   var cont_insert = 3
   var dom_values_estate = {
      nomeproduto:'',
      precounitario:'',
      precedecusto:'', 
      descr:'',
      cfop:'',
      icms:''
   }

   var dom_opcoes = ''


 function consulta(params) {
          let getid = '{{$iduser}}'
$.ajax({
     url: `{{ route('formaspglist') }}/${getid}`,
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
             "pageLength": 20,
             data: data,
             destroy: true,
             'order': [[0, 'dec']],
    
             columns: [{
                     "data": "id"
                 },
                 
                 
                 {
                     "data": "NOME_FRM"

                     
                 },

                 
                 {
                     "data": "DESCR_FRM"
                 },

                 { "data": "STATUS", "name": "STATUS",
             fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.NOME_FRM) {
                 var check = ''
                
                 if(oData.STATUS == 'true'){
                   check = 'checked=""'
                 }
              
                $(nTd).html(`<div class="form-inline" ><div  class="switch"><label>OFF<input onchange="chang(${oData.id})" type="checkbox" ${check}  ><span class="lever"></span>ON</label>` + "<a style='margin:10px' class='waves-effect waves-light  btn bg-red waves-effect' href='{{route('formaspgdestroy')}}/"+oData.id+"'><i class='material-icons'>delete_forever</i></a>"+'</div></div>');
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


   consulta() ///executa consulta


   ///vue vmodel forms 
async function cad_produto() {

const frm = await Swal.fire({
    width: 800,
    title: 'Cadastro de formas de pagamento',
    html:

        `<br>

     
                        <br>
                            <br>
                           
                            
<form id="f1" action="{{route('formaspgsave')}}" method="POST">

@csrf
<div class="row clearfix">


                           <div class="form-group form-float">
                                     <div class="form-line">
                                       <label class="">Codigo sistema</label>
                                         <input onblur="requisitaproduto()" id="CODIGO_SISTEMA"   value=""  name="CODIGO_SISTEMA" type="text" class="form-control">
                                        
                                     </div>
                                 </div>
                              
                             </div>

<input style="display:none" type="text" name="ID_USER" id="ID_USER" value="{{$iduser}}">
                            <div class="col-sm-12">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label class="">Nome da forma de pagamento</label>
                                        <input  id="NOME_FRM" name="NOME_FRM" type="text" class="form-control"> 
                                    </div>
                                </div>

                                
                                <input style="display:none" id="STATUS" name="STATUS" type="text" value="true" class="form-control"> 

                             
                            </div>
                            
                            <div class="col-sm-12">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label  class="">Descriçaõ forma de pagamento</label>
                                      <input   class="form-control" id="DESCR_FRM" name="DESCR_FRM"> </input>
                                    </div>
                                </div>
                        </div>

                           
                      

                        
            </form>
                        `,

    confirmButtonText: 'SALVAR PRODUTO',
    showCancelButton: true,
    cancelButtonText: 'CANCELAR',
    focusConfirm: false,
    preConfirm: () => {
      
    }
}).then(function (params) {

   if (!document.getElementById('NOME_FRM').value) {

        Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite o nome da forma de pagamento.</h3>',
            footer: ''
          })
   
   return 
   }

   if (!document.getElementById('DESCR_FRM').value) {
   
        Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite a descrição da forma de pagamento</h3>',
            footer: ''
          })
   
   return 
   }

   
    $('#f1').submit();
 
   
})

return 'You need to write something!'

}




function ver_result(){

 let url =  window.location.href ;

 if(url.match('true')){
    Swal.fire(
    '',
    '<h3>Forma de pagamentos cadastrada.</h3>',
     'success'
     )
  }


  if(url.match('false')){
    Swal.fire(
    '',
    '<h3>Um erro aconteceu ao salvar a forma de pagamento.</h3>',
     'error'
     )
  }

  if(url.match('ex')){

   Swal.fire(
    '',
    '<h3>Registro excluido.</h3>',
     'success'
     )
   
  }





  

}

ver_result()


function chang($idforma){
   var verfica = ''
   let id_user = '{{$iduser}}'
   let url = "{{route('testex')}}/"+$idforma
   $.get(url, function(data, status){ ///Testa pra ver se esta ativa
      verfica = JSON.parse(data);
   }).then(function(){

     if(verfica == true){
      ///se a forma estiver ativada entao desativa
        $.get("{{route('formasinativa')}}/"+$idforma, function(data, status){ ///Testa pra ver se esta ativa
           
         })
       
      }else{
          
         $.get("{{route('formaspgativa')}}/"+$idforma, function(data, status){ ///Testa pra ver se esta ativa
            
         })
       
      }

   })
}




function requisitaproduto(){
   let getcodsistem = document.getElementById('CODIGO_SISTEMA').value
   let objx = {
     room:{{ App\Http\Controllers\AppController::getlojacode($iduser)}},
     codsis:getcodsistem,
     produtosjson:'requisitaforma'
   }
   socket.emit('canalcomunica', objx)
}



       
</script>
@stop