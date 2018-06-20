
  <?php
    if(mysqli_num_rows($busca_chaves)==0){
      fazer_chaves($id_campeonato);
      $chaves = "SELECT * from chaves WHERE id_campeonato = $id_campeonato";
      $busca_chaves = mysqli_query($conexao,$chaves);
    }
    echo "<h3>Chaves</h3>";
    echo "<main id='tournament'>";
    $contador = 0;
    $primeiro = 0;
    echo '
    <ul class="round">
      <li class="spacer">&nbsp;</li>';
    foreach($busca_chaves as $i=>$v){
      if($v["vencedor"]==$v["time1"]) {
        $vencedor = 1;
      } else if($v["vencedor"]==$v["time2"]) {
        $vencedor = 2;
      } else {
        $vencedor = 0;
      }
      $time1 = busca("times", "nome", "id=".$v["time1"]);
      $time2 = busca("times", "nome", "id=".$v["time2"]);
      if($time1!=$time2) {
        ?>

      		<li class="game game-top <?php if($vencedor==1) {echo "winner";} ?>"><?php echo $time1; ?></li>
      		<li class="game game-spacer">&nbsp;</li>
      		<li class="game game-bottom <?php if($vencedor==2) {echo "winner";} ?>"><?php echo $time2; ?></li>

      		<li class="spacer">&nbsp;</li>
        <?php
      } else {
        ?>

      		<li class="game game-top <?php if($vencedor==1) {echo "winner";} ?>"><?php echo $time1; ?></li>

      		<li class="spacer">&nbsp;</li>
        <?php
      }
      $contador+=2;
      if($contador>=$num_times) {
        echo '
        </ul>
        <ul class="round">
          <li class="spacer">&nbsp;</li>';

        $contador = 0;
        $num_times = $num_times/2;
        $num_times = ceil($num_times);
      }
    }
    echo "</main>";
  ?>
  <a href="cadastrar_partida.php?campeonato=<?php echo $_GET["campeonato"]; ?>">Cadastrar partida</a>
