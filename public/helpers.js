
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
      //  document.getElementById('ibge').value=(conteudo.ibge);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
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
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};









async function loadx(){


    var url = location.href ;
  
    if(url.match(/success/)){
        Swal.fire(
            'Muito bom!',
            'Operação realizada com sucesso',
            'success'
          )
    }
    

}

loadx()