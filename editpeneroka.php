<?php
	include('config.php');

	$public_id=$_GET['peneroka_ic'];

	$name=$_POST['name'];
	$description=$_POST['description'];

	mysqli_query($link,"update peneroka set peneroka_ic='$name', peneroka_name='$description' where peneroka_ic='$public_id'");
	echo "<script> alert('Edit Successful');
	window.location.href='viewpeneroka.php';</script>";


?>
