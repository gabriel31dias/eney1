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
               Cadastro de opçoes
            </h2>
            <a onclick="cadOpcoes()" class="waves-effect waves-light btn btn-large  bg-light-blue"><i  style="margin-top:-6px" class="material-icons right">add_circle_outline</i> <span style="margin-right:5px;" >Incluir</span> </a>
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
                        
                        <th>Código</th>
                        <th>Descrição</th>
                        

                        
                     </tr>
                  </thead>
                  <tbody>
                    @foreach ($opcoes as $item)
                 
                    
                    <tr>

                        <td>{{$item->id}}</td>
                        <td>{{$item->DESCROPT}}</td>
                        <td>{{$item->CAMPOSOPCOES}}</td>

                    </tr>
                        
                    @endforeach

                 

                   
                </tbody>
                
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
    
async function cadOpcoes() {
   
new Vue({
  el: '#opts',
  data: {
    items: [],
  },
  methods: {
    addItem() {
      this.items.push({
        value: ''
      });
    }
  }
 })
    
    const frm = await Swal.fire({
      width: 800,
      closeOnClickOutside: false,
      allowOutsideClick: false,
      title:'Cadastrando opção' ,
      html:  `
           

      <div class="col-sm-6">
                              <div class="form-group form-float">
                                       <div class="form-line">
                                          <input  type="text"  id="descrOPT" name="DESCROPT"  class="form-control"  />

                                       </div>
                                 </div>
                           </div>
                           @verbatim

                           <div id="opts">
                                <input  v-for="item in items" v-model="item.value" id="{{item}}">
                                <button @click="addItem">add</button> {{items}}
                           </div>
                           @endverbatim
                           

                           <div class="col-sm-6">
                              <div class="form-group form-float">
                                       <div class="form-line">
                                       <input  type="text"  id="CAMPOSOPCOES" name="CAMPOSOPCOES"  class="form-control" />
                                         
                                       </div>
                                 </div>
                           </div>

      
                           `,

      confirmButtonText: 'SALVAR PRODUTO',
      showCancelButton: true,
      cancelButtonText: 'CANCELAR',
      focusConfirm: false,
      
   })
    
}









</script>
@stop