<div class="home">
	<?php
		$recid = $_POST['id'];

		include("conectx.php");

		mysqli_query($conex, "delete from lanca where id='$recid'");
	
		header("location:?b=cpess");

?>
</div>