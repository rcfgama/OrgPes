<div class="home">
	<?php

		include("conecta.php");

		$TIPO = $_POST['radio1'];
		$VALOR = $_POST['valor'];
		
		mysqli_query($conexao, "insert into lanca (TIPO, VALOR) values ('$TIPO', '$VALOR')");

		header("location:?b=cprof");

	?>
</div>