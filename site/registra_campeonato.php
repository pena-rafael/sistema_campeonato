<?php
include("funcoes.php");
verificacao();
include("cabecalho.php");

if(isset($_POST["tipo"])){
  //var_dump($_POST);
  $nome_campeonato = $_POST["nome_campeonato"];
  $tipo = $_POST["tipo"];
  $id_usuario = $_SESSION["usuario"];
  cadastro_campeonato($nome_campeonato, $tipo, $id_usuario);
  foreach($_POST["nome_time"] as $i=>$v) {
    //$jogadores = $_POST["nome_jogador".$i];
    cadastro_time($v);
  }
  echo "Cadastro feito com sucesso!";
}
include("rodape.php");
?>
