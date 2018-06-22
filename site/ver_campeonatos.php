<?php
include("funcoes.php");
if(permissao()) {
include("cabecalho.php");
$usuario = $_SESSION["usuario"];
$conexao = conexao();


$sql = "SELECT * FROM campeonato WHERE id_usuario = '$usuario'";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($resultado);
//echo $linhas;
if($linhas > 0){
?>
  <?php include("includes/campeonatos.php"); ?>
  <div class="o_campeonato">
    Selecione um campeonato
  </div>
  <?php
} else {
	echo "Não ha campeonatos cadastrados";
}
  ?>
<?php
include("rodape.php");
} else {
  header("location: index.php");
}
?>
