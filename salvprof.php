<div class="home">
	<?php
		include("conecta.php");

	$ID = $_POST['id'];
	$TIPO = $_POST['tipo'];
	$VALOR = $_POST['valor'];

	if ($TIPO != 'GNV' and $TIPO != 'GASOLINA' and $TIPO != 'ALIMENTAÇÃO' and $TIPO != 'WORKDAY' and $TIPO != 'RESULTADO' and $TIPO != 'LAVAGEM' and $TIPO != 'BÔNUS' and $TIPO != 'MANUTENÇÃO' and $TIPO != 'PEDÁGIO') {
		echo "TIPO INVÁLIDO</br>";?>
		<br>
		<p><a href="?b=cprof">VOLTAR</a></p><?php
	} else {
		mysqli_query($conexao, "UPDATE lanca SET TIPO = '$TIPO', VALOR = '$VALOR' WHERE ID = '$ID'");
		header("location:?b=cprof");
	}

?>
</div>