<?php
include("funcoes.php");
if(permissao()) {
if(permissao_campeonato($_GET["campeonato"])) {
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
      $desc_campeonato = $v["desc_campeonato"];
    }
    $times = "SELECT t.nome as 'nome' from times as t, participa as p WHERE t.id = p.id_time and p.id_campeonato = $id_campeonato";
    //echo $times;
    $busca_times = mysqli_query($conexao,$times);

    $num_times = mysqli_num_rows($busca_times);
    if($num_times%2==1) {
      $num_times++;
    }

    $chaves = "SELECT * from chaves WHERE id_campeonato = $id_campeonato";
    $busca_chaves = mysqli_query($conexao,$chaves);
?>
  <?php include("includes/campeonatos.php"); ?>
  <div class="o_campeonato">
    <div class="ver_campeonato">
      <input id="tab1" type="radio" name="tabs" checked>
      <label for="tab1" class="label_tab">Informações sobre o campeonato</label>

      <input id="tab2" type="radio" name="tabs">
      <label for="tab2" class="label_tab">Times</label>

      <input id="tab3" type="radio" name="tabs">
      <label for="tab3" class="label_tab">Chaves</label>
      <!--<div class="imagem" style="background-image:url('teste.jpg')">
      </div>-->

      <!--<content>-->
      <section id="content1">
        <div class="titulo">
          <h2> <?php echo $titulo; ?> </h2>
        </div>
        <div class="informacoes">
          <p> Tipo: <?php if($tipo==0){
            echo "Mata-mata";
          } else {
            echo "Suíço";
          } ?></p>
          <p><?php echo $desc_campeonato; ?></p>
        </div>
      </section>
      <section id="content2">
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
      </section>
      <section id="content3">
        <?php include("includes/mostra_chaves.php"); ?>
      </section>
    </div>
  </div>
      <!--</content>-->
<?php
  }
}
include("rodape.php");
} else {
  header("location: index.php");
}
} else {
  header("location: index.php");
}
?>
