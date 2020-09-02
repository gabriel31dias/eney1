@extends('layouts.base')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
               Cadastro de adicionais
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
                        <th>Nome</th>
                        <th>Preço</th>
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
      adicional:'',
      cfop:'',
      cst:'', 
      ncm:'',
      cfop:'',
      preco:'',
      img:''
   }

   var dom_opcoes = ''


   function consulta(params) {
          
$.ajax({
     url: `{{ route('adicionaislist') }}`,
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
                     "data": "ADICIONAL"

                     
                 },

                 
                 {
                     "data": "PRECO"
                 },

                 { "data": "ADICIONAL", "name": "ADICIONAL",
             fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.id) {
              
                $(nTd).html("<a style='margin:10px' class='waves-effect waves-light btn btn-large  bg-light-blue' onclick=updateX('"+oData.id+"')><i class='material-icons'>edit</i></a>" + "<a style='margin:10px' class='waves-effect waves-light  btn bg-red waves-effect' href='{{route('adcionaisdelete')}}/"+oData.id+"'><i class='material-icons'>delete_forever</i></a>");
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
    title: 'Cadastro de Adicionais',
    html:

        `<br>

        
                        <br>
                            <br>
                           
                            
<form id="f1" action="{{route('adicionaissave')}}" method="POST">

@csrf
<div class="row clearfix">
<input style="display:none" type="text" name="ID_USER" id="ID_USER" value="{{$iduser}}">

                    <div class="col-sm-6">
                            
                                  
                            <label  class="">Código sistema</label>
                            <input  class="form-control" onblur="requisitaproduto()" id="CODIGO_SISTEMA" name="CODIGO_SISTEMA"  ></input>

                      
                          </div>
                            <div class="col-sm-12">
                            
                                  
                              <label  class="">Nome adicional</label>
                              <input  class="form-control"  id="ADICIONAL" name="ADICIONAL"  ></input>

                        
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            
                        <div class="center-align col-sm-6">
                             <div class="center-align form-group form-float">
                                    <div class="form-line">
                                      <label  class="">Preço</label>
                                      <center>
                                        <input value="" id="PRECO"  name="PRECO" onfocus="masc(this)"  type="text" class="form-control">
                                        </center>
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

   if (params.isDismissed) {
         location.href = "/adicionais"
       
       return
      }

   if (!document.getElementById('ADICIONAL').value) {
      
     

        Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite o nome do adicional.</h3>',
            footer: ''
          })
   
   return 
   }

   if (!document.getElementById('PRECO').value) {
   

        Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite o preço adicional.</h3>',
            footer: ''
          })
   
   return 
   }
///--------------------------------------------Salva

var request;
var $form = $('#f1');
var serializedData = $form.serialize();
//alert(serializedData)
request = $.ajax({
    url: "{{route('adicionaissave')}}",
    type: "post",
    data: serializedData
});

request.done(function(response, textStatus, jqXHR) {
   Swal.fire(
  '',
  '<h3>Adicional cadastrado com sucesso !</h3>',
  'success'
   )
   consulta()
});

request.fail(function(jqXHR, textStatus, errorThrown) { 
 Swal.fire({
 icon: 'error',
 title: '',
 text: '<h3>O sistema encontrou um erro, verifique e tente novamente.</h3>',
 footer: ''
})


});


request.always(function() {
    // Reenable the inputs
    
});


   
})


}





function onFileSelected(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("myimage");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
  };

  reader.readAsDataURL(selectedFile);
  document.getElementById('dedo').style.display = 'none'

    setTimeout(function (params) {
  //  alert(document.getElementById('myimage').src)
     document.getElementById('IMG').value = document.getElementById('myimage').src
    

    },2000)
 

}


var dom_update = {
   id_produto:'',
   preco:'',
   CODIGO_SISTEMA:''
}
async function  updateX(idproduto) {

var datag = ''


await $.get("{{route('adicionaisitem')}}/"+idproduto, function(data, status){ ///Busca o registro no servidor para editar
            datax = data
            dom_update.id_produto =  datax.ADICIONAL
            dom_update.preco = datax.PRECO
            dom_update.CODIGO_SISTEMA = datax.CODIGO_SISTEMA
            //alert(datax.PRECO)
       }).then(function (params) {
        //alert(JSON.stringify(datax))
       })

//alert('dom'+ dom_update.id_produto )
  

const frm = await Swal.fire({
    width: 800,
    title: 'Cadastro de Adicionais',
    html:

        `<br>

        
                        <br>
                            <br>
                           
                            
<form id="f1" action="{{route('adicionaisupdate')}}" method="POST">

@csrf
<div class="row clearfix">
   <div class="col-sm-6">
                            
                                  
                            <label  class="">Código sistema</label>
                            <input  class="form-control" onblur="requisitaproduto()" value="${dom_update.CODIGO_SISTEMA}"  id="CODIGO_SISTEMA" name="CODIGO_SISTEMA"  ></input>

                      
                          </div>
<input style="display:none" type="text" name="ID_USER" id="ID_USER" value="{{$iduser}}">
<input style="display:none" type="text" name="ID_PRODUTO" id="ID_PRODUTO" value="${idproduto}">

                            <div class="col-sm-12">
                            
                                  
                              <label  class="">Selecione o produto</label>
                              <input  value="${dom_update.id_produto}" class="form-control"  id="ADICIONAL" name="ADICIONAL"  ></input>>

                        
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            
                        <div class="center-align col-sm-6">
                             <div class="center-align form-group form-float">
                                    <div class="form-line">
                                      <label  class="">Preço</label>
                                      <center>
                                        <input  id="PRECO"  onfocus="masc(this)"  value="${dom_update.preco}" name="PRECO" onfocus="masc(this)"  type="text" class="form-control">
                                        </center>
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

   if (params.isDismissed) {
         location.href = "/adicionais"
       
       return
      }

   if (!document.getElementById('ADICIONAL').value) {
      
     

        Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite o nome do adicional.</h3>',
            footer: ''
          })
   
   return 
   }

   if (!document.getElementById('PRECO').value) {
   

        Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite o preço adicional.</h3>',
            footer: ''
          })
   
   return 
   }
///--------------------------------------------Salva

var request;
var $form = $('#f1');
var serializedData = $form.serialize();
//alert(serializedData)
request = $.ajax({
    url: "{{route('adicionaisupdate')}}",
    type: "post",
    data: serializedData
});

request.done(function(response, textStatus, jqXHR) {
   Swal.fire(
  '',
  '<h3>Adicional cadastrado com sucesso !</h3>',
  'success'
   )
   consulta()
});

request.fail(function(jqXHR, textStatus, errorThrown) { 
 Swal.fire({
 icon: 'error',
 title: '',
 text: '<h3>O sistema encontrou um erro, verifique e tente novamente.</h3>',
 footer: ''
})


});


request.always(function() {
    // Reenable the inputs
    
});


   
})

   
}



function masc(val) {
   $(val).maskMoney({
      prefix: "",
      decimal: ".",
      thousands: ","
   });
}





function  serve(params) {
   

$('#ADICIONAL').select2({
            placeholder: "Choose tags...",
            minimumInputLength: 2,
            maximumSelectionLength: 3,
            ajax: {
                url: `{{route('produtoslistformat')}}`,
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                        
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
}





function requisitaproduto(){

   if (!document.getElementById('CODIGO_SISTEMA').value || document.getElementById('CODIGO_SISTEMA').value == 0){
      return
   }
   
   $(".swal2-container").hide()
  setTimeout(function(){

let getcodsistem = document.getElementById('CODIGO_SISTEMA').value
let objx = {
   room:{{ App\Http\Controllers\AppController::getlojacode($iduser)}},
   codsis:getcodsistem,
   produtosjson:'requisitaadicionais'
 }
 socket.emit('canalcomunica', objx)
 $(".swal2-container").show()
},1000)

}



//Mascaras


       
</script>
@stop