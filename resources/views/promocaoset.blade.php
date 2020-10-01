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
       tr.clicked {
      background-color: #abc;
}

.space{
    padding:10px;
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

async function showset(id){
const { value: formValues } = await Swal.fire({
  title: '',
  width:500,
  html:
    `
                     <div class="form-line space">
                     <labe>Digite o preço promocional</label>
                        <input id="busca" type="text" placeholder="Digite o preço promocional" class="form-control">
                        
                     </div>
                  ` +
                  `
                   <labe>Quantos tempo de disponibilidade</label>
                    <select name="select"  class="form-control">
                       <option value="1">1 dia</option> 
                       <option value="2" selected>2 dias</option>
                       <option value="3">3 dias</option>
                        <option value="n">Indeterminado</option>
                    </select>
                  `
    ,
  focusConfirm: false,
  preConfirm: () => {
    return [
      document.getElementById('swal-input1').value,
      document.getElementById('swal-input2').value
    ]
  }
})

if (formValues) {
  Swal.fire(JSON.stringify(formValues))
}
   
}


$('.tab tr').click(function() {
      $(this).toggleClass("clicked");
});



    




</script>
@stop