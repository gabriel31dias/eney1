@extends('layouts.base')
@section('content')
<script src="/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
   />
<script src="../binjs/helpersvers.js"></script>
<style>

.modal.in .modal-dialog {
    -webkit-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    width: 800px;
}

select {
    -webkit-appearance: button;
    -moz-appearance: button;
    -webkit-user-select: none;
    -moz-user-select: none;
    -webkit-padding-end: 20px;
    -moz-padding-end: 20px;
    -webkit-padding-start: 2px;
    -moz-padding-start: 2px;
    background-color: #96DDEA; /* Fallback color if gradients are not supported */
    background-image: url(../images/select-arrow.png), -webkit-linear-gradient(top,  #96DDEA,  #96DDEA); /* For Chrome and Safari */
    background-image: url(../images/select-arrow.png), -moz-linear-gradient(top, #E5E5E5, #F4F4F4); /* For old Firefox (3.6 to 15) */
    background-image: url(../images/select-arrow.png), -ms-linear-gradient(top, #E5E5E5, #F4F4F4); /* For pre-releases of Internet Explorer  10*/
    background-image: url(../images/select-arrow.png), -o-linear-gradient(top, #E5E5E5, #F4F4F4); /* For old Opera (11.1 to 12.0) */
    background-image: url(../images/select-arrow.png), linear-gradient(to bottom,  #96DDEA,  #96DDEA); /* Standard syntax; must be last */
    background-position: center right;
    background-repeat: no-repeat;
    border: 1px solid #AAA;
    border-radius: 0px;
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
    color: #555;
    font-size: inherit;
    margin: 0;
    overflow: hidden;
    padding-top: 2px;
    padding-bottom: 2px;
    text-overflow: ellipsis;
    white-space: nowrap;
  
}


</style>
<script src="../binjs/clientes.js"></script>
<script src="../helpers.js"></script>
<div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
         <div class="header">
            <h2 style="margin:10px 10px 10px 10px; " >
               Cadastro de clientes
            </h2>
            <a onclick="open_cad()" class="waves-effect waves-light btn btn-large  bg-light-blue"><i  style="margin-top:-6px" class="material-icons right">add_circle_outline</i> <span style="margin-right:5px;" >Incluir</span> </a>
            <a class="waves-effect waves-light btn bg-light-blue "><i  style="margin-top:-6px" class="material-icons right">autorenew</i> <span style="margin-right:5px;" >Alterar</span> </a>
            <a class="waves-effect waves-light btn bg-light-blue "><i  style="margin-top:-6px" class="material-icons right">history
            </i> <span style="margin-right:5px;" >Excluir</span> </a>
            <a class="waves-effect waves-light btn bg-light-blue"><i  style="margin-top:-6px" class="material-icons right">local_printshop
            </i> <span style="margin-right:5px;" >Imprimir</span> </a>
           
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
               <table  style=" margin:30px 40px 30px 30px;width:100% " id="example" class="display" >
                  <thead>
                     <tr>
                     <tr>
                        <th>id</th>
                        <th>N°</th>
                        <th>Descrição</th>
                        <th>Entrada</th>
                        <th>Categoria</th>
                        <th>Status</th>
                        
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

</section>


<!-- Modal Dialogs ====================================================================================================================== -->
            <!-- Default Size -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Cadastro formas de pagamento</h4>
                        </div>
                        <div class="modal-body">
                        
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab" aria-expanded="true">HOME</a></li>
                                <li role="presentation" class=""><a href="#profile" data-toggle="tab" aria-expanded="false">PROFILE</a></li>
                                <li role="presentation" class=""><a href="#messages" data-toggle="tab" aria-expanded="false">MESSAGES</a></li>
                                <li role="presentation" class=""><a href="#settings" data-toggle="tab" aria-expanded="false">SETTINGS</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="home">


                            <div class="container">
                              <div class="row">
                                <div class="col-sm-3">
                                   <select>
                                       <option value="">Categoria forma</option>
                                         @foreach($codigos_nfe as $item)
                                        <option value="10">{{$item}}</option>
                                         @endforeach
                                     </select>
                                   </div>
                                   <div class="col-sm-3">
                                      <select>
                                      @foreach($categoria_formas as $item)
                                       <option value="10">{{$item}}</option>
                                       @endforeach
                                       </select>
                                   </div>

                                   
                                 </div>


                         <div style="padding-top:10px" class="row">
                                <div  class="col-sm-8">
                                   <div class="form-group form-float">
                                     <div class="form-line">
                                       <input v-model="nome" required="" name="NOME" id="NOME" type="text" class="form-control">
                                       <label class="form-label "><label class="obrigatorio ">*</label>Descrição Forma</label>
                                     </div>
                                    </div>
                                </div>

                               

        <!--fIM ROW--> </div> 


         
        <div  class="row">
                                <div  class="col-sm-4">
                                   <div class="form-group form-float">
                                     <div class="form-line">
                                       <input v-model="nome" required="" name="NOME" id="NOME" type="text" class="form-control">
                                       <label class="form-label "><label class="obrigatorio ">*</label>Descrição TEF</label>
                                     </div>
                                    </div>
                                </div>

                                <div  class="col-sm-2">
                                   <div class="form-group form-float">
                                     <div class="form-line">
                                       <input v-model="nome" required="" name="NOME" id="NOME" type="text" class="form-control">
                                       <label class="form-label "><label class="obrigatorio ">*</label>Juro ao mês </label>
                                     </div>
                                    </div>
                                </div>

        <!--fIM ROW--> </div>



     


                                <input type="checkbox" id="md_checkbox_1" class="chk-col-red" checked />
                                <label for="md_checkbox_1">Utilizar esta forma para DAV-OS</label>
                                <br>
                                 
                                <input type="checkbox" id="md_checkbox_2" class="chk-col-red" checked />
                                <label for="md_checkbox_2">Utilizar esta forma como entrada de parcelas</label>
                                  <br>
                                 
                                <input type="checkbox" id="md_checkbox_3" class="chk-col-red" checked />
                                <label for="md_checkbox_3">Imprimir Relatório Não Fiscal</label>
                                <br>
                                <input type="checkbox" id="md_checkbox_4" class="chk-col-red" checked />
                                <label for="md_checkbox_4">Utilizar esta forma para Devolução ao cliente</label>
                                <br>
                                <input type="checkbox" id="md_checkbox_6" class="chk-col-red" checked />
                                <label style="margin-right:10px;" for="md_checkbox_6">Gerar Boleto</label>
                                <input type="checkbox" id="md_checkbox_7" class="chk-col-red" checked />
                                <label for="md_checkbox_7">Gerar Permuta</label>

                            </div>


                           

                           

                            
                            </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <b>Profile Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages">
                                    <b>Message Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings">
                                    <b>Settings Content</b>
                                    <p>
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </div>
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>




<script>
   ///vue vmodel forms 



   $('#save').click(function(){
            
    alert('enviado')
      $('#f1').submit();


   })
   
   
   function setSearch(rota,parametro){
       
     $.ajax({
         url: rota +'/'+ parametro,
         type: 'GET',
         success: function(data) {
             var table = $('#example').DataTable({
                 "language": {
                     "lengthMenu": "Mostrar _MENU_ cadastros por pagina",
                     "zeroRecords": "Nenhum registro foi encontrado",
                     "info": "Showing page _PAGE_ of _PAGES_",
                     "infoEmpty": "Nenhum registro foi encontrado",
                     "infoFiltered": "(filtered from _MAX_ total records)",
                     "search": "Consulta: "
                 },
                 data: data,
                 destroy: true,
    
                 columns: [{
                         "data": "id"
                     },
                     {
                         "data": "NOME"
                     },
                     {
                         "data": "RESIDENCIAL"
                     },
                     {
                         "data": "CELULAR"
                     },
                     {
                         "data": "NUMERO"
                     },
    
                     {
                         "data": "ENDERECO"
                     },
                     {
                         "data": "BAIRRO"
                     },
                     {
                         "data": "CIDADE"
                     }
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


   //Mascaras
   $('#RESIDENCIAL').inputmask({"mask": "(999) 9999-9999"}); //specifying options
   $('#CELULAR').inputmask({"mask": "(999) 99999-9999"}); //specifying options
   $('#FAX').inputmask({"mask": "(999) 9999-9999"}); //specifying options
   $('#RECADO').inputmask({"mask": "(999) 9999-9999"}); //specifying options
   $('#COMERCIAL').inputmask({"mask": "(999) 99999-9999"}); //specifying options
   $('#CONTATO').inputmask({"mask": "(999) 99999-9999"}); //specifying options
   
   
    ///Evento de click no botao next
    $('#next').click(function(){
      $("#save").css("visibility", "visible")
    })
   
    ///Evento keypress do documento
    $(document).on('keypress', function(e) {
     if (e.which == 13) {
         var getval_tiposearch = $('#tiposeach').val();
         let get_search = $('#busca').val();
        
        switch(getval_tiposearch){
           case 'Nome':
            setSearch('{{ route('search_nome_cliente') }}',get_search)
           break;
           case 'Razão social':
             setSearch('{{ route('search_razao_cliente') }}',get_search)
           break;
           case 'Busca Versatil':
             setSearch('{{ route('search_razao_cliente') }}',get_search)
           break;
           case 'Código':
            setSearch('{{ route('search_id_cliente') }}',get_search)
           break;
           case 'Cpf/Cnpj':
            setSearch('{{ route('search_cpf_cnpj_like') }}',get_search)
           break;
           case 'Cidade':
            setSearch('{{ route('search_cidade') }}',get_search)
           break;
           case 'Endereço':
            setSearch('{{ route('search_endereco') }}',get_search)
           break;
           case 'Telefone':
            setSearch('{{ route('search_telefone') }}',get_search)
           break;
         }
     }
    });
    
    
    
    function open_cad() {
     $('.modal').modal();
    }
    
    

    function search_endereco() {
    
    let get_search = $('#busca').val();
    $.ajax({
     url: `{{ route('search_endereco') }}/${get_search}`,
     type: 'GET',
     success: function(data) {
         var table = $('#example').DataTable({
             "language": {
                 "lengthMenu": "Mostrar _MENU_ cadastros por pagina",
                 "zeroRecords": "Nenhum registro foi encontrado",
                 "info": "Showing page _PAGE_ of _PAGES_",
                 "infoEmpty": "Nenhum registro foi encontrado",
                 "infoFiltered": "(filtered from _MAX_ total records)",
                 "search": "Consulta: "
             },
             data: data,
             destroy: true,
    
             columns: [{
                     "data": "id"
                 },
                 {
                     "data": "NOME"
                 },
                 {
                     "data": "RESIDENCIAL"
                 },
                 {
                     "data": "CELULAR"
                 },
                 {
                     "data": "NUMERO"
                 },
    
                 {
                     "data": "ENDERECO"
                 },
                 {
                     "data": "BAIRRO"
                 },
                 {
                     "data": "CIDADE"
                 }
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
    
    
    
    
    
    function search_telefone() {
    
    let get_search = $('#busca').val();
    
    $.ajax({
     url: `{{ route('search_telefone') }}/${get_search}`,
     type: 'GET',
     success: function(data) {
         var table = $('#example').DataTable({
             "language": {
                 "lengthMenu": "Mostrar _MENU_ cadastros por pagina",
                 "zeroRecords": "Nenhum registro foi encontrado",
                 "info": "Showing page _PAGE_ of _PAGES_",
                 "infoEmpty": "Nenhum registro foi encontrado",
                 "infoFiltered": "(filtered from _MAX_ total records)",
                 "search": "Consulta: "
             },
             data: data,
             destroy: true,
    
             columns: [{
                     "data": "id"
                 },
                 {
                     "data": "NOME"
                 },
                 {
                     "data": "RESIDENCIAL"
                 },
                 {
                     "data": "CELULAR"
                 },
                 {
                     "data": "NUMERO"
                 },
    
                 {
                     "data": "ENDERECO"
                 },
                 {
                     "data": "BAIRRO"
                 },
                 {
                     "data": "CIDADE"
                 }
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
    
    
    
    
   
   
   function limpa_formulário_cep() {
             //Limpa valores do formulário de cep.
             document.getElementById('ENDERECO').value=("");
             document.getElementById('BAIRRO').value=("");
             document.getElementById('CIDADE').value=("");
             document.getElementById('ESTADO').value=("");
            /// document.getElementById('ibge').value=("");
     }
   
     function meu_callback(conteudo) {
         if (!("erro" in conteudo)) {
             //Atualiza os campos com os valores.
             document.getElementById('ENDERECO').value=(conteudo.logradouro);
             document.getElementById('BAIRRO').value=(conteudo.bairro);
             document.getElementById('CIDADE').value=(conteudo.localidade);
             document.getElementById('ESTADO').value=(conteudo.uf);
             document.getElementById('ENDERECO').focus()
             document.getElementById('BAIRRO').focus()
             document.getElementById('CIDADE').focus()
             document.getElementById('ESTADO').focus()
             
             setTimeout(function(){
                document.getElementById('NUMEROR').focus()
                       
             },10)
   
   
   
           //  document.getElementById('ibge').value=(conteudo.ibge);
         } //end if.
         else {
             //CEP não Encontrado.
             limpa_formulário_cep();
             
   
             Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: 'CEP não encontrado.',
   })
         }
     }
         
     function pesquisacep(valor) {
   
         //Nova variável "cep" somente com dígitos.
         var cep = valor.replace(/\D/g, '');
   
         //Verifica se campo cep possui valor informado.
         if (cep != "") {
   
             //Expressão regular para validar o CEP.
             var validacep = /^[0-9]{8}$/;
   
             //Valida o formato do CEP.
             if(validacep.test(cep)) {
   
                 //Preenche os campos com "..." enquanto consulta webservice.
                 document.getElementById('ENDERECO').value="...";
                 document.getElementById('BAIRRO').value="...";
                 document.getElementById('CIDADE').value="...";
                 document.getElementById('ESTADO').value="...";
                // document.getElementById('ibge').value="...";
   
                 //Cria um elemento javascript.
                 var script = document.createElement('script');
   
                 //Sincroniza com o callback.
                 script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
   
                 //Insere script no documento e carrega o conteúdo.
                 document.body.appendChild(script);
   
             } //end if.
             else {
                 //cep é inválido.
                 limpa_formulário_cep();
               
   
                 Swal.fire({
   icon: 'error',
   title: 'Oops...',
   text: 'Formato de CEP inválido.',
   })
             }
         } //end if.
         else {
             //cep sem valor, limpa formulário.
             limpa_formulário_cep();
         }
     };
   
   
     function getFormData($form){
     var unindexed_array = $form.serializeArray();
     var indexed_array = {};
   
     $.map(unindexed_array, function(n, i){
         indexed_array[n['name']] = n['value'];
     });
   
     return indexed_array;
   }
    
   
   
   //Masked Input ============================================================================================================================
   var $demoMaskedInput = $('.demo-masked-input');
     $demoMaskedInput.find('.phone-number').inputmask('+99 (999) 999-99-99', { placeholder: '+__ (___) ___-__-__' });
   
       
</script>
@stop