<?php
include("funcoes.php");
if(isset($_SESSION["usuario"])) {
  sair();
}
include("cabecalho.php");
if(!isset($_SESSION["usuario"])) {
  echo "Volte sempre!";
}
include("rodape.php");
?>
