
   ///Evento de click no botao next
   $('#next').click(function(){
    $("#save").css("visibility", "visible")
  })

  ///Evento keypress do documento
  $(document).on('keypress', function(e) {
   if (e.which == 13) {
       var getval_tiposearch = $('#tiposeach').val();
      
      switch(getval_tiposearch){
  
         case 'Nome':
           search_nome()
         break;
         case 'Razão social':
           search_razao()
         break;
         case 'Busca Versatil':
           search_razao()
         break;
         case 'Código':
          search_codigo()
         break;
         case 'Cpf/Cnpj':
           search_cpf_cnpj()
         break;
         case 'Cidade':
           search_cidade()
         break;
         case 'Endereço':
           search_endereco()
         break;
         case 'Telefone':
           search_telefone()
         break;
       }
   }
  });
  
  
  

  function open_cad() {
   $('.modal').modal();
  }
  
  
  search_nome = function()  {
  
   let get_search = $('#busca').val();
  
  
   $.ajax({
       url: `{{ route('search_nome_cliente') }}/${get_search}`,
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
  
  
  
  
  function search_razao() {
  
  let get_search = $('#busca').val();
  
  
  $.ajax({
   url: `{{ route('search_razao_cliente') }}/${get_search}`,
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
  
  
  
  
  function search_codigo() {
  
  let get_search = $('#busca').val();
  
  $.ajax({
   url: `{{ route('search_id_cliente') }}/${get_search}`,
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
  
  
  
  
  function search_cpf_cnpj() {
  
  let get_search = $('#busca').val();
  
  $.ajax({
   url: `{{ route('search_cpf_cnpj_like') }}/${get_search}`,
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
  
  
  
  
  function search_cidade() {
  
  let get_search = $('#busca').val();
  
  $.ajax({
   url: `{{ route('search_cidade') }}/${get_search}`,
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
  
  