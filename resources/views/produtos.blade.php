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
               Cadastro de Produtos
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
                        <th>Nome produto</th>
                        <th>Valor unitario</th>
                        <th>Valor custo</th>
                        <th>Cfop</th>
                        <th>Icms</th>
                        <th>Total em estoque</th>
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
          
$.ajax({
     url: `{{ route('produtoslist') }}`,
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
                     "data": "NOME_PRODUTO"

                     
                 },

                 
                 {
                     "data": "PRECO_UNIT"
                 },
                 {
                     "data": "PRECO_CUSTO"
                 },
                 {
                     "data": "CFOP"
                 },
    
                 {
                     "data": "ICMS"
                 },
                 {
                     "data": "QUANTIDADE_ESTOQUE"
                 },

                 { "data": "NOME_PRODUTO", "name": "NOME_PRODUTO",
             fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.NOME_PRODUTO) {
              
                $(nTd).html("<a style='margin:10px' class='waves-effect waves-light btn btn-large  bg-light-blue' href='/produtoseditview/"+oData.id+"'><i class='material-icons'>edit</i></a>" + "<a style='margin:10px' class='waves-effect waves-light  btn bg-red waves-effect' href='/produtosedit/"+oData.id+"'><i class='material-icons'>delete_forever</i></a>"+"<a style='margin:10px' class='waves-effect waves-light  btn bg-red waves-effect' onclick='cad_opçoes("+oData.id+")'><i class='material-icons'>add_to_photos</i> Opções</a>"+"<a style='margin:10px' class='waves-effect waves-light  btn bg-red waves-effect' href='/img/"+oData.id+"'><i class='material-icons'>image</i></a>");
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
    title: 'Cadastro de produto',
    html:

        `<br>

        
<form action="/" id="foto" id="f1" class="dropzone dz-clickable" method="post" enctype="multipart/form-data">
                            <div class="dz-message">
                                <div class="align-center drag-icon-cph">
                                    <i id="dedo" class="material-icons">touch_app</i>
                                   <center>
                                    <img id="myimage" height="200">

                                   <br>
                                    <input class="" onchange="onFileSelected(event)" type="file" name="fileToUpload" id="fileToUpload" size="1" />
                                    </center>
                                </div>
                                <h3>Selecione a foto do produto</h3>
                                <em></em>
                            </div>
                            
                        </form>
                        <br>
                            <br>
                           
                            
<form id="f1" action="{{route('produtossave')}}" method="POST">

@csrf
<div class="row clearfix">
<input style="display:none" type="text" name="ID_USER" id="ID_USER" value="{{$iduser}}">
   <input style="display:none" id="IMG" name="IMG">
                            <div class="col-sm-6">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label class="">Nome do produto</label>
                                        <input value="${dom_values_estate.nomeproduto}" id="NOME_PRODUTO" name="NOME_PRODUTO" type="text" class="form-control">
                                       
                                    </div>
                                </div>
                             
                            </div>
                            <div class="col-sm-6">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label  class="">Valor unitário</label>
                                        <input value="${dom_values_estate.precounitario}" id="PRECO_UNIT"  name="PRECO_UNIT" onfocus="masc(this)"  type="text" class="form-control">
                                      
                                    </div>
                                </div>
                        </div>
                        
                        <div class="col-sm-12">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label  class="">Descrição produto</label>
                                        <textarea text="${dom_values_estate.descr}" id="DESCR" name="DESCR"  type="text" class="form-control"></textarea>
                                      
                                    </div>
                                </div>
                        </div>

                        <div class="col-sm-6">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label  class="">Valor custo</label>
                                        <input  value="${dom_values_estate.precedecusto}" id="PRECO_CUSTO" name="PRECO_CUSTO"  onfocus="masc(this)"  type="text" class="form-control">
                                      
                                    </div>
                                </div>
                        </div>


                        <div class="col-sm-6">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label  class="">CFOP</label>
                                        <input  value="${dom_values_estate.cfop}"  id="CFOP"  name="CFOP" type="text" class="form-control">
                                      
                                    </div>
                                </div>
                        </div>

                        <div class="col-sm-6">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label  class="">ICMS</label>
                                        <input   value="${dom_values_estate.icms}"  id="ICMS" name="ICMS"    type="text" class="form-control">
                                      
                                    </div>
                                </div>
                        </div>

                        <div class="col-sm-6">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label  class="">Quantidade em estoque</label>
                                        <input id="QUANTIDADE_ESTOQUE" name="QUANTIDADE_ESTOQUE"  type="text" class="form-control">
                                   
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

   if (!document.getElementById('NOME_PRODUTO').value) {
      dom_values_estate.precounitario = document.getElementById('PRECO_UNIT').value
      dom_values_estate.precedecusto = document.getElementById('PRECO_CUSTO').value
      dom_values_estate.descr = document.getElementById('DESCR').value
      dom_values_estate.cfop = document.getElementById('CFOP').value
      dom_values_estate.icms = document.getElementById('ICMS').value

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


async function cad_opçoes(idproduto) {
       var get_name_opt = ''
       var id_p = idproduto
   const { value: vv } = await Swal.fire({
          title: 'Cadastrando opção do produto',
          input: 'text',
          inputPlaceholder: 'Digite o nome da oção ',
          inputValidator: (result) => {
            return !result && 'Digite o nome do oção do produto'
           }
        })

       if (vv) {
         get_name_opt = vv
         const { value: formValues } = await Swal.fire({
          title: 'Adicione os Itens de variação',
          confirmButtonText:'Salvar',
          html:
           '<form id="cont">'+
           '<input id="op" name="1"  class="swal2-input">' +
           '<input id="swal-input2" name="2" class="swal2-input">'
          + '</form>'+'<button onclick="insert_opt()" type="button"  class="waves-effect waves-light  btn bg-red waves-effect">  <i class="large material-icons">add</i></button>',
          focusConfirm: false,
          preConfirm: () => {
           
           }
         }).then(function(){
    
            if(get_name_opt){
            
               //Temos que fazer a tranformacao do serialize para salvar com json
               var $form = $('#cont');
               let serializedData = $form.serialize();
               serializedData = serializedData.replace(/&/g, ",");//Remove &
               serializedData = serializedData.replace(/=/g, "");//Remove =
               serializedData = serializedData.replace(/[0-9]/g, '')
               serializedData = serializedData.split(",");//Tranforma em array
               //Agora com o for each vamos tranformar em json ''
             let count = 0
               for(let i of serializedData ){
                  serializedData[count] = "" + i + "" //bota dentro de '' hahah
                  count = count + 1  
               }

               serializedData = JSON.stringify(serializedData)

               let newobject_opcoes = {
                  DESCR_OPT: get_name_opt,
                  ID_PRODUTO:id_p ,
                  JSON_OPT: serializedData ,
               }
                
               newobject_opcoes = JSON.stringify(newobject_opcoes)
            //   alert(serializedData)

               

                $.ajax({
                  type: "POST",
                  url: "{{route('opcoessave')}}",
                  data: newobject_opcoes,
                  contentType: "application/json; charset=utf-8",
                  dataType: "json",
                  success: function(data,msg) {
                      
                     Swal.fire(
                            '',
                            '<h3>Opção adicionada ao cadastrado com sucesso !</h3>',
                            'success'
                             )
                       consulta()
                     
                    },
                  error: function(xhr, error){
                      //  alert('error')
                       // alert(JSON.stringify(xhr))
                  },
                  });
             


               //save_opcoes()
            }


         });

         

        }
   
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




function insert_opt(){
   cont_insert = cont_insert + 1
   $("#cont").append('<input id="swal-input2" name="'+ cont_insert +'" class="swal2-input">');
  
}


function save_opcoes(){

   
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

//Mascaras


       
</script>
@stop