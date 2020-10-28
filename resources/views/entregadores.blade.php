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
               Cadastro de Entregadores
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
                           <option value="Nome grupo">Nome grupo</option>
                          
                        </select>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <div class="form-line">
                        <input id="busca" type="text"  placeholder="Escreva a busca.." class="form-control" >
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
                        <th>Código sistema</th>
                        <th>Nome grupo</th>
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
}

      
    ///Evento keypress do documento
    $(document).on('keypress', function(e) {
     if (e.which == 13) {
         var getval_tiposearch = $('#tiposeach').val();
      //  alert(getval_tiposearch)
         let get_search = $('#busca').val();
        switch(getval_tiposearch){
           case 'Nome grupo':
            setSearch('{{ route('searchbynamegrupo') }}',get_search)
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

            columns: [
					{
						"data": "CODIGO_SISTEMA"
					},


					{
						"data": "NOME_GRUPO"


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
        $('#datatable-json').on('click', 'button', function(e) {
            e.preventDefault;
            var rows = table.row($(this).parents('tr')).data(); //Get Data Of The Selected Row
            console.log(rows)
        });
    }
});

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
						"data": "CODIGO_SISTEMA"
					},


					{
						"data": "NOME_GRUPO"


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
		title: 'Cadastro de Entregadores', 
		html: `<div class="col-sm-12">
                              <form id="f1"> 
                              <div class="form-group form-float">
                                     <div style="display:none;"  class="form-line">
                                       <label style="display:none;" class="">Codigo sistema</label>
                                         <input id="ID_USER" style="display:none" value="" name="ID_USER" type="text" class="form-control">
                            
                                     </div>
                                </div>

                                <div class="form-group form-float">
                                     <div class="form-line">
                                       <label class="">Nome Entregador</label>
                                         <input id="NOME_ENTREGADOR"  value="" name="NOME_ENTREGADOR" type="text" class="form-control">
                                     </div>
                                </div>

                                <div class="form-group form-float">
                                     <div class="form-line">
                                       <label class="">Whatsapp</label>
                                         <input id="WHATS" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);"  value="" name="WHATS" type="text" class="form-control">
                                     </div>
                                </div>

                         </form>
                                
                              
                 </div>


                        `,
		confirmButtonText: 'SALVAR GRUPO',
		showCancelButton: true,
		cancelButtonText: 'CANCELAR',
		focusConfirm: false
	}).then(function (params)
	{

      if (params.isDismissed) {
           location.href = "/entregadores"

           return
        }


		if (!document.getElementById('NOME_ENTREGADOR').value)
		{
			//dom_values_estate.descr_grupo = document.getElementById('DESCR_GRUPO').value

			Swal.fire(
			{
				icon: 'error',
				title: '',
				html: '<h3>Digite o nome do produto.</h3>',
				footer: ''
			})

			return
		}

		


		save_entregador()


	})


}



function save_entregador()
{

	var request;
	var $form = $('#f1');
	var serializedData = $form.serialize();

	request = $.ajax(
	{
		url: "{{route('createentregadores')}}",
		type: "post",
		data: serializedData
	});

	request.done(function (response, textStatus, jqXHR)
	{
      alert(JSON.stringify(response))
		Swal.fire(
			'',
			'<h3>Entregador cadastrado com sucesso !</h3>',
			'success'
		)
		consulta()
	});

	request.fail(function (jqXHR, textStatus, errorThrown)
	{
      alert(jqXHR)
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





function mask(o, f) {
  setTimeout(function() {
    var v = mphone(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function mphone(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
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
                                    <br>
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
                                  
<form id="f1" action="{{route('grupoupdate')}}" method="POST">

@csrf

<div class="col-sm-12">
                              
                              <div class="form-group form-float">
                                     <div class="form-line">
                                       <label class="">Codigo sistema</label>
                                         <input id="CODIGO_SISTEMA"   value="${data_dom.CODIGO_SISTEMA}"  name="CODIGO_SISTEMA" type="text" class="form-control">
                                        
                                     </div>
                                 </div>
                              
                             </div>

                             <input style="display:none" type="text" name="id" id="id" value="${data_dom.id}">



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

                          

                            <input  style="display:none"  type="text" id="IMGedit" name="IMG">
                       
                        
                        <input type="submit"></input>
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
         location.href = "/grupos"
       
       return
      }

   if (!document.getElementById('NOME_GRUPO').value) {
      
        Swal.fire({
             icon: 'error',
             title: '',
             html: '<h3>Digite o nome do GRUPO.</h3>',
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
    url: "{{route('grupoupdate')}}",
    type: "post",
    data: serializedData
});

request.done(function(response, textStatus, jqXHR) {
   Swal.fire(
    '',
    '<h3>Grupo atualizado com sucesso !</h3>',
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
     produtosjson:'requisitagrupo'
   }
   socket.emit('canalcomunica', objx)
    $(".swal2-container").show()

  },1000)

}




function onFileSelected(event) {
  /// alert('')
   var selectedFile = event.target.files[0];
   var reader = new FileReader();

   var imgtag = document.getElementById("myimage");
   imgtag.title = selectedFile.name;

   reader.onload = function(event) {
      imgtag.src = event.target.result;
   };

   reader.readAsDataURL(selectedFile);
   try {
      document.getElementById('dedo').style.display = 'none'

   } catch (e) {
   
   }
 
   document.getElementById('carregandoimg').style.display = 'block'
   document.getElementById('swal2-content').style.display = 'none'
   

         setTimeout(function (params) {
         //  alert(document.getElementById('myimage').src)
            document.getElementById('IMG').value = document.getElementById('myimage').src
           
            try {
               document.getElementById('IMGedit').value = document.getElementById('myimage').src
            
            } catch (e) {
            }
            document.getElementById('swal2-content').style.display = 'block'
            document.getElementById('carregandoimg').style.display = 'none'
         },2000)
         

   }
   



       
</script>
@stop