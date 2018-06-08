<?php
	include("funcoes.php");
	include("cabecalho.php");
?>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		  $( function() {
			$( "#faq" ).accordion();
		  } );
	</script>
	
		<h3 align="center">Perguntas Frequentes</h3><br/>
		<div id="faq">
			
			<h3>1. Como crio um campeonato?</h3>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No menu, que se encontra no topo do site, você deve clicar na aba <a href="cadastrar_campeonato.php" >
					“Cadastro Campeonato”</a>. Nessa página você escolherá o tipo de campeonato que você quer criar podendo ser suíço ou mata-mata. 
					Após a escolha do tipo de campeonato você poderá dar um nome a ele, criar times e caso queira, adicionar jogadores aos times. 
					Na aba <a href="ver_campeonatos.php" >“Ver Meus Campeonatos”</a> você poderá visualizar todos seus campeonatos já criados, 
					incluindo aqueles que já foram finalizados.
				</p>	
			</div>
				
			<h3>2. Posso criar um campeonato de qualquer esporte?</h3>
			<div>		
				<p>	
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;É possível criar um campeonato de qualquer modalidade, desde campeonatos esportivos 
					até disputas de baralhos, jogos de tabuleiro, jogos de cartas ou qualquer disputa competitiva.
				</p>	
			</div>
				
			<h3>3. Existe a possibilidade de escolher qual tipo de campeonato eu quero?</h3>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sim, temos duas opções de campeonato: Suiço e Mata-mata. A diferenças entre eles 
					é que o Suíço possui fases de grupos, além de jogos de ida e volta, com disputa de chave dos vencedores 
					(quem ganhou encara quem ganhou) e chave dos perdedores (quem perdeu encara quem perdeu). Já o Mata-mata é composto 
					por partidas únicas, sem decisão de 3º e 4º lugar, sendo que o time ou jogador é eliminado assim que perder.
				</p>	
			</div>	
				
			<h3>4. Posso alterar o nome do meu campeonato?</h3>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pode sim, é só acessar a página <a href="ver_campeonatos.php" >“Ver meus Campeonatos”</a> e
					editar o nome dado ao campeonato.
				</p>	
			</div>
				
			<h3>5. Posso cadastrar times no meu campeonato?</h3>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pode sim, logo após nomear seu campeonato você poderá nomear um ou mais times.
				</p>	
			</div>
				
			<h3>6. Posso cadastrar os participantes do meu campeonato?</h3>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pode sim, após nomear um time você pode adicionar os participantes e/ou jogadores. 
				</p>	
			</div>
				
			<h3>7. Quantos campeonatos posso cadastrar?</h3>
			<div>	
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Você pode cadastrar quantos campeonatos quiser.
				</p>
			</div>
				
			<h3>8. Posso visualizar meus campeonatos?</h3>
			<div>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Você pode visualizar seus campeonatos na página <a href="ver_campeonatos.php" >"Ver Meus Campeonatos”</a>.
				</p>
			</div>
			
		</div>
<?php
	include("rodape.php");
?>