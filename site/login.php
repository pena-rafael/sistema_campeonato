<?php
include("funcoes.php");
if(isset($_POST["usuario"])) {
	$autentica = autentica();
	if($autentica) {
		header("location: ver_campeonatos.php");
	} else {
		include("cabecalho.php");
		echo "Usuário ou senha incorreto. <a href='login.php'>Tente novamente</a>";
		include("rodape.php");
	}
} else {
	include("cabecalho.php");
?>
<div>
	<form method = "post" action="login.php">
		<div>
			<label>
				Login:
			</label>
				<input type = "text" name = "usuario" required = "required"/>
		</div>
		<div>
			<label>
				Senha:
			</label>
			<input type = "password" name = "senha" required = "required"/>
		</div>
		<div>
			<input type = "submit" value = "Confirmar" />
			<input type = "reset" value = "Limpar" />
		</div>

	</form>
</div>
<?php
}
include("rodape.php");
?>
