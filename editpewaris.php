<?php
	include('config.php');

	$public_id=$_GET['waris_ic'];

	$name=$_POST['name'];
	$description=$_POST['description'];


	mysqli_query($link,"update waris set waris_ic='$name', waris_name='$description' where waris_ic='$public_id'");
	echo "<script> alert('Edit Successful');
	window.location.href='viewpewaris.php';</script>";

?>
