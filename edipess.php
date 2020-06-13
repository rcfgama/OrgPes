<div class="home">
	<h1>EDITAR LANÇAMENTO PESSOAL</h1>
	<br>
	<table align="center" border="1">
		<tr>
			<td>ID</td>
			<td>NOME</td>
			<td>TPO</td>
			<td>PREVISTO</td>
			<td>VALOR</td>
			<td>STATUS</td>
			<td>OBS.</td>
			<td>SALVAR?</td>
		</tr>
		<?php
			$edxid = $_POST['id'];

			include("conectx.php");

			$busca = mysqli_query($conex, "select * from pessoal where id='$edxid'");
				while($line = mysqli_fetch_array($busca)) {?>
					<form action="?b=salvpess" method="post">						
						<tr>
							<td>
								<input type="hidden" name="id" placeholder="ID" required class="input" value="<?=$line["ID"]?>">
							</td>
							<td>
								<input type="text" name="nome" placeholder="NOME" required class="input" value="<?=$line["NOME"]?>">
							</td>
							<td>
								<input type="text" name="tipo" placeholder="TIPO" required class="input" value="<?=$line["TIPO"]?>">
							</td>
							<td>
								<input type="text" name="prev" placeholder="R$" required class="input" value="<?=$line["PREV"]?>">
							</td>
							<td>
								<input type="text" name="valor" placeholder="R$" required class="input" value="<?=$line["VALOR"]?>">
							</td>
							<td>
								<input type="text" name="status" placeholder="STATUS" required class="input" value="<?=$line["STATUS"]?>">
							</td>
							<td>
								<input type="text" name="obs" placeholder="OBS." required class="input" value="<?=$line["OBS"]?>">
							</td>
							<td align="center">
								<input type="submit" value="SALVAR" name="submit">
							</td>
						</tr>
					</form>	
				<?php	}?>	
			</table>
			<br>
			<a href="?b=cpess">VOLTAR</a>
</div>