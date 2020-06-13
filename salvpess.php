<div class="home">
	<?php
		include("conectx.php");

	$ID = $_POST['id'];
	$NOME = $_POST['nome'];
	$TIPO = $_POST['tipo'];
	$PREV = $_POST['prev'];
	$VALOR = $_POST['valor'];
	$STATUS = $_POST['status'];
	$OBS = $_POST['obs'];

	if ($TIPO != 'CONSUMO' and $TIPO != 'GASTOS' and $TIPO != 'RENDA' and $TIPO != 'FIXAS' and $TIPO != 'DESPESAS' and $TIPO != 'ENTRADAS' and $TIPO != 'VARIÁVEIS' and $TIPO != 'OUTRAS') {
		echo "TIPO INVÁLIDO</br>";?>
		<br>
		<p><a href="?b=cpess">VOLTAR</a></p><?php
	} else {
		mysqli_query($conex, "UPDATE pessoal SET NOME = '$NOME', TIPO = '$TIPO', PREV = '$PREV', VALOR = '$VALOR', STATUS = '$STATUS', OBS = '$OBS' WHERE ID = '$ID'");
		header("location:?b=cpess");
	}

?>
</div>