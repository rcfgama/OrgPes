<div class="home">
	<h2>INSERIR LANÇAMENTO PESSOAL</h2>
	<br>
	<p>
		<a href="?b=nlprof">Inserir lançamento Profissional</a>
		<a href="?b=cprof">Organizador Profissional</a>
		<a href="?b=cpess">Organizador Pessoal</a>
		<a href="?b=home">VOLTAR</a>
	</p>
	<br>
	<table align="center" border="1">
		<tr>
			<td><strong>NOME</strong></td>
			<td><strong>TIPO</strong></td>
			<td><strong>PREVISTO</strong></td>
			<td><strong>VALOR</strong></td>
			<td><strong>STATUS</strong></td>
			<td><strong>OBS.</strong></td>
			<td><strong>MÊS</strong></td>
			<td><strong>ANO</strong></td>
			<td><strong>INSERIR?</strong></td>
		</tr>
		<tr>
			<form action="?b=envpess" method="post">
				<td>
					<input type="text" name="nome">
				</td>
				<td>
					<select name="tipo">
						<option value="CONSUMO">CONSUMO</option>
						<option value="GASTOS">GASTOS</option>
						<option value="RENDA">RENDA</option>
						<option value="FIXAS">FIXAS</option>
						<option value="DESPESAS">DESPESAS</option>
						<option value="ENTRADAS">ENTRADAS</option>
						<option value="VARIÁVEIS">VARIÁVEIS</option>
						<option value="OUTRAS">OUTRAS</option>
					</select>
				</td>
				<td>
					<input type="text" name="prev">
				</td>
				<td>
					<input type="text" name="valor">
				</td>
				<td>
					<input type="text" name="status">
				</td>
				<td>
					<input type="text" name="obs">
				</td>
				<td>
					<select name="mes">
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
				<td>
					<input type="text" name="ano" value="2020">
				</td>
				<td>
					<input type="submit" value="INSERIR" name="submit">
				</td>
		</form>
	</table>
</div>