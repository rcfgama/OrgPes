<div class="home">
	<?php

	include("conectx.php");

		$NOME = $_POST['nome'];
		$TIPO = $_POST['tipo'];
		$PREV = $_POST['prev'];
		$VALOR = $_POST['valor'];
		$STATUS = $_POST['status'];
		$OBS = $_POST['obs'];
		$MES = $_POST['mes'];
		$ANO = $_POST['ano'];

		mysqli_query($conex, "insert into pessoal (NOME, TIPO, PREV, VALOR, STATUS, OBS, MES, ANO) values ('$NOME', '$TIPO', '$PREV', '$VALOR', '$STATUS', '$OBS', '$MES', '$ANO')");

		header("location:?b=cpess");

	?>
</div>