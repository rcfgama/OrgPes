<div class="home">
	<!-- Arquivo que carrega o status das finanças pessoais no programa OrgPes desenvolvido por Ronaldo Gama - versão 1.0 -->
	<h2>FINANÇAS PESSOAIS</h2>
	<br>
	<table align="center" border="1">
		<tr>
			<form method="POST">
				<td>
					<select name="mes" value="Mês">
						<option value="00">MÊS</option>
						<option value="01">JANEIRO</option>
						<option value="02">FEVEREIRO</option>
						<option value="03">MARÇO</option>
						<option value="04">ABRIL</option>
						<option value="05">MAIO</option>
						<option value="06">JUNHO</option>
						<option value="07">JULHO</option>
						<option value="08">AGOSTO</option>
						<option value="09">SETEMBRO</option>
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
			if ($mes == '') {
				$messhow = date('m');
				$anoshow = date('Y');
			} else {
				$messhow = $mes;
				$anoshow = $ano;
			}
			include("conectx.php");
			$resue = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalent FROM pessoal WHERE TIPO = 'ENTRADAS' AND MES = '$messhow' AND ANO = '$anoshow'");
				while($lint = mysqli_fetch_array($resue)) {
			$resud = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totaldes FROM pessoal WHERE TIPO = 'DESPESAS' AND MES = '$messhow' AND ANO = '$anoshow'");
				while($lind = mysqli_fetch_array($resud)) {
			$resuo = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalout FROM pessoal WHERE TIPO = 'OUTRAS' AND MES = '$messhow' AND ANO = '$anoshow'");
				while($lino = mysqli_fetch_array($resuo)) {
			$resuf = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalfix FROM pessoal WHERE TIPO = 'FIXAS' AND MES = '$messhow' AND ANO = '$anoshow'");
				while($linf = mysqli_fetch_array($resuf)) {
			$resur = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalrnd FROM pessoal WHERE TIPO = 'RENDA' AND MES = '$messhow' AND ANO = '$anoshow'");
				while($linr = mysqli_fetch_array($resur)) {
			$resug = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalgst FROM pessoal WHERE TIPO = 'GASTOS' AND MES = '$messhow' AND ANO = '$anoshow'");
				while($ling = mysqli_fetch_array($resug)) {
			$resuv = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalvar FROM pessoal WHERE TIPO = 'VARIÁVEIS' AND MES = '$messhow' AND ANO = '$anoshow'");
				while($linv = mysqli_fetch_array($resuv)) {
			$resuc = mysqli_query($conex, "SELECT SUM(round(VALOR,2)) AS totalcon FROM pessoal WHERE TIPO = 'CONSUMO' AND MES = '$messhow' AND ANO = '$anoshow'");
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
	<?php
	if ($messhow == 1) {
		$mesescr = 'JAN';
	} elseif ($messhow == 2) {
		$mesescr = 'FEV';
	} elseif ($messhow == 3) {
		$mesescr = 'MAR';
	} elseif ($messhow == 4) {
		$mesescr = 'ABR';
	} elseif ($messhow == 5) {
		$mesescr = 'MAI';
	} elseif ($messhow == 6) {
		$mesescr = 'JUN';
	} elseif ($messhow == 7) {
		$mesescr = 'JUL';
	} elseif ($messhow == 8) {
		$mesescr = 'AGO';
	} elseif ($messhow == 9) {
		$mesescr = 'SET';
	} elseif ($messhow == 10) {
		$mesescr = 'OUT';
	} elseif ($messhow == 11) {
		$mesescr = 'NOV';
	} else {
		$mesescr = 'DEZ';
	}?>
	<h3>QUADRO GERAL (<?=$mesescr?>/<?=$anoshow?>)</h3>
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
			<td align="center">COPIAR</td>
		</tr>
		<?php
		$selec = mysqli_query($conex, "SELECT * FROM PESSOAL WHERE MES = '$messhow' AND ANO = '2020'");
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
					<td align="center"><a href="#" onclick="copix(<?=$line["ID"]?>)">Copiar</a></td>
				</tr>
		<?php	}?>
	</table>
</div>
