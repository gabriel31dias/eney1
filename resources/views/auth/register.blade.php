
</div>

<!-- MetaTags -->
<meta charset="utf-8">
<meta name="author" content="Versátil Informática" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="descreption" content="" />
<meta name="keywords" content="" />
<!-- Title -->
<title>Versátil Delivery - Sua refeição a um click</title>
<!-- Links -->
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="assets/css/site.css">

<body style=" zoom: 80%;">
	<div id="container">
		<form id="formregister" method="POST" onsubmit="return isValidForm()" action="{{ route('register') }}">
			<fieldset>
				<legend><i class='fas fa-user icon-user'></i></legend>
                <label for="nome">Nome:</label>
                @csrf
				<input type="text" name="name" id="name"  placeholder="Ex: Lucas Gomes">
				<label for="email">E-mail:</label>
				<input type="email" name="email" id="email" placeholder="Ex: lucas@gmail.com">
				<label for="nomeEmpresa">Nome Da Empresa:</label>
				<input type="text" id="nome_estabelecimento" name="nome_estabelecimento" placeholder="Ex: InovaTTius Solutions">
				<label for="cnpj">CNPJ Da Empresa:</label>
				<input type="text" id="cnpj" name="cnpj" placeholder="Ex: 36.922.552/0001-02">
				<label for="nome">Senha:</label>
				<input type="password" name="password" placeholder="Informe uma senha">
				<label for="nome">Confirme sua senha:</label>
				<input type="password" name="password_confirmation" placeholder="Confirme sua senha">
				<input type="submit" name="btnEnviar" value="Cadastrar">
				<picture>
					<a href="https://versatilsoftwares.com.br" target="_blank"><img src="assets/img/logoVersátil.png" alt="Logo Versátil Informática"><a>
				</picture>
			</fieldset>
		</form>
	</div>
	<script>

		let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
		let nomeempresa = document.getElementById("nome_estabelecimento").value;
		let cnpj = document.getElementById("cnpj").value;
		let password =  document.getElementById("password").value;
		let pass_vr = document.getElementById("password_confirmation").value;

		document.getElementById('formregister').onsubmit = function() {

              return isValidForm();
        };

		function isValidForm(){

			return false
		}


	</script>
</body>

