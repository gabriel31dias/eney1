
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
		<form  method="POST" action="{{ route('register') }}">
			<fieldset>
				<legend><i class='fas fa-user icon-user'></i></legend>
                <label for="nome">Nome:</label>
                @csrf
				<input type="text" name="name"  placeholder="Ex: Lucas Gomes">
				<label for="email">E-mail:</label>
				<input type="email" name="email" placeholder="Ex: lucas@gmail.com">
				<label for="nomeEmpresa">Nome Da Empresa:</label>
				<input type="text" name="nome_estabelecimento" placeholder="Ex: InovaTTius Solutions">
				<label for="nome">CNPJ Da Empresa:</label>
				<input type="text" placeholder="Ex: 36.922.552/0001-02">
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
</body>

