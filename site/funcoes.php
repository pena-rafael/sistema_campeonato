<?php
function form_cadastro(){
	echo '<div>
		<form method = "POST" action = "funcoes.php">
			<div>
				<label> Nome: </label>
				<input type = "text" name = "nome" required = "required"/>
			</div>
			
			<div>
				<label> Usuario: </label>
				<input type = "text" name = "usuario" required = "required"/>
			</div>
			
			<div>
				<label> E-mail: </label>
				<input type = "email" name = "email" required = "required"/>
			</div>
			
			<div>
				<label> Senha: </label>
				<input type = "password" name = "senha" required = "required"/>
			</div>
			
			<div>
				<input type = "submit" value = "Enviar" /> 
				<input type = "reset" value = "Limpar" /> 
			</div>
		</form>
	</div>';
}


function ler_dados_salvar(){
	$nome = $_POST["nome"];
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	$email = $_POST["email"];
	
	$conexao = mysqli_connect("localhost", "Vinicius", "12345");
	mysqli_select_db($conexao, "champions_maker");
	$sql = "INSERT INTO usuario(nome, usuario, senha, email)" . "VALUES ('$nome', '$usuario', '$senha', '$email')";
	mysqli_query($conexao, $sql);

	mysqli_close($conexao);
	
	header("Location: login.php");
}

function autentica(){
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	
	$conexao = mysqli_connect("localhost", "Vinicius", "12345");
	mysqli_select_db($conexao, "champions_maker");
	$comando = "SELECT * FROM usuario where usuario = '$usuario' and senha = '$senha'";
	$recurso = mysqli_query($conexao, $comando);
	if(mysqli_num_rows($recurso)>0){
		$_SESSION["autenticacao"] = TRUE;
	} else{
		echo "Usuário ou senha não encontrados";
	}
	echo '<a href = "index.php">;
}
?>