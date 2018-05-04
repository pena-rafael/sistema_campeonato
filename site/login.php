<?php 
	include("cabecalho.php");
?>
<div>	
	<form method = "post">
		<div>
			<label>
				login:
			</label>
				<input type = "text" name = "login" required = "required"/>
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
	include("rodape.php");
?>