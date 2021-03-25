<?php
	include('config.php');
	$public_id=$_GET['kematian_ic'];
	mysqli_query($link,"delete from kematian where kematian_ic='$public_id'");
	echo "<script> alert('Delete Successful');
	window.location.href='viewkematians.php';</script>";

?>
