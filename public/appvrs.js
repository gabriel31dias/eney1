
	const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
           
     var setgrupo = 	function(grupo)
              {
                  $geturl = '{{route('get_loja')}}'
                  $getlojacode = '/{{$lojacod}}'
                  alert($getlojacode+grupo)
              
               $('html').html('');
                $('body').load($geturl+$getlojacode+grupo);
              }
                   
 var open_product =	async function(nomeproduto,preco,descr,img){
      
       const { value: formValues } = await swalWithBootstrapButtons.fire({
        title: '<h1>'+ nomeproduto+'</h1>' ,
        width:500,showConfirmButton: false,
      
      
        confirmButtonText: 'Adicionar ao carrinho',
        html:
          `  <br>
              <br><h3>Preço: ${preco}</h3> ` +
          `<h3> ${descr}</h3>`+
          ` <img style="height:100%;width:100%" src="${img}" >
          <br>
          <br>
      
          <button type="button" class="btn btn-primary">  <i style="margin-top:3px;"  class="large material-icons">local_mall</i><p style="margin-top:5px;">ADICIONAIS</p></button>
          <button type="button" onclick="closeswal()" class="btn btn-danger">  <i style="margin-top:3px;"  class="large material-icons">close</i><p style="margin-top:5px;">FECHAR</p></button>
          <button type="button" class="btn btn-success">  <i style="margin-top:3px;"  class="large material-icons">shopping_cart</i><p style="margin-top:5px;">ADICIONAR AO CARRINHO</p></button>`,
      
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
      
      
     var  closeswal = function(){
          swal.close()
          $( '.mfp-close' ).click();
      
      
       }
      