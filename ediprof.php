<div class="home">
	<h1>EDITAR ITEM</h1>
	<br>
	<table align="center" border="1">
		<tr>
			<td>ID</td>
			<td>TIPO</td>
			<td>VALOR</td>
			<td>SALVAR?</td>
		</tr>
		<?php
			$ident = $_POST['id'];

			include("conecta.php");

			$busca = mysqli_query($conexao, "select * from lanca where id='$ident'");
				while($line = mysqli_fetch_array($busca)) {?>
					<form action="?b=salvprof" method="post">						
						<tr>
							<td>
								<input type="hidden" name="id" placeholder="ID" required class="input" value="<?=$line["ID"]?>">
							</td>
							<td>
								<input type="text" name="tipo" placeholder="TIPO" required class="input" value="<?=$line["TIPO"]?>">
							</td>
							<td>
								<input type="text" name="valor" placeholder="R$" required class="input" value="<?=$line["VALOR"]?>">
							</td>
							<td>
								<input align="center" type="submit" value="SALVAR" name="submit">
							</td>
						</tr>
					</form>	
				<?php	}?>	
			</table>
			<br>
			<a href="?b=cprof">VOLTAR</a>
</div>