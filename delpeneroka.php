<?php
	include('config.php');
	$public_id=$_GET['peneroka_ic'];
	mysqli_query($link,"delete from peneroka where peneroka_ic='$public_id'");
	echo "<script> alert('Delete Successful');
	window.location.href='viewpeneroka.php';</script>";

?>
