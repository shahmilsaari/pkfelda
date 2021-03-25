<?php
	include('config.php');

	$public_id=$_GET['isteri_ic'];

	$name=$_POST['name'];
	$description=$_POST['description'];


	mysqli_query($link,"update isteri set isteri_ic='$name', isteri_name='$description' where isteri_ic='$public_id'");
	echo "<script> alert('Edit Successful');
	window.location.href='viewisteri.php';</script>";

?>
