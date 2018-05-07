<html>
	<head>
		<meta charset="UTF-8" />
		<title>Champions Maker</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,700,800,900" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<script src="animated-scroll-to.js"></script>
	<head>
	<body>
		<header>
			<h1>Champions Maker</h1>
			<nav>
				<?php
				if(!isset($_SESSION["usuario"])){
				?>
				<a href="index.php">Início</a>
				<a href="cadastroCliente.php">Cadastrar</a>
				<a href="login.php">Login</a>
				<?php
				} else{
				?>
				<a href="index.php">Início</a>
				<a href="cadastrar_campeonato.php">Cadastro Campeonato</a>
				<a href="ver_campeonatos.php">Ver Meus Campeonatos</a>
				<a href="faq.php">FAQ</a>
				<a href="sair.php">Sair</a>
			<?php } ?>
			</nav>
		</header>
		<?php if(!isset($content)) {
			echo "<content>";
		} ?>
