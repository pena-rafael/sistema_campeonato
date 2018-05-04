<html>
	<head>
		<meta charset="UTF-8" />
		<title>Sistema para Campeonatos</title>
	<head>
	<body>
		<?php 
		if(!isset($_SESSION["logado"])){
		?>
		<nav>
			<a href="index.php">Início</a>	|	
			<a href="cadastro.php">Cadastrar</a>	|	
			<a href="login.php">Login</a>
		</nav>
		<content>
		<?php 
		} else{
		?>