@extends('layouts.baseapp')
@section('content')
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

<style>
    .colorbtn{
  background-color: #ba68c8;
    }
    </style>

    <div   class="row">
    <div  class="slider">
    <ul class="slides">
      <li>
        <img src="https://institucional.jequiti.com.br/img/blog/2019/05/15/eu-glam-68_139.jpg"> <!-- random image -->
        <div class="caption center-align">
          <!-- <h3>This is our big Tagline!</h3>-->
         <!-- <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>-->
        </div>
      </li>
      <li>
        <img src="https://i.pinimg.com/originals/67/2c/a2/672ca2f92cec918cfce07be522164394.jpg"> <!-- random image -->
        <div class="caption left-align">
           <!-- <h3>This is our big Tagline!</h3>-->
         <!-- <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>-->
        </div>
      </li>
      <li>
        <img src="https://avonfolheto.com/Avon-Folheto-Moda-Casa-15-2018/paginas/000.jpg"> <!-- random image -->
        <div class="caption right-align">
            <!-- <h3>This is our big Tagline!</h3>-->
         <!-- <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>-->
        </div>
      </li>
      <li>
        <img src="https://http2.mlstatic.com/kit-perfumes-lancamentos-hinode-unissex-D_NQ_NP_928749-MLB29606369170_032019-F.jpg"> <!-- random image -->
        <div class="caption center-align">
            <!-- <h3>This is our big Tagline!</h3>-->
         <!-- <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>-->
        </div>
      </li>
    </ul>
   
  </div>
   <br>
   <div style="color:white"  class="row blue">
   <div class="row">
    <div class="col s3">
    <i style="height: 100%;margin:10px" class="large material-icons  purple darken-1">directions_car</i>

   </div>

   <div style="margin-right:15px;" class="col s8">
    <h1 style="color:#8e24aa !important;font-size:30px;margin-top:20px;">Entrega gratis</h1>
    <h1 style="color:white;font-size:18px;margin-top:15px">Consulte se seu localização esta inclusa</h1>

   </div>
   </div>

   </div>
    </div>

  
        <div class="row">


            @foreach ($getlojas as $item)

            <div class="col s12 m4">
                <div class="card waves-effect waves-block waves-light">
                  <div onclick="clickimageloja({{$item->id}})" class="card-image">
                  <img   style="height:250px" src="{{ $item->imagem_loja ?? 'https://bleez.com.br/wp-content/uploads/2016/10/semelhan%C3%A7as-diferen%C3%A7as-loja-f%C3%ADsica-loja-virtual-1024x1024.jpg' }}"></img>
                 
                   
                    <a href="/loja/productsgrid/{{$item->id}}" class="btn-floating halfway-fab waves-effect waves-light colorbtn"><i class="material-icons">add_shopping_cart</i></a>
                  </div>
                  <div class="card-content">
                   <span class="card-title">{{$item->nome_estabelecimento}}</span>
                    <p></p>
                  </div>
                </div>
              </div>
              
          
              
                
            @endforeach


<script>

    
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });

  // Or with jQuery

        

var getJSON = function(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.responseType = 'json';
  xhr.onload = function() {
    var status = xhr.status;
    if (status === 200) {
      callback(null, xhr.response);
    } else {
      callback(status, xhr.response);
    }
  };
  xhr.send();
};


$(document).ready(function(){
  $('.button-collapse').sideNav({
	  
	 
      menuWidth: 500, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
  // START OPEN
 // $('.button-collapse').sideNav('show');
});






  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
      direction: 'left',
      hoverEnabled: false
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.slider').slider({ 
        full_width: true,
        height : 250, // default - height : 400
        interval: 8000 // default - interval: 6000
    });
  });



  Swal.fire({
    title: '<strong>Ola, Bem vindo!</strong>',
    icon: 'info',
    html:
      'Se você não encontrar uma loja e queira ela no nosso app, entre em contato com nosso suporte <3' ,
    showCloseButton: true,
    showCancelButton: true,
    focusConfirm: false,
    confirmButtonText:
      '<i class="fa fa-thumbs-up"></i> Great!',
    confirmButtonAriaLabel: 'Thumbs up, great!',
    cancelButtonText:
      '<i class="fa fa-thumbs-down"></i>',
    cancelButtonAriaLabel: 'Thumbs down'
  })

 /////Cart drop funcions--------------------------------------------------------

 let vendaObj = {}
 let array_options = []
 let quantidade = 0
 let total_price = 0.0


 async function searchfn(){
 
  const { value: text } = await Swal.fire({
    title: 'Digite a loja que queira buscar',
    input: 'text',
    inputPlaceholder: 'Escreva aqui..',
    inputAttributes: {
      maxlength: 10,
      autocapitalize: 'off',
      autocorrect: 'off'
    }
  })
  
  if (text) {
    Swal.fire(`Carregando: ${text}`)
    location.href = "/loja/lojasearch/" + text
  }
 } 

////Função para mostrar loadind e finalizar
 const showLoading = function() {
    
  let timerInterval
  Swal.fire({
    title: 'Aguarde..',
    html: '',
    timer: 500,
    timerProgressBar: true,
    onBeforeOpen: () => {
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
      Swal.fire(
        'Muito Bom!',
        'Compra finalizada com sucesso',
        'success'
      )
    }
  })
}
//showLoading();




////Seta opções para o produto em questão
 async function setOpt(tituloopt, values){
    const { value: fruit } = await Swal.fire({
      title: tituloopt,
      input: 'select',
      inputOptions: values,
      inputPlaceholder: 'Select a fruit',
      showCancelButton: true,
      inputValidator: (value) => {
        return new Promise((resolve) => {
          if (value ) {
            resolve()

            array_options.push(values[value])
            
          } else {
            resolve('Selecione um opção para o produto')
          }
        })
      }
    })
    
    if (fruit) {
      Swal.fire(`You selected: ${fruit}`)
    }

  }


  async function  loopteste(){

    for(let i =0; i < 3 ;i++){
      await  setOpt('teste',['black','red'])
    }
   
  }
  
  


async function qtd_set(){
  const { value: password } = await Swal.fire({
    title: 'Digite a quantidade',
    input: 'text',
    inputPlaceholder: 'Digite quantas unidades deste produto você deseja',
    inputAttributes: {
      maxlength: 10,
      autocapitalize: 'off',
      autocorrect: 'off'
    }
  })
  
  if (password) {
    Swal.fire(`Entered password: ${password}`)
  }

}

  
  
///Adcionar ao carrinho
async function add_cart(idproduto,preco){
  getJSON('http://127.0.0.1:8012/products/getoptions/'+idproduto,
  async function(err, data) {
    if (err !== null) {
      console.log('erro na rota do carrinho')
    } else {
     
     let count_get = data.length
      console.log('log valores options count'+count_get)
      
      for(let i = 0;  i < count_get  ;i++){
        await  setOpt(data[i].nomeOpt,eval(data[i].textOptions))
        console.log(data[i].nomeOpt)
        await qtd_set()
        
      }

    }
  });
}

//oque preciso fazer agora setar as respostar e o total price

async function save_drop(preco){
  vendaObj = {
    options:array_options,
    countitems:quantidade,
    price_item:preco,
    price_total:total_price,
  } 
  
}

</script>











@stop