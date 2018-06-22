<?php
$content = 0;
include("funcoes.php");
if(permissao()) {
include("cabecalho.php");
?>
<div class = "cadastrar_campeonato">
  <a href="passo1_campeonato.php?tipo=0"> Mata-mata </a>
</div>
<?php
include("rodape.php");
} else{
  header("location: index.php");
}
?>
