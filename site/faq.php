<?php
	include("funcoes.php");
	include("cabecalho.php");
?>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		  $( function() {
			$( "#faq" ).accordion({
				active:-1
			});
		  } );
	</script>
	<style>
	div#faq h3 {
		cursor: pointer;
	}
	</style>

		<h3 align="center">Perguntas Frequentes</h3><br/>
		<div id="faq">

			<b><h3 class="faq1">1. Como crio um campeonato?</h3></b>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No menu, que se encontra no topo do site, você deve clicar na aba <a class="faq2" href="cadastrar_campeonato.php" >
					“Cadastro Campeonato”</a>. Nessa página você escolherá o tipo de campeonato que deseja quer criar. Após a escolha do tipo de campeonato você poderá dar um nome a ele, criar times e caso queira, adicionar uma descrição ao campeonato. Na aba <a class="faq2" href="ver_campeonatos.php" >“Ver Meus Campeonatos”</a> você poderá visualizar todos seus campeonatos já criados, incluindo aqueles que já foram finalizados.
				</p>
			</div>

			<b><h3 class="faq1">2. Posso criar um campeonato de qualquer esporte?</h3></b>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;É possível criar um campeonato de qualquer modalidade, desde campeonatos esportivos até disputas de cartas, jogos de tabuleiro ou qualquer disputa competitiva.
				</p>
			</div>

			<b><h3 class="faq1">3. Existe a possibilidade de escolher qual tipo de campeonato eu quero?</h3></b>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Infelizmente não. Temos apenas uma opção de campeonato: o Mata-Mata. Que é o campeonato composto por partidas únicas, sem decisão de 3º e 4º lugar, sendo que o time ou jogador é eliminado assim que perder.
				</p>
			</div>

			<!-- <b><h3 class="faq1">4. Posso alterar o nome do meu campeonato?</h3></b>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Não.
				</p>
			</div> -->

			<b><h3 class="faq1">4. Posso cadastrar times no meu campeonato?</h3></b>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pode sim, logo após nomear seu campeonato você poderá nomear quatro ou mais times.
				</p>
			</div>

			<!--<b><h3 class="faq1">5. Posso cadastrar os participantes do meu campeonato?</h3></b>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pode sim, após nomear um time você pode adicionar os participantes e/ou jogadores.
				</p>
			</div>-->

			<b><h3 class="faq1">5. Quantos campeonatos posso cadastrar?</h3></b>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Você pode cadastrar quantos campeonatos quiser.
				</p>
			</div>

			<b><h3 class="faq1">6. Posso visualizar meus campeonatos?</h3></b>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Você pode visualizar seus campeonatos na página <a class="faq2" href="ver_campeonatos.php" >"Ver Meus Campeonatos”</a>.
				</p>
			</div>

		</div>
<?php
	include("rodape.php");
?>
