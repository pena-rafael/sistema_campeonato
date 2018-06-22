<?php
include("funcoes.php");
if(permissao()) {
include("cabecalho.php");

if(isset($_POST["tipo"])){
  //var_dump($_POST);
  $nome_campeonato = $_POST["nome_campeonato"];
  $tipo = $_POST["tipo"];
  $id_usuario = $_SESSION["usuario"];
  $desc_campeonato = $_POST["desc_campeonato"];
  cadastro_campeonato($nome_campeonato, $tipo, $id_usuario, $desc_campeonato);
  foreach($_POST["nome_time"] as $i=>$v) {
    //$jogadores = $_POST["nome_jogador".$i];
    cadastro_time($v);
  }
  echo "Cadastro feito com sucesso!";
}
include("rodape.php");
} else {
  header("location: index.php");
}
?>
