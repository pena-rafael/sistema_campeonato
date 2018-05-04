<?php
	include ("cabecalho.php");
	include ("funcoes.php");
	if(empty($_POST)){
		form_cadastro();
	}else{
		ler_dados_salvar();
	}
	include("rodape.php");
?>