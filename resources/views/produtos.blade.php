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
               
                  $(nTd).html("<a style='margin:10px' class='waves-effect waves-light btn btn-large  bg-light-blue' onclick=updateX("+oData.id+")><i class='material-icons'>edit</i></a>" + "<a style='margin:10px' class='waves-effect waves-light  btn bg-red waves-effect' href='{{route('produtosdelete')}}/"+oData.id+"'><i class='material-icons'>delete_forever</i></a>"+"<a style='margin:10px;display:none' class='waves-effect waves-light  btn bg-red waves-effect' onclick='cad_opçoes("+oData.id+")'><i class='material-icons'>add</i> Opções</a>"+"<a style='margin:10px' class='waves-effect waves-light  btn bg-red waves-effect' href='/img/"+oData.id+"'><i class='material-icons'>image</i></a>"
                  +"<a style='margin:10px' class='waves-effect waves-light  btn bg-red waves-effect' href='{{route('addindex')}}/"+oData.id+"'><i class='material-icons'>add</i>Adicionais</a>");
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
      closeOnClickOutside: false,
      allowOutsideClick: false,
      title: 'Cadastro de produto ' + `  <div style="display:none" id="carregandoimg">    
                       <h1>Aguarder carregando imagem....</h1>
               </div>
                 `,
      html:

         `<br>

       
                  

<rr>
         <form action="/" id="foto" id="f2" class="dropzone dz-clickable" method="post" enctype="multipart/form-data">
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

         
                           <br>
                              <br>
                              
                              
   <form id="f1" action="{{route('produtossave')}}" method="POST">

   @csrf
   <div class="row clearfix">
   <input style="display:none" type="text" name="ID_USER" id="ID_USER" value="{{$iduser}}">
      <input style="display:none" id="IMG" name="IMG" value="data:image/png;base64,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">
                               <div class="col-sm-6">
                              
                              <div class="form-group form-float">
                                       <div class="form-line">

                                       <label class="">Código no sistema</label>
                                          <input onblur="requisitaproduto()" id="CODIGO_SISTEMA" name="CODIGO_SISTEMA" type="text" class="form-control">
         
                                       </div>
                                 </div>
                              
                              </div>
                              
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
                                 <div class="btn-group bootstrap-select form-control show-tick"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="-- Please select --"><span class="filter-option pull-left">-- Please select --</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">-- Please select --</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">10</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">20</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">30</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">40</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">50</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="NOME_GRUPO" class="form-control show-tick" tabindex="-98">
                                          <option value="">-- Selecione o grupo --</option>
                                          
                                          
   @foreach ($grupos as $grupo)
   <option value="{{$grupo->NOME_GRUPO}}">{{$grupo->NOME_GRUPO}}</option>
   @endforeach
                                       
                                       </select></div>
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
                                       <label  class="">CFOP</label>
                                          <input  value="${dom_values_estate.cfop}"  id="CFOP"  name="CFOP" type="text" class="form-control">
                                       
                                       </div>
                                 </div>
                           </div>

                           <div class="col-sm-6">
                              <div class="form-group form-float">
                                       <div class="form-line">
                                       <label  class="">CST</label>
                                          <input   value="${dom_values_estate.cst}"  id="CST" name="CST"    type="text" class="form-control">
                                       
                                       </div>
                                 </div>
                           </div>

                           <div class="col-sm-6">
                              <div class="form-group form-float">
                                       <div class="form-line">
                                       <label  class="">NCM</label>
                                          <input   value="${dom_values_estate.ncm}"  id="NCM" name="NCM"    type="text" class="form-control">
                                       
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

                         
                           </div>

                           </rr>
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
        // dom_values_estate.precedecusto = document.getElementById('PRECO_CUSTO').value
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
        /// dom_values_estate.precedecusto = document.getElementById('PRECO_CUSTO').value
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





   async function cad_adicionais(idproduto) {
      
   const { value: formValues } = await Swal.fire({
   title: 'Adicione os adicionais ao produto',
   confirmButtonText:'Cadastrar Adicional',
   width:500,
   closeOnClickOutside: false,
   allowOutsideClick: false,
   html:
   '<br><form id="contx">'+
   '<input style="display:none" value="'+idproduto+'" id="ID_PRODUTO" name="ID_PRODUTO"  class="swal2-input"> <input placeholder="Nome adicional" id="ADICIONAL" name="ADICIONAL"  class="swal2-input">' +
   '<input placeholder="Preço" id="PRECO" name="PRECO" class="swal2-input">'
   + '</form>'+'<button onclick="mais_adicionais()" type="button"  class="waves-effect waves-light  btn bg-red waves-effect">  <i class="large material-icons">add</i></button>',
   focusConfirm: false,
   preConfirm: () => {
            
            }
   }).then(function(){
            

   })
   }

   function mais_adicionais(){
      
   //alert(document.getElementById('ADICIONAL').value)

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
      prefix: "",
      decimal: ".",
      thousands: ","
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
 
   document.getElementById('carregandoimg').style.display = 'block'
   document.getElementById('swal2-content').style.display = 'none'
   

         setTimeout(function (params) {
         //  alert(document.getElementById('myimage').src)

            document.getElementById('IMG').value = document.getElementById('myimage').src
            document.getElementById('swal2-content').style.display = 'block'
            document.getElementById('carregandoimg').style.display = 'none'


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


var data_dom;

async function  updateX(idproduto) {
//alert(idproduto)


await $.get("{{route('produtositem')}}/"+idproduto, function(data, status){ ///Busca o registro no servidor para editar
  

       data_dom = data
          
       }).then(function (params) {
        
       })



const frm = await Swal.fire({
    width: 800,
    closeOnClickOutside: false,
    allowOutsideClick: false,
    title: 'Cadastro de Produtos'+`  <div style="display:none" id="carregandoimg">    
                       <h1>Aguarder carregando imagem....</h1>
               </div>
                 `,
    html:

        `

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
                              
                              
   <form id="f1" action="{{route('produtosupdate')}}" method="POST">

   @csrf
   <div class="row clearfix">
      <input style="display:none" type="text" name="id" id="id" value="${data_dom.id}">
   <input style="display:none" type="text" name="ID_USER" id="ID_USER" value="${data_dom.ID_USER}">
    <input style="display:none" type="text" id="IMG" name="IMG" value='${data_dom.IMG}'>
    <div class="col-sm-6">
                              
                              <div class="form-group form-float">
                                       <div class="form-line">

                                       <label class="">Código no sistema</label>
                                          <input onblur="requisitaproduto()" id="CODIGO_SISTEMA" name="CODIGO_SISTEMA" type="text" class="form-control">
         
                                       </div>
                                 </div>
                              
                              </div>
                            
                            
                              <div class="col-sm-6">
                              
                              <div class="form-group form-float">
                                       <div class="form-line">

                                       <label class="">Nome do produto</label>
                                          <input value="${data_dom.NOME_PRODUTO}" id="NOME_PRODUTO" name="NOME_PRODUTO" type="text" class="form-control">
                                          
                                       </div>
                                 </div>
                              
                              </div>
                              
                              <div class="col-sm-6">
                              <div class="form-group form-float">
                                       <div class="form-line">
                                       <label  class="">Valor unitário</label>
                                          <input value="${data_dom.PRECO_UNIT}" id="PRECO_UNIT"  name="PRECO_UNIT" onfocus="masc(this)"  type="text" class="form-control">
                                       
                                       </div>
                                 </div>
                           </div>


                           <div class="col-sm-12">
                              <div class="form-group form-float">
                                 <div  class="btn-group bootstrap-select form-control show-tick"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="-- Please select --"><span class="filter-option pull-left">-- Please select --</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">-- Please select --</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">10</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">20</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">30</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">40</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">50</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="NOME_GRUPO" class="form-control show-tick" tabindex="-98">
                                       
                                       
                                          <option value="${data_dom.NOME_GRUPO}">${data_dom.NOME_GRUPO}</option>
                                          
                
   @foreach ($grupos as $grupo)
   <option value="{{$grupo->NOME_GRUPO}}">{{$grupo->NOME_GRUPO}}</option>
   @endforeach
                                       
                                       </select></div>
                                 </div>
                           </div>
                           
                           <div class="col-sm-12">
                              <div class="form-group form-float">
                                       <div class="form-line">
                                       <label  class="">Descrição produto</label>
                                          <textarea id="DESCR" name="DESCR"  type="text"      class="form-control">${data_dom.DESCR}</textarea>
                                       
                                       </div>
                                 </div>
                           </div>

                          


                           <div class="col-sm-6">
                              <div class="form-group form-float">
                                       <div class="form-line">
                                       <label  class="">CFOP</label>
                                          <input  value="${data_dom.CFOP}"  id="CFOP"  name="CFOP" type="text" class="form-control">
                                       
                                       </div>
                                 </div>
                           </div>

                           <div class="col-sm-6">
                              <div class="form-group form-float">
                                       <div class="form-line">
                                       <label  class="">CST</label>
                                          <input   value="${data_dom.CST}"  id="CST" name="CST"    type="text" class="form-control">
                                       
                                       </div>
                                 </div>
                           </div>

                           <div class="col-sm-6">
                              <div class="form-group form-float">
                                       <div class="form-line">
                                       <label  class="">NCM</label>
                                          <input   value="${data_dom.NCM}"  id="NCM" name="NCM"    type="text" class="form-control">
                                       
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
      
     

        Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite o nome do produto.</h3>',
            footer: ''
          })
   
   return 
   }

   if (!document.getElementById('DESCR').value) {
   

        Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite a desrcrição do produto.</h3>',
            footer: ''
          })
   
   return 
   }



   if (!document.getElementById('PRECO_UNIT').value) {
   

   Swal.fire({
        icon: 'error',
        title: '',
        html: '<h3>Digite o preço do produto.</h3>',
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
    url: "{{route('produtosupdate')}}",
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


var socket = io('https://servidorsocket3636.herokuapp.com/')

setTimeout(function(){ //Aguarda para criar a room 
	socket_createroom()
   alert('criado')
},3000)


async function socket_createroom(){
    socket.emit('createroom', {{ App\Http\Controllers\AppController::getlojacode($iduser)}} )
}

socket.on('receive',function(data){
  alert('recebe')
})

function requisitaproduto(){

   let getcodsistem = document.getElementById('CODIGO_SISTEMA').value
   let objx = {
   room:{{ App\Http\Controllers\AppController::getlojacode($iduser)}},
   codsis:getcodsistem,
   produtosjson:''
   }
   socket.emit('canalcomunica', objx)

}





</script>
@stop