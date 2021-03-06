<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link rel="stylesheet" href="../CSS/Cadastro.css">

</head>

<body>
	<div class="wrapper fadeInDown">
		<!--Div da animação -->
		<?php
		if (isset($_SESSION['status_cadastro'])) :
		?>
			<div class="border border-dark w-50 p-3 col-md-4 offset-md-4 progress-bar progress-bar-striped bg-success">
				<p class="text-center"><strong>cadastro efetuado</strong></p>
				<p class="text-center"><strong>faça o login informando seu cpf e senha <a href="login.php">aqui</a></strong></p>
			</div>
		<?php
		endif;
		unset($_SESSION['status_cadastro'])
		?>
		<?php
		if (isset($_SESSION['email_existe'])) :
		?>
			<div class="border border-dark w-50 p-3 col-md-5 offset-md-4 progress-bar progress-bar-striped bg-danger">
				<p class="text-center"><strong>O email cadastrado está em uso, por favor insira outro.</strong></p>
			</div>
		<?php
		endif;
		unset($_SESSION['email_existe'])
		?>
		<?php
		if (isset($_SESSION['cpf_existe'])) :
		?>
			<div class="border border-dark w-50 p-3 col-md-5 offset-md-4 progress-bar progress-bar-striped bg-danger">
				<p class="text-center"><strong>O cpf cadastrado está em uso, por favor insira outro.</strong></p>
			</div>
		<?php
		endif;
		unset($_SESSION['cpf_existe'])
		?>
		<?php
		if (isset($_SESSION['campoVazio'])) :
		?>
			<div class="border border-dark w-50 p-3 col-md-5 offset-md-4 progress-bar progress-bar-striped bg-danger">
				<p class="text-center"><strong>Preencha todos os campos</strong></p>
			</div>
		<?php
		endif;
		unset($_SESSION['campoVazio']);
		?>

		<div class="container fadeInDown">

			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<header class="card-header">
							<a href="login.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
							<h4 class="card-title mt-2">Cadastre-se</h4>
						</header>
						<article class="card-body">
							<form action="cad.php" method="POST">
								<div class="form-row">
									<div class="col form-group">
										<label>Nome </label>
										<input type="text" class="form-control" placeholder="Seu nome" name="nome" onblur="checar(this,'nome')">
										<small id="nome"></small>
									</div> <!-- form-group end.// -->
									<div class="col form-group">
										<label>Telefone</label>
										<input type="number" class="form-control" placeholder="Apenas numeros" name="telefone" onblur="checar(this,'telefone')">
										<small id="telefone"></small>
									</div> <!-- form-group end.// -->
								</div> <!-- form-row end.// -->
								<div class="form-group">
									<label>Email </label>
									<input type="email" class="form-control" placeholder="example@hotmail.com" name="email" onblur="checar(this,'email')">
									<small id="email"></small>
									<small class="form-text text-muted">Nunca iremos compartilhar seu email com ninguém</small>
								</div> <!-- form-group end.// -->
								<div class="form-row">
									<div class="col form-group">
										<label>CPF </label>
										<input type="Number" class="form-control" placeholder="Apenas numeros" name="cpf" onblur="checar(this,'cpf')">
										<small id="cpf"></small>
									</div> <!-- form-group end.// -->
									<div class="col form-group">
										<label>RG</label>
										<input type="number" class="form-control" placeholder="Apenas numeros" name="rg" onblur="checar(this,'rg')">
										<small id="rg"></small>
									</div> <!-- form-group end.// -->
								</div>

								<div class="form-group">
									<label>CEP</label>
									<d id="cep">
										<input type="number" class="form-control" placeholder="CEP" name="cep"><span onclick="busca()"></span>
									</d>
									<small id="ceperro"></small>
								</div>
								<!-- form-row end.// -->
								<div class="form-group">
									<label>Endereço </label>
									<input type="text" class="form-control" placeholder="Endereço e numero" name="endereco" disabled onblur="checar(this,'endereco')">
									<small id="endereco"></small>
								</div> <!-- form-group end.// -->


								<div class="form-row">
									<div class="form-group col-md-6">
										<label>Cidade</label>
										<input type="text" class="form-control" name="cidade" disabled onblur="checar(this,'cidade')">
										<small id="cidade"></small>
									</div> <!-- form-group end.// -->
									<div class="form-group col-md-6">
										<label>Estado</label>
										<input type="text" class="form-control" name="estado" maxlength="2" disabled onblur="checar(this,'estado')">
										<small id="estado"></small>
									</div> <!-- form-group end.// -->
								</div> <!-- form-row.// -->
								<div class="form-group">
									<label>Senha</label>
									<input class="form-control" type="password" name="senha" onblur="checar(this,'senha')">
									<small id="senha"></small>
								</div> <!-- form-group end.// -->
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block"> Cadastrar </button>
								</div> <!-- form-group// -->
								<div class="form-group">
									<a href="../index.php"><button type="button" class="btn btn-primary btn-block"> Cancelar </button></a>
								</div> <!-- form-group// -->
							</form>
						</article> <!-- card-body end .// -->
						<div class="border-top card-body text-center">Já tem uma conta ?<a href="login.php">Log In</a></div>
					</div> <!-- card.// -->
				</div> <!-- col.//-->

			</div> <!-- row.//-->


		</div>
	</div>
	<!--Div da animação.//-->
	<!--container end.//-->
	<script src="../js/cadastro.js"></script>
</body>

</html>