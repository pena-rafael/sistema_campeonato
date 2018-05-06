<?php
include("funcoes.php");
include("cabecalho.php");

if(isset($_GET["tipo"])){
  if($_GET["tipo"]==0){
    echo "<h2> Mata-mata </h2>";
  } else {
    echo "<h2> Suíço </h2>";
  }
  ?>
    <form action="passo2_campeonato.php" method="post">
      <div>
        <label> Nome do Campeonato: </label>
        <input type="text" max="100" name="nome_campeonato"/>
      </div>
      <input type="hidden" value="<?php echo $_GET["tipo"]; ?>" name="tipo" />
      <input type="submit" value="Próximo"/>
    </form>
  <?php
}
include("rodape.php");
?>
