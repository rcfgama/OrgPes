<div class="home">
	<!-- Arquivo que carrega o status das finanças pessoais no programa OrgPes desenvolvido por Ronaldo Gama - versão 1.0 -->
	<h2>FINANÇAS PESSOAIS</h2>
	<br>
	<table align="center" border="1">
		<tr>
			<form method="POST">
				<td>
					<select name="mes" value="Mês">
						<option value="0"></option>
						<option value="1">JANEIRO</option>
						<option value="2">FEVEREIRO</option>
						<option value="3">MARÇO</option>
						<option value="4">ABRIL</option>
						<option value="5">MAIO</option>
						<option value="6">JUNHO</option>
						<option value="7">JULHO</option>
						<option value="8">AGOSTO</option>
						<option value="9">SETEMBRO</option>
						<option value="10">OUTUBRO</option>
						<option value="11">NOVEMBRO</option>
						<option value="12">DEZEMBRO</option>
					</select>
				</td>
				<td align="center">
					<strong>
						<input type="text" name="ano" value="<?php echo date('Y');?>">
					</strong>
				</td>
				<td>
					<input type="submit" value="CARREGAR" name="submit">
				</td>
			</form>
		</tr>
		<?php
			/* Buscas no banco de dados e cálculos dos totais para montar a tabela com os valores totais. */ 
			$mes = @$_POST['mes'];
			$ano = @$_POST['ano'];

			include("conectx.php");
			$resue = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalent FROM pessoal WHERE TIPO = 'ENTRADAS' AND MES = '$mes' AND ANO = '2020'");
				while($lint = mysqli_fetch_array($resue)) {
			$resud = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totaldes FROM pessoal WHERE TIPO = 'DESPESAS' AND MES = '$mes' AND ANO = '2020'");
				while($lind = mysqli_fetch_array($resud)) {
			$resuo = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalout FROM pessoal WHERE TIPO = 'OUTRAS' AND MES = '$mes' AND ANO = '2020'");
				while($lino = mysqli_fetch_array($resuo)) {
			$resuf = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalfix FROM pessoal WHERE TIPO = 'FIXAS' AND MES = '$mes' AND ANO = '2020'");
				while($linf = mysqli_fetch_array($resuf)) {
			$resur = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalrnd FROM pessoal WHERE TIPO = 'RENDA' AND MES = '$mes' AND ANO = '2020'");
				while($linr = mysqli_fetch_array($resur)) {
			$resug = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalgst FROM pessoal WHERE TIPO = 'GASTOS' AND MES = '$mes' AND ANO = '2020'");
				while($ling = mysqli_fetch_array($resug)) {
			$resuv = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalvar FROM pessoal WHERE TIPO = 'VARIÁVEIS' AND MES = '$mes' AND ANO = '2020'");
				while($linv = mysqli_fetch_array($resuv)) {
			$resuc = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalcon FROM pessoal WHERE TIPO = 'CONSUMO' AND MES = '$mes' AND ANO = '2020'");
				while($linc = mysqli_fetch_array($resuc)) {
			$custo = $lind['totaldes']+$lino['totalout']+$linf['totalfix']+$ling['totalgst']+$linv['totalvar']+$linc['totalcon'];
			$renda = $lint['totalent']+$linr['totalrnd'];
		?>
		<!-- Montagem da tabela "TOTAL" -->
		<tr>
			<td align="center"><strong>TOTAL DE RECURSOS</strong></td>
			<td align="center"><strong>TOTAL DE DÉBITOS</strong></td>
			<td align="center"><strong>SALDO</strong></td>
		</tr>
		<tr>
			<td align="center"><strong><?=$renda?></strong></td>
			<td align="center"><strong><?=$custo?></strong></td>
			<td align="center"><strong><?php echo number_format(($renda-$custo),2,",",".")?></strong></td>
		</tr>
	</table>
	<br>
	<p>
		<a href="?b=nlprof">Inserir lançamento Profissional</a>
		<a href="?b=nlpess">Inserir lançamento Pessoal</a>
		<a href="?b=cprof">Organizador Profissional</a>
		<a href="?b=home">VOLTAR</a>
	</p>
	<br>
	<h3>QUADRO GERAL (<?=$mes?>/<?=$ano?>)</h3>
	<br>
	<table align="center" border="1">
		<tr>
			<td>CONSUMO</td>
			<td width="50" align="center"><?=$linc['totalcon']?></td>
		<?php }?>	
			<td>VARIÁVEIS</td>
			<td width="50" align="center"><?=$linv['totalvar']?></td>
		<?php }?>	
			<td>GASTOS</td>
			<td width="50" align="center"><?=$ling['totalgst']?></td>
		<?php }?>	
			<td>RENDA</td>
			<td width="50" align="center"><?=$linr['totalrnd']?></td>
		<?php }?>
		</tr>
		<tr>
			<td>FIXAS</td>
			<td width="50" align="center"><?=$linf['totalfix']?></td>
		<?php }?>	
			<td>OUTRAS</td>
			<td width="50" align="center"><?=$lino['totalout']?></td>
		<?php }?>	
			<td>DESPESAS</td>
			<td width="50" align="center"><?=$lind['totaldes']?></td>
		<?php }?>	
			<td>ENTRADAS</td>
			<td width="50" align="center"><?=$lint['totalent']?></td>
		<?php }?>
		</tr>
	</table>
	<br>
	<h3>LANÇAMENTOS</h3>
	<br>
	<table align="center" border="1">
		<tr>
			<td align="center">NOME</td>
			<td align="center">TIPO</td>
			<td align="center">PREVISTO</td>
			<td align="center">VALOR</td>
			<td align="center">STATUS</td>
			<td align="center">OBS.</td>
			<td align="center">EDITAR</td>
			<td align="center">DELETAR</td>
		</tr>
		<?php
		$selec = mysqli_query($conex, "SELECT * FROM PESSOAL WHERE MES = '$mes' AND ANO = '2020'");
			while ($line = mysqli_fetch_array($selec)) {?>
				<tr>
					<td><?=$line["NOME"]?></td>
					<td align="center"><?=$line["TIPO"]?></td>
					<td align="center"><?=$line["PREV"]?></td>
					<td align="center"><?=$line["VALOR"]?></td>
					<td align="center"><?=$line["STATUS"]?></td>
					<td><?=$line["OBS"]?></td>
					<td align="center"><a href="#" onclick="editx(<?=$line["ID"]?>)">Editar</a></td>
					<td align="center"><a href="#" onclick="verificx(<?=$line["ID"]?>)">Excluir</a></td>
				</tr>
		<?php	}?>
	</table>
</div>