<?php
include("funcoes.php");
if(permissao()){
include("cabecalho.php");

if(isset($_GET["campeonato"])){
if(permissao_campeonato($_GET["campeonato"])) {
  $id_campeonato = $_GET["campeonato"];
  $conexao = conexao();
  $sql = "SELECT * from chaves WHERE $id_campeonato=id_campeonato AND vencedor is NULL";
  $resultado = mysqli_query($conexao,$sql);
?>
<form method="post" action="cadastrar_partida.php">
  <div style="width: 100%;">
    <label> Partida </label>
    <select onchange="mudarnome()" name="partida">
      <?php
        foreach($resultado as $i=>$v){
          $time1 = busca("times","nome","id=".$v["time1"]);
          $time2 = busca("times","nome","id=".$v["time2"]);
          echo "<option value='".$v["id"]."-$time1-$time2'> $time1 X $time2 </option>";
        }
      ?>
    </select>
  </div>
  <div>
    <label>Pontuação <span id="time1"></span></label>
    <input type="number" min="0" name="ptime1">
  </div>
  <div>
    <label>Pontuação <span id="time2"></span></label>
    <input type="number" min="0" name="ptime2">
  </div>
  <input type="hidden" value="<?php echo $id_campeonato; ?>" name="id_campeonato">
  <input type="submit" value="Enviar">
</form>
<script type="text/javascript">
  function mudarnome() {
    var nomes = document.getElementsByName('partida');
    times = nomes[0].value.split("-");
    document.getElementById('time1').innerHTML = times[1];
    document.getElementById('time2').innerHTML = times[2];
  }
  mudarnome();
</script>
<?php
} else {
  echo "Permissão negada";
}
} else if(isset($_POST["partida"])) {
  if($_POST["ptime1"]==$_POST["ptime2"]) {
    echo "<script>window.history.back()</script>";
  }else {
  $conexao = conexao();

  $campeonato = $_POST["id_campeonato"];
  $chave = $_POST["partida"];
  $chaves = explode("-", $chave);
  $chave = $chaves[0];

  $sql = "SELECT * FROM chaves WHERE id_campeonato=$campeonato AND id=$chave";
  $resultado = mysqli_query($conexao, $sql);

  foreach($resultado as $i=>$v) {
    $vetor = $v;
  }

  if($_POST["ptime1"]<$_POST["ptime2"]) {
    $vencedor = $vetor["time2"];
  } else {
    $vencedor= $vetor["time1"];
  }

  $maxid = "SELECT MAX(id) as 'max' FROM partidas WHERE id_campeonato = $campeonato";
  $maxid_sql = mysqli_query($conexao, $maxid);
  foreach($maxid_sql as $j=>$v2) {
    $id = $v2["max"];
  }
  $id++;

  /* Inserir partida */
  $sql = "INSERT into partidas(id_campeonato, id, tipo, time1, time2, ponto1, ponto2)
          VALUES($campeonato, $id, ".$vetor["tipo"].", ".$vetor["time1"].", ".$vetor["time2"].", ".$_POST["ptime1"].", ".$_POST["ptime2"].")";
  $resultado = mysqli_query($conexao, $sql);

  /* Adicionar vencedor a chave */
  $sql = "UPDATE chaves
          SET vencedor=$vencedor
          WHERE id_campeonato=$campeonato AND id=$chave";
  $resultado = mysqli_query($conexao, $sql);

  echo "Partida adicionada com sucesso! <a href='ver_campeonato.php?campeonato=$campeonato'>Voltar para o campeonato</a>";
  if(testar_partidas($campeonato)) {
    echo " ou <a href='cadastrar_partida.php?campeonato=$campeonato'>Adicionar nova partida</a>";
  }
  /* Quando já tiver todas as chaves com vencedores */
  $sql = "SELECT * FROM chaves WHERE id_campeonato=$campeonato AND vencedor is null";
  $resultado = mysqli_query($conexao, $sql);

  if(mysqli_num_rows($resultado)==0) {
    $sql = "SELECT * FROM chaves WHERE id_campeonato=$campeonato AND vencedor is not null AND vencedor >=0";
    $resultado = mysqli_query($conexao, $sql);
    $indice = 1;
    foreach($resultado as $i=>$v) {
      if($indice%2==0) {
        $maxid = "SELECT MAX(id) as 'max' FROM chaves WHERE id_campeonato = $campeonato";
  			$maxid_sql = mysqli_query($conexao, $maxid);
  			foreach($maxid_sql as $j=>$v2) {
  				$max = $v2["max"];
  			}
  			$max++;

  			$time2 = $v["vencedor"];

        $add_chave = "INSERT INTO chaves(id_campeonato, tipo, time1, time2, vencedor, id)
  										VALUES($campeonato,".$vetor["tipo"].", $time1, $time2, NULL, $max)";
  			$add_chave_sql = mysqli_query($conexao, $add_chave);
      } else {
  			$time1 = $v["vencedor"];
      }
  		$indice++;

      $sql = "UPDATE chaves
              SET vencedor=-1
              WHERE id_campeonato=$campeonato AND id=".$v["id"];
      $resultado = mysqli_query($conexao, $sql);
    }
    if($indice%2==0){
  		/* Buscar ID */
  		$maxid = "SELECT MAX(id) as 'max' FROM chaves WHERE id_campeonato = $campeonato";
  		$maxid_sql = mysqli_query($conexao, $maxid);
  		foreach($maxid_sql as $j=>$v2) {
  			$max = $v2["max"];
  		}
  		$max++;

  		$time2 = $v["vencedor"];
      $add_chave = "INSERT INTO chaves(id_campeonato, tipo, time1, time2, vencedor, id)
                    VALUES($campeonato,".$vetor["tipo"].",  $time1, $time2, $time1, $max)";
      $add_chave_sql = mysqli_query($conexao, $add_chave);
  	}
  }
  }
}
include("rodape.php");
} else {
  header("location: index.php");
}
