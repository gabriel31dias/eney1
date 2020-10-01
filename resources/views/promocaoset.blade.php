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
       tr:hover{
        background-color: #abc;

       }
       tr.clicked {
      background-color: #abc;
}

.lbl{
    font-size: 20px;

}

.space{
    padding:2px;
}
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
               Cadastro de promoções
            </h2>
           
            <div class="row clearfix">
               <div class="col-sm-3">
                  <div class="form-group">
                     <div class="form-line">
                        <label style="margin-top:10px;"  for="cars">Filtro:</label>
                        <select name="tiposeach" id="tiposeach">
                           <option value="Nome produto">Nome produto</option>
                          
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
                        <th>Nome produto</th>
                        <th>Valor unitario</th>
                        
                     </tr>
                  </thead>

                  <tbody>
                    @foreach ($produtos as $item)
                 
                    
                    <tr  onclick="showset('{{ $item->CODIGO_SISTEMA }}')" >
                        <td>{{ $item->CODIGO_SISTEMA }}</td>
                        <td>{{ $item->NOME_PRODUTO }}</td>
                        <td>{{$item->PRECO_UNIT}}</td>
                       
                    </tr>
                        
                    @endforeach

                 

                   
                </tbody>

                  <tfoot>
                     <tr>
                     <tr>
                     </tr>
                  </tfoot>
               </table>

               {{ $produtos->links() }}

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
     
Swal.fire(
  'Selecione o produto que deseja adicionar um valor promocional',
  '',
  'info'
)

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

async function showset(id){
  
  
  


const { value: formValues } = await swalWithBootstrapButtons.fire({
  title: '',
  cancelButtonText: "Cancelar Promoção",
  showCancelButton: true,
  confirmButtonText: 'Salvar promoção',
  width:500,
  html:
    `
                     <div class="form-line space">
                     <h3 class="lbl">Digite o preço promocional</h3>
                        <input id="preco" type="text" placeholder="Digite o preço promocional" class="form-control">
                        
                     </div>
                  ` +
                  `
                  
                  <div class="form-line space">
                  <div class="row">
                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                        <h3 class="lbl">Inicio da promoção</h3>
                        <input type="datetime-local" id="DATA_INICIO_PROMOCAO"
                    name="DATA_INICIO_PROMOCAO" value="2018-06-12T19:30"
                   >
                    </div>
                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                        <h3 class="lbl">Final da promoção</h3>
                        <input type="datetime-local" id="DATA_FINAL_PROMOCAO"
                    name="DATA_FINAL_PROMOCAO" value="2018-06-12T19:30"
                    >
                    </div>
                  </div>

                   
                   
                   

                  
                </div>
                  `
    ,
  focusConfirm: false,
  preConfirm: () => {
   
  }
})

if (document.getElementById('preco').value) {
  let preco = document.getElementById('preco').value
  let inicio = document.getElementById('DATA_INICIO_PROMOCAO').value
  let final = document.getElementById('DATA_FINAL_PROMOCAO').value

    $.get( `{{route("updatepromocoesx")}}/${id}/${inicio}/${final}`   ,(data) => {

       alert(data)

    })
  
}
   
}


$('.tab tr').click(function() {
      $(this).toggleClass("clicked");
});



    




</script>
@stop