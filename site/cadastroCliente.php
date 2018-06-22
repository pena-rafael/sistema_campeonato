<?php
	include("funcoes.php");
	include("cabecalho.php");
	if(permissao()) {
		header("location: index.php");
	} else {
		if(empty($_POST)){
			form_cadastro();
		}else{
			ler_dados_salvar();
		}
	}
	include("rodape.php");
?>
