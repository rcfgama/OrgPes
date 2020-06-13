<div class="home">
	<?php
		$rexid = $_POST['id'];

		include("conectx.php");

		mysqli_query($conex, "delete from pessoal where id='$rexid'");
	
		header("location:?b=cpess");

?>
</div>