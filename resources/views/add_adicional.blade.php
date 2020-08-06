@extends('layouts.base')
@section('content')
<script src="/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js
"></script>
<script src="/plugins/bootstrap-notify/bootstrap-notify.js"></script>
<script src="/js/pages/ui/notifications.js"></script>


<link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
   />

   <style>

[data-notify] { z-index: 9999 !important; }
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
           Adicionais produto {{$nomeproduto}}
            </h2>
            <a onclick="cad_produto()" class="waves-effect waves-light btn btn-large  bg-light-blue"><i  style="margin-top:-6px" class="material-icons right">add_circle_outline</i> <span style="margin-right:5px;" >Adicionar</span> </a>
            <a href="{{route('produtos')}}" class="waves-effect waves-light btn btn-large  bg-light-blue"><i  style="margin-top:-6px" class="material-icons right">assignment_turned_in</i> <span style="margin-right:5px;" >Finalizar</span> </a>
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
                        Adicionais cadastrados para esse produto
                        <th>id</th>
                        <th>Descrição adicional</th>
                        <th>Valor unitario</th>
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

   var global_idproduto = '{{$produto->id}}'
   var global_name_produto = '{{$produto->NOME_PRODUTO}}'
   var cont_insert2 = 2
   var cont_insert = 3
   var dom_values_estate = {
      nomeproduto:'',
      precounitario:'',
      precedecusto:'', 
      descr:'',
      cfop:'',
      icms:'',
      cst:'',
      ncm:''
   }

   var dom_opcoes = ''


function consulta(params) {
   let get_product_id = '{{$produto->id}}'
$.ajax({
     url: `{{ route('addsearch') }}/${get_product_id}`,
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
                     "data": "adicionais.ADICIONAL"
                 },

                 {
                     "data": "adicionais.PRECO"
                 },

                 

                 { "data": "id", "name": "id",
             fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.id) {
              
                $(nTd).html("<a style='margin:10px' class='waves-effect waves-light btn btn-large  bg-red' href='{{route('adcionadodelete')}}/"+oData.id+'/'+global_idproduto+"'><i class='material-icons'>delete</i></a>");
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
setTimeout(function(){ 
$.ajax({
     url: `{{ route('adicionaislist') }}`,
     type: 'GET',
     success: function(data) {
         var table = $('#listadicionais').DataTable({
            
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
              if(oData.ADICIONAL) {
              
                $(nTd).html(`<a  id='btad${oData.id}' data-placement-from="bottom" data-placement-align="right" data-animate-enter="" data-animate-exit="" data-color-name="bg-blue-grey" onclick="add_adicional(${global_idproduto},${oData.id},'btad${oData.id}')" class="btn bg-red btn-circle waves-effect waves-circle waves-float"><i class="material-icons left">add</i></a>
`);
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
   },1000)

const frm = await Swal.fire({
    width: 800,
    title: 'Selecione o adicional',
    html:

        `<br>

      
                           
                        
@csrf

           
               <table   class="highlight"  id="listadicionais"  style="color:white;width:100%;background-color:#96DDEA;font-size:30px" >
                  <thead style="background-color:#337ab7;">
                     
                     <tr>
                        
                        <th style="width:100px; text-align:center;" > id </th>
                        <th style="width:100px; text-align:center;" >Descrição</th>
                        <th style="width:100px; text-align:center;">Preço</th>
                        <th style="width:100px; text-align:center;">Ações</th>
                        
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                     <tr>
                     </tr>
                  </tfoot>
               </table>
           
                        `,

    confirmButtonText: 'SALVAR PRODUTO',
    showCancelButton: true,
    cancelButtonText: 'CANCELAR',
    focusConfirm: false,
    preConfirm: () => {
      
    }
}).then(function (params) {
     location.href="../produtos"

   if (!document.getElementById('NOME_PRODUTO').value) {
      dom_values_estate.precounitario = document.getElementById('PRECO_UNIT').value
      dom_values_estate.precedecusto = document.getElementById('PRECO_CUSTO').value
      dom_values_estate.descr = document.getElementById('DESCR').value
      dom_values_estate.cfop = document.getElementById('CFOP').value
      dom_values_estate.ncm = document.getElementById('NCM').value
      dom_values_estate.cst = document.getElementById('CST').value



        Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite o nome do produto.</h3>',
            footer: ''
          })
   
   return 
   }

   if (!document.getElementById('PRECO_UNIT').value) {
      dom_values_estate.nomeproduto = document.getElementById('NOME_PRODUTO').value
      dom_values_estate.precedecusto = document.getElementById('PRECO_CUSTO').value
      dom_values_estate.descr = document.getElementById('DESCR').value
      dom_values_estate.cfop = document.getElementById('CFOP').value
      dom_values_estate.icms = document.getElementById('ICMS').value
      dom_values_estate.ncm = document.getElementById('NCM').value
      dom_values_estate.cst = document.getElementById('CST').value

        Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite o preço unitário do produto.</h3>',
            footer: ''
          })
   
   return 
   }

  

 





   

save_produtos('')
   
})

return 'You need to write something!'

}



async function cad_adicionais(idproduto) {
     
 const { value: formValues } = await Swal.fire({
 title: 'Adicione os adicionais ao produto',
 confirmButtonText:'Cadastrar Adicional',
 width:500,
 html:
'<br><form id="contx">'+
'<input style="display:none" value="'+idproduto+'" id="ID_PRODUTO" name="ID_PRODUTO"  class="swal2-input"> <input placeholder="Nome adicional" id="ADICIONAL" name="ADICIONAL"  class="swal2-input">' +
'<input placeholder="Preço" id="PRECO" name="PRECO" class="swal2-input">'
 + '</form>'+'<button  onclick="add_adicional()" type="button"  class="waves-effect waves-light  btn bg-red waves-effect">  <i class="large material-icons">add</i></button>',
 focusConfirm: false,
 preConfirm: () => {
           
           }
 }).then(function(){
           

 })
}

function mais_adicionais(){
   
  alert(document.getElementById('ADICIONAL').value)

     if(!document.getElementById('ADICIONAL').value){
      Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite o nome do adicional</h3>',
            footer: ''
          })
   
        return
     }

     
     if(!document.getElementById('PRECO').value){
      Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite o preço do adicional</h3>',
            footer: ''
          })
   
        return
     }

     $('#ADICIONAL').val('')
     $('#PRECO').val('')

     Swal.fire(
       '',
       '<h3>Adicional cadastrado</h3>',
       'success'
      )
  
 //  $("#cont").append('<input id="swal-input2" name="'+ cont_insert +'" class="swal2-input">');
  
}




async function save_produtos() {

var request;

var $form = $('#f1');
var serializedData = $form.serialize();



request = $.ajax({
    url: "{{route('produtossave')}}",
    type: "post",
    data: serializedData
});

request.done(function(response, textStatus, jqXHR) {
   Swal.fire(
  
  '',
  '<h3>Produto cadastrado com sucesso !</h3>',
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



}


function masc(val) {
$(val).maskMoney({
    prefix: "R$:",
    decimal: ",",
    thousands: "."
});
}


async function loop_estado(){


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



function getBase64Image(img) {
  var canvas = document.createElement("canvas");
  canvas.width = img.width;
  canvas.height = img.height;
  var ctx = canvas.getContext("2d");
  ctx.drawImage(img, 0, 0);
  var dataURL = canvas.toDataURL("image/png");
  return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}

var base64 = getBase64Image(document.getElementById("imageid"));





function add_adicional(idproduto='',idadicional='', idbutton){
   
   
   $("#"+idbutton).hide();
  //alert(idadicional)

  var getdata = ''
  var con_add = $.get( "{{route('adicionaisitem')}}/"+idadicional, function(data ) {
    getdata = data
  })
  .done(function() {
     let savex = $.get(`{{route("addadicionalaoproduto")}}/${idproduto}/${idadicional}`,function(data){
       
      }).fail(function(){
      
         showNotification('alert bg-orange',`${getdata.ADICIONAL} ja foi adicionado a esse produto`,'bottom','right','','')
   
      }).done(function(){
         
         showNotification('alert-success',`${getdata.ADICIONAL} foi adicionado com sucesso`,'bottom','right','','')

      })
         consulta() ///executa consulta
  })
  .fail(function() {
    alert( "error" );
  })
  .always(function() {
    
  });

 

}


function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
    if (colorName === null || colorName === '') { colorName = 'bg-black'; }
    if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
    if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
    if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
    var allowDismiss = true;

    $.notify({
        message: text
    },
        {   
            zindex:2000,
            type: colorName,
            allow_dismiss: allowDismiss,
            newest_on_top: true,
            timer: 1000,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            animate: {
                enter: animateEnter,
                exit: animateExit
            },
            template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
}

//Mascaras

       
</script>
@stop