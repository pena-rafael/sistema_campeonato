<?php
include("funcoes.php");
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

  <script>
    var min_height = document.getElementsByClassName("aux_camp")[0].clientHeight;
    min_height-=60;
    document.getElementsByTagName("content")[0].style.minHeight = min_height;
  </script>
<?php
include("rodape.php");
?>
