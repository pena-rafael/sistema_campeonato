<?php
session_start();
function permissao() {
	if(isset($_SESSION["usuario"])) {
		return(true);
	} else {
		return(false);
	}
}
function permissao_campeonato($id) {
	$conexao = conexao();
	$sql = "SELECT * FROM campeonato WHERE id_usuario=".$_SESSION["usuario"]." AND id=$id";
	$busca = mysqli_query($conexao, $sql);

	if(mysqli_num_rows($busca)==0) {
		return(false);
	} else {
		return(true);
	}
}
function conexao() {
	$conexao = mysqli_connect("localhost", "rafael", "123");
	mysqli_select_db($conexao, "champions_maker");
	return($conexao);
}
function maior_id($tabela) {
	$conexao = conexao();

	$maxid = "SELECT MAX(id) as 'max' FROM $tabela";
	$maxid_sql = mysqli_query($conexao, $maxid);
	foreach($maxid_sql as $i=>$v) {
		$max = $v["max"];
	}
	return($max);
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
			<input type = "submit" value = "Cadastrar" />
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
		echo "<span class='erro'>Usuário já existente</span>";
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

function cadastro_campeonato($nome_campeonato, $tipo, $id_usuario, $desc_campeonato) {
	$conexao = conexao();

	$maxid = "SELECT MAX(id) as 'max' FROM campeonato";
	$maxid_sql = mysqli_query($conexao, $maxid);
	foreach($maxid_sql as $i=>$v) {
		$max = $v["max"];
	}
	$max = $max + 1;
	$sql = "INSERT INTO campeonato(id, nome, tipo, id_usuario, desc_campeonato) VALUES($max, '$nome_campeonato', $tipo, $id_usuario, '$desc_campeonato')";
	//echo $sql;
	$busca = mysqli_query($conexao, $sql);
}

function cadastro_time($nome_time) {
	$conexao = conexao();

	$id_campeonato = maior_id("campeonato");
	$id_time = maior_id("times");
	$id_time = $id_time + 1;

	$add_time = "INSERT INTO times(id, nome) VALUES($id_time, '$nome_time')";
	$add_participa = "INSERT INTO participa(id_campeonato, id_time) VALUES($id_campeonato, $id_time)";

	$executa_time = mysqli_query($conexao, $add_time);
	$executa_participa = mysqli_query($conexao, $add_participa);

	/*foreach($jogadores as $i=>$v) {
		$id_jogador = maior_id("jogador");
		$id_jogador++;

		$add_jogador = "INSERT INTO jogador(id, nome) VALUES($id_jogador, '$v')";
		$add_faz_parte = "INSERT INTO faz_parte(id_time, id_jogador) VALUES($id_time, $id_jogador)";

		$executa_jogador = mysqli_query($conexao, $add_jogador);
		$executa_faz_parte = mysqli_query($conexao, $add_faz_parte);
	}*/
}

function fazer_chaves($id_campeonato){
	$conexao = conexao();
	/* Buscar Times do Campeonato */
	$times = "SELECT * FROM times as t, participa as p WHERE t.id = p.id_time and p.id_campeonato = $id_campeonato ORDER BY RAND()";
	$busca_times = mysqli_query($conexao, $times);

	/* Buscar Tipo Campeonato */
	$tipo = "SELECT tipo FROM campeonato WHERE id = $id_campeonato";
	$busca_tipo = mysqli_query($conexao, $tipo);
	//var_dump($busca_tipo);

	foreach ($busca_tipo as $i => $v) {
		$tipo = $v["tipo"];
	}

	$indice = 1;

	foreach($busca_times as $i=>$v) {
		if($indice%2==0) {
			/* Buscar ID */
			$maxid = "SELECT MAX(id) as 'max' FROM chaves WHERE id_campeonato = $id_campeonato";
			$maxid_sql = mysqli_query($conexao, $maxid);
			foreach($maxid_sql as $j=>$v2) {
				$max = $v2["max"];
			}
			$max++;

			$time2 = $v["id"];
			$add_chave = "INSERT INTO chaves(id_campeonato, tipo, time1, time2, vencedor, id)
										VALUES($id_campeonato, $tipo, $time1, $time2, NULL, $max)";
			$add_chave_sql = mysqli_query($conexao, $add_chave);
			//var_dump($add_chave_sql);
		} else {
			$time1 = $v["id"];
		}
		$indice++;
	}
	if($indice%2==0){
		/* Buscar ID */
		$maxid = "SELECT MAX(id) as 'max' FROM chaves WHERE id_campeonato = $id_campeonato";
		$maxid_sql = mysqli_query($conexao, $maxid);
		foreach($maxid_sql as $j=>$v2) {
			$max = $v2["max"];
		}
		$max++;

		$time2 = $v["id"];
		$add_chave = "INSERT INTO chaves(id_campeonato, tipo, time1, time2, vencedor, id)
									VALUES($id_campeonato, $tipo, $time1, $time1, $time1, $max)";
		$add_chave_sql = mysqli_query($conexao, $add_chave);
	}
}

function busca($tabela,$coluna,$condicao){
	$conexao = conexao();
	$select = "SELECT $coluna from $tabela WHERE $condicao";
	$busca = mysqli_query($conexao,$select);

	foreach($busca as $i=>$v){
		$resultado = $v[$coluna];
	}

	return($resultado);
}

function testar_partidas($id) {
	$conexao = conexao();
	$sql_num_times = "SELECT * FROM participa WHERE id_campeonato=".$id;
	$busca_qtd_times = mysqli_query($conexao, $sql_num_times);
	$qtd_times = mysqli_num_rows($busca_qtd_times);
	/*foreach($busca_qtd_times as $i=>$v) {
		$qtd_times = $v["qtd"];
	}*/

	$sql_partidas = "SELECT * FROM partidas WHERE id_campeonato=".$id;
	//echo $sql_partidas;
	$busca_qtd_partidas = mysqli_query($conexao, $sql_partidas);
	$qtd_partidas = mysqli_num_rows($busca_qtd_partidas);
	/*foreach($busca_qtd_partidas as $i=>$v) {
		$qtd_partidas = $v["qtd"];
	}*/
	if($qtd_times-1!=$qtd_partidas) {
		return(true);
	} else {
		return(false);
	}
}
?>
