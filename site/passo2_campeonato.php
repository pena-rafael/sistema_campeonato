<?php
include("funcoes.php");
include("cabecalho.php");

if(isset($_POST["tipo"])){
?>
	<h2><img src="<?=$_POST["nome_campeonato"];?>" alt="<?=$_POST["nome_campeonato"];?>"/></h2>
	<?php 
	echo "<h2>".$_POST["nome_campeonato"]."</h2>";
	?>
    <script>
      function addtimes(time) {
        time = parseInt(time) + 1;
        //alert(typeof(time));
        var div = document.createElement("div");
        div.className = "time";
        div.id = "time"+time;
        div.innerHTML = "<div>\
          <label> Nome do Time: </label>\
          <input type='text' max='100' name='nome_time[]'/>\
        </div>\
        <label>Jogadores</label>\
        <div class='jogadores' id='jogadores"+ time +"'>\
          <div>\
            <input type='text' max='100' name='nome_jogador"+ time +"[]' placeholder='Nome do Jogador'/>\
            <button type='button' onclick='addjogador(this.value)' value='"+ time +"'>+</button>\
          </div>\
        </div>\
        <button type='button' onclick='addtimes(this.value)' value='"+ time +"'>+</button>\
        <button type='button' onclick='remtimes(this.value)' value='"+ time +"'>-</button>";

        document.getElementById("times").appendChild(div);
        /*document.getElementById("times").innerHTML += "\
          <div class='time' id='time"+time+"'>\
            <div>\
              <label> Nome do Time: </label>\
              <input type='text' max='100' name='nome_campeonato[]'/>\
            </div>\
            <label>Jogadores</label>\
            <div class='jogadores' id='jogadores"+ time +"'>\
              <div>\
                <input type='text' max='100' name='nome_jogador"+ time +"[]' placeholder='Nome do Jogador'/>\
                <button type='button' onclick='addjogador(this.value)' value='"+ time +"'>+</button>\
              </div>\
            </div>\
            <button type='button' onclick='addtimes(this.value)' value='"+ time +"'>+</button>\
            <button type='button' onclick='remtimes(this.value)' value='"+ time +"'>-</button>\
          </div>\
        ";*/
      }
      var jogador = 1;
      function addjogador(time) {
        var div = document.createElement("div");
        div.id = "jogador"+time + jogador;
        div.innerHTML =  "\
          <input type='text' max='100' name='nome_jogador"+ time +"[]' placeholder='Nome do Jogador'/>\
          <button type='button' onclick='addjogador(this.value)' value='"+ time +"'>+</button>\
          <button type='button' onclick='remjogador(this.value)' value='"+ time + jogador +"'>-</button>";
        document.getElementById("jogadores"+time+"").appendChild(div);
        jogador = jogador + 1;
      }
      function remtimes(time) {
        var element = document.getElementById("time"+time);
        element.outerHTML = "";
        delete element;
      }
      function remjogador(timejogador) {
        var element = document.getElementById("jogador"+timejogador);
        element.outerHTML = "";
        delete element;
      }
    </script>
    <form action="registra_campeonato.php" method="post">
      <div id="times">
        <div class='time' id="time0">
          <div>
            <label> Nome do Time: </label>
            <input type="text" max="100" name="nome_time[]"/>
          </div>
          <label>Jogadores</label>
          <div class="jogadores" id="jogadores0">
            <div id="jogador00">
              <input type="text" max="100" name="nome_jogador0[]" placeholder='Nome do Jogador'/>
              <button type="button" onclick="addjogador(this.value)" value="0">+</button>
            </div>
          </div>
          <button type="button" onclick="addtimes(this.value)" value="0">+</button>
        </div>
      </div>
      <input type="hidden" value="<?php echo $_POST["tipo"]; ?>" name="tipo" />
      <input type="hidden" value="<?php echo $_POST["nome_campeonato"]; ?>" name="nome_campeonato" />
      <input type="submit" value="Próximo"/>
    </form>
  <?php
}
include("rodape.php");
?>
