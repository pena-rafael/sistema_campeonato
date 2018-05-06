<html>
	<head>
		<meta charset="UTF-8" />
		<title>Sistema para Campeonatos</title>
	<head>
	<body>
		<nav>
			<?php
			if(!isset($_SESSION["usuario"])){
			?>
			<a href="index.php">Início</a>	|
			<a href="cadastroCliente.php">Cadastrar</a>	|
			<a href="login.php">Login</a>
			<?php
			} else{
			?>
			<a href="index.php">Início</a>	|
			<a href="cadastrar_campeonato.php">Cadastro Campeonato</a>	|
			<a href="ver_campeonatos.php">Ver Meus Campeonatos</a>	|
			<a href="faq.php">FAQ</a>	|
			<a href="sair.php">Sair</a>
		<?php } ?>
		</nav>
		<content>
