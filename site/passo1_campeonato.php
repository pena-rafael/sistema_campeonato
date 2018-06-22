<?php
include("funcoes.php");
if(permissao()) {
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
	  <div>
        <label> Descrição do Campeonato: </label>
        <textarea name="desc_campeonato"> </textarea>
      </div>
	  <div>
        <label> Quantidade de times: </label>
        <select name="quantidade_times">
          <option>4</option>
          <option>8</option>
          <option>16</option>
          <option>32</option>
          <option>64</option>
          <option>128</option>
          <option>256</option>
          <option>512</option>
          <option>1024</option>
        </select>
      </div>
      <input type="hidden" value="<?php echo $_GET["tipo"]; ?>" name="tipo" />
      <input type="submit" value="Próximo"/>
    </form>
  <?php
}
include("rodape.php");
} else {
  header("location: index.php");
}
?>
