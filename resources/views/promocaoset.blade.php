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
                 
                    
                    <tr  onclick="verifi_api('{{ $item->id }}')" >
                        <td>{{ $item->id }}</td>
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

let cash_id = null
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



const swalx = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-primary'
  },
  buttonsStyling: false
})


var cash_result = null
async function verifi_api(id) {
cash_id = id

  let getresult = null
  $.get(`{{route('verificapromocaox')}}/${id}`, function(data){

          getresult = data
          cash_result = data
          console.log(data)
          
          
          if(data == true){

            showset(id)

          }else{
             // 
             showset2(id)
            
          } 

         


   }).done(function(data){
        
     
     


   })
   .fail(function(data){

     


    })

   
   
   
}
   var getprice = ''
   var  getini = ''
   var getfini = ''
async function showset(id){
//Ja tem promocao
  cash_id = id
  
  $.get("{{route('produtositem')}}/"+`${id}`, function(data){

 
   getprice = data.PRECO_PROMOCAO
   getini = data.DATA_INICIO_PROMOCAO
   getfini = data.DATA_FINAL_PROMOCAO

   setInterval(function(){
        document.getElementById('preco').value = getprice
        document.getElementById('lbini').value = getini
        document.getElementById('lbfin').value = getfini

   },1000)
  
        
  }).done(function(data){
  
     

  })

 await swalWithBootstrapButtons.fire({
  title: '',
  cancelButtonText: "Cancelar Promoção",
  showCancelButton: true,
  confirmButtonText: 'Manter promoção',
  closeOnClickOutside: false,
    allowOutsideClick: false,
  width:500,
  html:
    `
                     <div class="form-line space">
                     <h3 class="lbl">Digite o preço promocional</h3>
                        <input id="preco" value="${getprice}" onfocus="masc(this)" type="text" placeholder="Digite o preço promocional" class="form-control">
                        
                     </div>
                  ` +
                  `
                  
                  <div class="form-line space">
                  <div class="row">
                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                   
                        <input id="lbini" value="${getfini}" style="backgroud-color:#96DDEA;padding:10px" /> 
                   
                    </div>
                    <div class="col-xs-12 col-lg-6 col-md-6 col-sm-6">
                        <input id="lbfin" value="${getfini}"   style="backgroud-color:#96DDEA;padding:10px" />
                        
                    </div>
                  </div>

                   
                   
                   

                  
                </div>
                  `
    ,
  focusConfirm: false,
  preConfirm: () => {
   
  }
}).then(function (params){

   
   if (params.isDismissed) {
        
        cancelpromocao(cash_id)
     //  alert(cash_id)
      

        return
      }


})

if (document.getElementById('preco').value) {
  let preco = document.getElementById('preco').value
  let inicio = document.getElementById('DATA_INICIO_PROMOCAO').value
  let final = document.getElementById('DATA_FINAL_PROMOCAO').value

    $.get( `{{route("updatepromocoesx")}}/${id}/${preco}/${inicio}/${final}`   ,(data) => {

     

    }).fail(function(data) {
  
//  alert('woops'); // or whatever
    console.log(data)
    });
  
}
   
}

async function cancelpromocao(id) {

   
     $.get('{{route("cancelpromocao")}}/'+id,(data)=>{

     //   alert(id)
        
         console.log(data)
     }).done(function(){
      Swal.fire(
          'Promoção cancelada!',
          '',
          'success'
           )

     })
     .fail(function(){
      Swal.fire(
          'Um erro ocorreu, tente novamente.',
          '',
          'error'
           )

     })
   
}


function masc(val) {
  
   $(val).maskMoney({
      prefix: "",
      decimal: ".",
      thousands: ","
   });
   }


async function showset2(id){
//Ja tem promocao

 await swalx.fire({
  title: '',
  confirmButtonText: 'Salvar promoção',
  width:500,
  closeOnClickOutside: false,
    allowOutsideClick: false,
    cancelButtonText: "Cancelar",
  showCancelButton: true,
  html:
    `
                     <div class="form-line space">
                     <h3 class="lbl">Digite o preço promocional</h3>
                        <input id="preco" onfocus="masc(this)" type="text" placeholder="Digite o preço promocional" class="form-control">
                        
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
}).then(function (params){

   
   if (params.isDismissed) {
        
     
      

        return
      }

   
   if(!document.getElementById('preco').value || document.getElementById('preco').value == '00.00' ){
       
      Swal.fire(
     'Digite um preco promocional',
     '',
     'error'
       )
       
       return
   }

   if (params.isDismissed) {
         
         cancelpromocao()
      
      }


})

if (document.getElementById('preco').value) {
  let preco = document.getElementById('preco').value
  let inicio = document.getElementById('DATA_INICIO_PROMOCAO').value
  let final = document.getElementById('DATA_FINAL_PROMOCAO').value

    $.get( `{{route("updatepromocoesx")}}/${id}/${preco}/${inicio}/${final}`   ,(data) => {

     

    }).fail(function(data) {
      Swal.fire(
          'Um erro ocorreu tente novamente.',
          '',
          'error'
           )
    
    console.log(data)
    })
    .done(function(){

      Swal.fire(
          'Promoção salva !',
          '',
          'success'
           )
    })

  
}
   
}


$('.tab tr').click(function() {
      $(this).toggleClass("clicked");
});


async function loading(params) {

   let timerInterval
Swal.fire({
  title: 'Auto close alert!',
  html: 'I will close in <b></b> milliseconds.',
  timer: 3000,
  timerProgressBar: true,
  willOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
   
}



    




</script>
@stop