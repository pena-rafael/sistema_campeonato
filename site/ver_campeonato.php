<?php
$content = false;
include("funcoes.php");
include("cabecalho.php");
if(isset($_GET["campeonato"])){
  $conexao = conexao();
  $id_campeonato = $_GET["campeonato"];
  $id_usuario = $_SESSION["usuario"];
  $sql = "SELECT * from campeonato WHERE id=$id_campeonato and id_usuario=$id_usuario";
  $busca = mysqli_query($conexao,$sql);

  if(mysqli_num_rows($busca)==0){
    echo "Campeonato não encontrado.";
  } else {
    foreach($busca as $i => $v){
      $titulo = $v["nome"];
      $tipo = $v["tipo"];
    }
    $times = "SELECT t.nome as 'nome' from times as t, participa as p WHERE t.id = p.id_time and p.id_campeonato = $id_campeonato";
    //echo $times;
    $busca_times = mysqli_query($conexao,$times);

    $chaves = "SELECT * from chaves WHERE id_campeonato = $id_campeonato";
    $busca_chaves = mysqli_query($conexao,$chaves);
?>
    <div class="ver_campeonato">
      <div class="imagem" style="background-image:url('teste.jpg')">
      </div>
      <content>
        <div class="titulo">
          <h2> <?php echo $titulo; ?> </h2>
        </div>
        <div class="informacoes">
          <p> Tipo: <?php if($tipo==0){
            echo "Mata-mata";
          } else {
            echo "Suíço";
          } ?></p>
          <h3>Times</h3>
          <table>
            <thead>
              <tr>
                <th>Nome</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($busca_times as $i=>$v) {
                echo "<tr>";
                echo "<td>".$v["nome"]."</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
          <?php
            if(mysqli_num_rows($busca_chaves)==0){
              fazer_chaves($id_campeonato);
              $chaves = "SELECT * from chaves WHERE id_campeonato = $id_campeonato";
              $busca_chaves = mysqli_query($conexao,$chaves);
            }
            echo "<h3>Chaves</h3>";
            echo "<ul class='lista_chaves'>";
            foreach($busca_chaves as $i=>$v){
              $time1 = busca("times", "nome", "id=".$v["time1"]);
              $time2 = busca("times", "nome", "id=".$v["time2"]);

              $jogadores1 = "SELECT j.nome as 'Nome' from jogador as j, faz_parte as fp WHERE j.id = fp.id_jogador and fp.id_time=".$v["time1"];
              //echo "$jogadores1";

              $jogadores2 = "SELECT j.nome as 'Nome' from jogador as j, faz_parte as fp WHERE j.id = fp.id_jogador and fp.id_time=".$v["time2"];

              $busca_jogadores1 = mysqli_query($conexao,$jogadores1);
              $busca_jogadores2 = mysqli_query($conexao,$jogadores2);

              echo "<li>";
              echo "<div class='chave time1'>";
              echo "$time1";
              echo "<div class='linha'></div>";
              echo "</div>";
              echo "<div class='chave time2'>";
              echo "$time2";
              echo "<div class='linha'></div>";
              echo "</div>";
              echo "<div class='linha_v'></div>";
              echo "<div class='linha_h'></div>";
              echo "</li>";
            }
            echo "</ul>";
          ?>
          <a href="cadastrar_partida.php?campeonato=<?php echo $_GET["campeonato"]; ?>">Cadastrar partida</a>
        </div>
      </content>
    </div>
<?php
  }
}
include("rodape.php");
?>
