<?php
	include_once("Admin/Connection.php");
	$select="select * from tblUser where UserID=12";
	$e=mysqli_query($con,$select) or die(mysqli_error($con));
	$f=mysqli_fetch_array($e);
	echo "Password".base64_decode($f['Password']);
	echo "decode".base64_encode("admin123");



	echo "date<br><br>".date("HsYHsdm");
?>

<input type="checkbox" name="" readonly="">