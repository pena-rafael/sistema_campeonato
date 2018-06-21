<?php
$usuario = $_SESSION["usuario"];
$conexao = conexao();


$sql = "SELECT * FROM campeonato WHERE id_usuario = '$usuario'";
$resultado = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($resultado); ?>
  <div class="aux_camp" id="height">
    <?php
	foreach($resultado as $i=>$v) {
	?>
	<div class="campeonato">
    <a href="ver_campeonato.php?campeonato=<?php echo $v["id"]; ?>">

      <div class="titulo">
        <h3> <?=$v["nome"];?> </h3>
      </div>
    </a>
  </div>
	<?php } ?>
  </div>

  <script>
    var min_height = document.getElementsByClassName("aux_camp")[0].clientHeight;
    min_height-=60;
    document.getElementsByTagName("content")[0].style.minHeight = min_height;
  </script>
