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
               Cadastro de Grupos
            </h2>
            <a onclick="cad_grupo()" class="waves-effect waves-light btn btn-large  bg-light-blue"><i  style="margin-top:-6px" class="material-icons right">add_circle_outline</i> <span style="margin-right:5px;" >Incluir</span> </a>
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
                        <th>Nome grupo</th>
                        <th>Descrição grupo</th>
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

var dom_values_estate = {
	nomegrupo: '',
	descr_grupo: '',
}

function consulta(params)
{
	$.ajax(
	{
		url: `{{ route('gruposlist') }}`,
		type: 'GET',
		success: function (data)
		{
			var table = $('#tb').DataTable(
			{
				"language":
				{
					"lengthMenu": "Mostrar _MENU_ cadastros por pagina",
					"zeroRecords": "Nenhum registro foi encontrado",
					"info": "Showing page _PAGE_ of _PAGES_",
					"infoEmpty": "Nenhum registro foi encontrado",
					"infoFiltered": "(filtered from _MAX_ total records)",
					"search": "Consulta: ",
					"oPaginate":
					{
						"sFirst": "Avançar", // This is the link to the first page
						"sPrevious": "Voltar", // This is the link to the previous page
						"sNext": "Avançar", // This is the link to the next page
						"sLast": "Voltar" // This is the link to the last page
					}
				},
				"pageLength": 20,
				data: data,
				destroy: true,
				'order': [
					[0, 'dec']
				],

				columns: [
					{
						"data": "id"
					},


					{
						"data": "NOME_GRUPO"


					},


					{
						"data": "DESCR_GRUPO"
					},

					{
						"data": "id",
						"name": "id",
						fnCreatedCell: function (nTd, sData, oData, iRow, iCol)
						{
							if (oData.id)
							{

								$(nTd).html("<a style='margin:10px' class='waves-effect waves-light btn btn-large  bg-light-blue'onclick=updateX("+oData.id+")><i class='material-icons'>edit</i></a>" + "<a style='margin:10px' class='waves-effect waves-light  btn bg-red waves-effect' href='{{route('deletegrupo')}}/" + oData.id + "'><i class='material-icons'>delete_forever</i></a>");
							}
							//] image

						}
					},

				],
				responsive: true,
			});
			$('#datatable-json').on('click', 'button', function (e)
			{
				e.preventDefault;
				var rows = table.row($(this).parents('tr')).data(); //Get Data Of The Selected Row
				console.log(rows)
			});
		}
	});
}


consulta() ///executa consulta

///vue vmodel forms 
async function cad_grupo()
{

	const frm = await Swal.fire(
	{
		width: 800,
		title: 'Cadastro de grupos de produtos'+`<div style="display:none" id="carregandoimg">  
        
        <br>
        <br>
          <center>

                       <h1>Aguarder carregando imagem....</h1>
         </center>
               </div>
                 `,
		html: `<br>
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
                                 <h3>Selecione a foto do grupo</h3>
                                 <em></em>
                              </div>
                              
                           </form>
                        <br>
                            <br>
                                  
<form id="f1" action="{{route('grupossave')}}" method="POST">

@csrf
<div class="r"ow clearfix">
<input style="display:none"  type="text" name="ID_USER" id="ID_USER" value="{{$iduser}}">
<div class="col-sm-12">
                              
                              <div class="form-group form-float">
                                     <div class="form-line">
                                       <label class="">Nome do grupo</label>
                                         <input id="CODIGO_SISTEMA"  value=""  name="CODIGO_SISTEMA" type="text" class="form-control">
                                        
                                     </div>
                                 </div>
                              
                             </div>
                            <div class="col-sm-12">
                           
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label class="">Nome do grupo</label>
                                        <input id="NOME_GRUPO" onkeyup="this.value = this.value.toUpperCase();"  value="${dom_values_estate.nomegrupo}"  name="NOME_GRUPO" type="text" class="form-control">
                                       
                                    </div>
                                </div>
                             
                            </div>
                            
                            
                            <input style="display:none" type="text" id="IMG" name="IMG">
                        <div class="col-sm-12">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label  class="">Descrição grupo</label>
                                        <textarea id="DESCR_GRUPO" value="${dom_values_estate.descr_grupo}"   name="DESCR_GRUPO"  type="text" class="form-control"></textarea>
                                     
                                    </div>
                                </div>
                        </div>
                        
            </form>
                        `,
		confirmButtonText: 'SALVAR GRUPO',
		showCancelButton: true,
		cancelButtonText: 'CANCELAR',
		focusConfirm: false
	}).then(function (params)
	{

		if (!document.getElementById('NOME_GRUPO').value)
		{
			dom_values_estate.descr_grupo = document.getElementById('DESCR_GRUPO').value

			Swal.fire(
			{
				icon: 'error',
				title: '',
				html: '<h3>Digite o nome do produto.</h3>',
				footer: ''
			})

			return
		}

		if (!document.getElementById('DESCR_GRUPO').value)
		{
			dom_values_estate.nomegrupo = document.getElementById('NOME_GRUPO').value
			Swal.fire(
			{
				icon: 'error',
				title: '',
				html: '<h3>Digite a descrição do grupo.</h3>',
				footer: ''
			})

			return

		}

		save_grupo()


	})


}



function save_grupo()
{

	var request;
	var $form = $('#f1');
	var serializedData = $form.serialize();

	request = $.ajax(
	{
		url: "{{route('grupossave')}}",
		type: "post",
		data: serializedData
	});

	request.done(function (response, textStatus, jqXHR)
	{
		Swal.fire(
			'',
			'<h3>Grupo cadastrado com sucesso !</h3>',
			'success'
		)
		consulta()
	});

	request.fail(function (jqXHR, textStatus, errorThrown)
	{
		Swal.fire(
			'',
			'<h3>O sistema encontrou um erro, verifique e tente novamente.</h3>',
			'error'
		)
	});

	request.always(function ()
	{
		// Reenable the inputs

	});

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






 
async function  updateX(idgrupos) {
//alert(idproduto)


await $.get("{{route('grupoitem')}}/"+idgrupos, function(data, status){ ///Busca o registro no servidor para editar
  
   
       data_dom = data
          
       }).then(function (params) {
        
       })



const frm = await Swal.fire({
    width: 800,
    closeOnClickOutside: false,
    allowOutsideClick: false,
    title: 'Cadastro de Grupo de produto'+`  <div style="display:none" id="carregandoimg">    
                       <h1>Aguarder carregando imagem....</h1>
               </div>
                 `,
    html:
        `
        <br>
   <form action="/" id="foto" id="f2" class="dropzone dz-clickable" method="post" enctype="multipart/form-data">
                              <div class="dz-message">
                                 <div class="align-center drag-icon-cph">
                                       
                                    <center>
                                       <img id="myimage" src="${data_dom.IMG}" height="200">

                                    <br>
                                       <input class="" onchange="onFileSelected(event)" type="file" name="fileToUpload" id="fileToUpload" size="1" />
                                       </center>
                                 </div>
                                 <h3>Selecione a foto do grupo</h3>
                                 <em></em>
                              </div>
                              
                           </form>
                        <br>
                            <br>
                                  
<form id="f1" action="{{route('grupossave')}}" method="POST">

@csrf

<div class="col-sm-12">
                              
                              <div class="form-group form-float">
                                     <div class="form-line">
                                       <label class="">Nome do grupo</label>
                                         <input id="CODIGO_SISTEMA"  value="${data_dom.CODIGO_SISTEMA}"  name="CODIGO_SISTEMA" type="text" class="form-control">
                                        
                                     </div>
                                 </div>
                              
                             </div>



<div class="r"ow clearfix">
<input style="display:none"  type="text" name="ID_USER" id="ID_USER" value="{{$iduser}}">
                            <div class="col-sm-12">
                              <input style="display:none" type="text" id="IMG" name="IMG" value='${data_dom.IMG}'>
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label class="">Nome do grupo</label>
                                        <input id="NOME_GRUPO"  value="${data_dom.NOME_GRUPO}"  name="NOME_GRUPO" type="text" class="form-control">
                                       
                                    </div>
                                </div>
                             
                            </div>

                          

                            <input style="display:none" type="text" id="IMG" name="IMG">
                        <div class="col-sm-12">
                             <div class="form-group form-float">
                                    <div class="form-line">
                                      <label  class="">Descrição grupo</label>
                                        <textarea id="DESCR_GRUPO"    name="DESCR_GRUPO"  type="text" class="form-control">${data_dom.DESCR_GRUPO}</textarea>
                                     
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


   



       
</script>
@stop