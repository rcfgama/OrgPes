<div class="home">
	<h2>CONTROLE PROFISSIONAL</h2>
	<br>
	<h3>RESULTADO</h3>
	<br>
	<?php
			include("conecta.php");
			$resub = mysqli_query($conexao, "SELECT SUM(round(VALOR,2)) AS totalbns FROM lanca WHERE TIPO = 'BÔNUS'");
				while($linb = mysqli_fetch_array($resub)) {
			$resur = mysqli_query($conexao, "SELECT SUM(round(VALOR,2)) AS totalrst FROM lanca WHERE TIPO = 'RESULTADO'");
				while($linr = mysqli_fetch_array($resur)) {
			$resuw = mysqli_query($conexao, "SELECT SUM(round(VALOR,2)) AS totalwrd FROM lanca WHERE TIPO = 'WORKDAY'");
				while($linw = mysqli_fetch_array($resuw)) {		
			$resul = mysqli_query($conexao, "SELECT SUM(round(VALOR,2)) AS totallvg FROM lanca WHERE TIPO = 'LAVAGEM'");
				while($linl = mysqli_fetch_array($resul)) {
			$resup = mysqli_query($conexao, "SELECT SUM(round(VALOR,2)) AS totalpdg FROM lanca WHERE TIPO = 'PEDÁGIO'");
				while($linp = mysqli_fetch_array($resup)) {
			$resua = mysqli_query($conexao, "SELECT SUM(round(VALOR,2)) AS totalalm FROM lanca WHERE TIPO = 'ALIMENTAÇÃO'");
				while($lina = mysqli_fetch_array($resua)) {
			$resuf = mysqli_query($conexao, "SELECT SUM(round(VALOR,2)) AS totalgas FROM lanca WHERE TIPO = 'GASOLINA'");
				while($linf = mysqli_fetch_array($resuf)) {
			$resug = mysqli_query($conexao, "SELECT SUM(round(VALOR,2)) AS totalgnv FROM lanca WHERE TIPO = 'GNV'");
				while($ling = mysqli_fetch_array($resug)) {
			$custo = $ling['totalgnv']+$linf['totalgas']+$lina['totalalm']+$linp['totalpdg']+$linl['totallvg'];
			$renda = $linr['totalrst']+$linb['totalbns'];
			$cusday = $custo/$linw['totalwrd'];
			$renday = $renda/$linw['totalwrd'];?>

	<table align="center" border="1">
		<tr>		
			<td>SALDO</td>
			<td width="50"><?=$renda-$custo?></td>
		</tr>
		<tr>
			<td>SALDO/DIA</td>
			<td width="50"><?=$renday-$cusday?></td>
		</tr>
	</table>
	<br>
	<p>
		<a href="?b=nlprof">Inserir lançamento Profissional</a>
		<a href="?b=nlpess">Inserir lançamento Pessoal</a>
		<a href="?b=cpess">Organizador Pessoal</a>
		<a href="?b=home">VOLTAR</a>
	</p>
	<br>
	<h3>QUADRO GERAL</h3>
	<br>
	<table align="center" border="1">
		<tr>
			<td>CUSTO</td>
			<td width="50" align="center"><?=$custo?></td>
			<td>RENDA</td>
			<td width="50" align="center"><?=$renda?></td>
		</tr>
		<tr>
			<td>CUSTO/DIA</td>
			<td width="50" align="center"><?=$cusday?></td>
			<td>RENDA/DIA</td>
			<td width="50" align="center"><?=$renday?></td>
		</tr>
	</table>
	<br>
	<h3>SOMA POR TIPO</h3>
	<br>
	<table align="center" border="1">
		<tr>
			<td>GNV</td>
			<td width="50" align="center"><?=$ling['totalgnv']?></td>
		<?php }?>
			<td>GASOLINA</td>
			<td width="50" align="center"><?=$linf['totalgas']?></td>
		<?php }?>	
			<td>ALIMENTAÇÃO</td>
			<td width="50" align="center"><?=$lina['totalalm']?></td>
		<?php }?>	
			<td>PEDÁGIO</td>
			<td width="50" align="center"><?=$linp['totalpdg']?></td>
		<?php }?>
		</tr>
		<tr>
			<td>LAVAGEM</td>
			<td width="50" align="center"><?=$linl['totallvg']?></td>
		<?php }?>	
			<td>WORK DAY</td>
			<td width="50" align="center"><?=$linw['totalwrd']?></td>
			<?php }?>
			<td>RESULTADO</td>
			<td width="50" align="center"><?=$linr['totalrst']?></td>
			<?php }?>
			<td>BÔNUS</td>
			<td width="50" align="center"><?=$linb['totalbns']?></td>
			<?php }?>
		</tr>
	</table>
	<br>
	<h3>LANÇAMENTOS</h3>
	<br>	
	<table align="center" border="1">
		<tr>
			<td>TIPO</td>
			<td>VALOR</td>
			<td>EDITAR</td>
			<td>DELETAR</td>
		</tr>
		<?php
		$selec = mysqli_query($conexao, "SELECT * FROM lanca");
			while ($line = mysqli_fetch_array($selec)) {?>
				<tr>
					<td><?=$line["TIPO"]?></td>
					<td align="center"><?=$line["VALOR"]?></td>
					<td align="center">
						<form action="?b=ediprof" method="post">
							<input type="hidden" name="id" required class="input" value="<?=$line["ID"]?>">
							<input type="submit" value="Editar" name="submit">							
						</form>
					</td>
					<td align="center"><a href="#" onclick="verifica(<?=$line["ID"]?>)">Excluir</a></td>
				</tr>
		<?php	}?>
	</table>
</div>