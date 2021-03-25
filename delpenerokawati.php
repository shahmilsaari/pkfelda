<?php
	include('config.php');
	$public_id=$_GET['isteri_ic'];
	mysqli_query($link,"delete from isteri where isteri_ic='$public_id'");
	echo "<script> alert('Delete Successful');
	window.location.href='viewisteri.php';</script>";

?>
