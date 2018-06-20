<?php
include("funcoes.php");
verificacao();
include("cabecalho.php");

if(isset($_POST["tipo"])){
?>
	<?php
	echo "<h2>".$_POST["nome_campeonato"]."</h2>";
	?>
    <form action="registra_campeonato.php" method="post">
			<?php for($i=0;$i<$_POST["quantidade_times"];$i++) { ?>
	      <div id="times">
	        <div class='time' id="time<?= $i; ?>">
	          <div>
	            <label> Nome do Time: </label>
	            <input type="text" max="100" name="nome_time[]"/>
	          </div>
	        </div>
	      </div>
			<?php } ?>
      <input type="hidden" value="<?php echo $_POST["tipo"]; ?>" name="tipo" />
      <input type="hidden" value="<?php echo $_POST["nome_campeonato"]; ?>" name="nome_campeonato" />
      <input type="submit" value="Próximo"/>
    </form>
  <?php
}
include("rodape.php");
?>
