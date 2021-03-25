<?php
	include('config.php');
	$public_id=$_GET['waris_ic'];
	mysqli_query($link,"delete from waris where waris_ic='$public_id'");
	echo "<script> alert('Delete Successful');
	window.location.href='viewpewaris.php';</script>";

?>
