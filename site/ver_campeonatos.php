<?php
include("funcoes.php");
include("cabecalho.php");
$usuario = $_SESSION["usuario"];
$conexao = conexao();

$sql = "SELECT * FROM campeonato WHERE id_usuario = '$usuario'";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($resultado);
?>
<script>
var posicao_vertical = 0;
function scrolldireita(numero_de_campeonatos) {
  max = parseInt(numero_de_campeonatos)*300;
  tamanho = document.getElementById("campeonatos").clientWidth - 30*numero_de_campeonatos + 10;
  max =  parseInt(max) - parseInt(tamanho);
  if(posicao_vertical + 300>max) {
    posicao_vertical = max + 8;
  } else {
    posicao_vertical = posicao_vertical + 334;
  }
  animateScrollTo(posicao_vertical,{ element: document.getElementById("campeonatos"), horizontal: true });
  //document.getElementById("campeonatos").scrollTo(posicao_vertical, 0);
}
function scrollesquerda(numero_de_campeonatos) {
  if(posicao_vertical - 330 < 0) {
    posicao_vertical = 0;
  } else {
    posicao_vertical = posicao_vertical - 334;
  }
  animateScrollTo(posicao_vertical,{ element: document.getElementById("campeonatos"), horizontal: true });
  //document.getElementById("campeonatos").scrollTo(posicao_vertical, 0);
}
</script>
<div id="campeonatos" class="campeonatos">
  <button class="esquerda" onclick="scrollesquerda(<?=$linhas;?>)"></button>
  <button class="direita" onclick="scrolldireita(<?=$linhas;?>)"></button>
  <div class="aux_camp">
    <?php
	foreach($resultado as $i=>$v) {
	?>
	<div class="campeonato">
    <a href="ver_campeonato.php?campeonato=<?php echo $v["id"]; ?>">
      <div class="imagem">
        <img src="teste.jpg"/>
      </div>
      <div class="titulo">
        <h3> <?=$v["nome"];?> </h3>
      </div>
    </a>
  </div>
  <?php
	}
  ?>
  </div>
</div>
<?php
include("rodape.php");
?>
