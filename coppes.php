<div class="home">
	<?php
		$copid = $_POST['id'];

		include("conectx.php");

		$busca = mysql_query($conex, "SELECT * FROM pessoal WHERE ID = '$copid'");
		$copnm = $busca["NOME"];
		$coptp = $busca["TIPO"];
		$coppv = $busca["VALOR"];
		$copms = $busca["MES"] + 1;
		if ($copms == 1) {
			$copan = $busca["ANO"] + 1;
		} else {
			$copan = $busca["ANO"];
		}

		echo $copms;

		/*
		mysqli_query($conex, "INSERT INTO pessoal (NOME, TIPO, PREV, STATUS, MES, ANO) values ('$copnm', '$coptp', '$coppv', 'ABERTA', '$copms', '$copan' from pessoal WHERE ID='$copid'");
	
		header("location:?b=cpess");
*/
?>
</div>