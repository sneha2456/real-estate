<?php
	session_start();
	//echo "Hii" .$_SESSION["UserID"];
	unset($_SESSION["AdminID"]);
	session_destroy();
	//echo "Hii" .$_SESSION["UserID"];
	header("location:index.php");
?>