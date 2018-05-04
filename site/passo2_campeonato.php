<?php
include("cabecalho.php");

if(isset($_POST["tipo"])){
  echo "<h2>".$_POST["nome_campeonato"]."</h2>";
  ?>
    <script>
      Element.prototype.remove = function() {;
      }
      NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
        for(var i = this.length - 1; i >= 0; i--) {
            if(this[i] && this[i].parentElement) {
                this[i].parentElement.removeChild(this[i]);
            }
        }
      }
      function addtimes(time) {
        time = parseInt(time) + 1;
        //alert(typeof(time));
        document.getElementById("times").innerHTML += "\
          <div id='time"+time+"'>\
            <div>\
              <label> Nome do Time: </label>\
              <input type='text' max='100' name='nome_campeonato[]'/>\
            </div>\
            <label>Jogadores</label>\
            <div id='jogadores"+ time +"'>\
              <div>\
                <input type='text' max='100' name='nome_jogador"+ time +"[]'/>\
                <button type='button' onclick='addjogador(this.value)' value='"+ time +"'>+</button>\
              </div>\
            </div>\
            <button type='button' onclick='addtimes(this.value)' value='"+ time +"'>+</button>\
            <button type='button' onclick='remtimes(this.value)' value='"+ time +"'>-</button>\
          </div>\
        ";
      }
      var jogador = 1;
      function addjogador(time) {
        document.getElementById("jogadores"+time+"").innerHTML += "\
          <div id='jogador"+time + jogador+"'>\
            <input type='text' max='100' name='nome_jogador"+ time +"[]'/>\
            <button type='button' onclick='addjogador(this.value)' value='"+ time +"'>+</button>\
            <button type='button' onclick='remjogador(this.value)' value='"+ time + jogador +"'>-</button>\
          </div>\
        ";
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
        <div id="time0">
          <div>
            <label> Nome do Time: </label>
            <input type="text" max="100" name="nome_campeonato[]"/>
          </div>
          <label>Jogadores</label>
          <div id="jogadores0">
            <div id="jogador00">
              <input type="text" max="100" name="nome_jogador0[]"/>
              <button type="button" onclick="addjogador(this.value)" value="0">+</button>
            </div>
          </div>
          <button type="button" onclick="addtimes(this.value)" value="0">+</button>
        </div>
      </div>
      <input type="hidden" value="<?php echo $_POST["tipo"]; ?>" name="tipo" />
      <input type="submit" value="Próximo"/>
    </form>
  <?php
}
include("rodape.php");
?>
