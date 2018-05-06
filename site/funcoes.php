<?php
session_start();
function conexao() {
	$conexao = mysqli_connect("localhost", "rafael", "123");
	mysqli_select_db($conexao, "champions_maker");
	return($conexao);
}
function form_cadastro(){
	echo '<div>
		<form method = "POST" action = "cadastroCliente.php">
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

	$conexao = conexao();

	$maxid = "SELECT MAX(id) as 'max' FROM usuario";
	$maxid_sql = mysqli_query($conexao, $maxid);
	foreach($maxid_sql as $i=>$v) {
		$max = $v["max"];
	}

	$sql = "INSERT INTO usuario (id, nome, usuario, senha, email) VALUES ($max+1,'".$_POST["nome"]."', '".$_POST["usuario"]."', '".$_POST["senha"]."', '".$_POST["email"]."')";
	//echo $sql;
	$teste = testar_usuario($_POST["usuario"],$_POST["email"]);
	if($teste==1) {

	  //executa a query no banco de dados
	  mysqli_query($conexao, $sql);

	  //feacha a conexao com o banco
	  mysqli_close($conexao);

		header("Location: login.php");
	} else {
		echo "Usuário já existente";
		form_cadastro();
	}
}

function autentica(){
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];

	$conexao = conexao();

	$comando = "SELECT id FROM usuario where usuario = '$usuario' and senha = '$senha'";
	$recurso = mysqli_query($conexao, $comando);
	if(mysqli_num_rows($recurso)>0){
		foreach($recurso as $i=>$v) {
			$id = $v["id"];
		}
		$_SESSION["usuario"] = $id;
		return(true);
	} else{
		return(false);
	}
}

function testar_usuario($usuario, $email) {

	$conexao = conexao();

	$usuario_sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
	$email_sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";

	$usuario_query = mysqli_query($conexao, $usuario_sql);
	$email_query = mysqli_query($conexao, $email_sql);
	if(mysqli_num_rows($usuario_query) > 0) {
		return(0);
	}
	return(1);
}

function sair() {
	session_destroy();
	echo "<script>location.reload();</script>";
}
?>
