<?php  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
	session_start();
	session_destroy();
	$_SESSION['']="";
	header("location:../index.php");

?>