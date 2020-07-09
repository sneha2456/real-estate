<?php 
	include_once("admin/Connection.php");

	$ContactNo = $_REQUEST["CNO"];
	$str = "select * from tbluser where ContactNo ='$ContactNo'";
	$rs = mysqli_query($con,$str) or die(mysqli_error($con));
	$res = mysqli_num_rows($rs);
	if($res>0)
	{
		echo "Contact Number already Exists.";
	}
?>
