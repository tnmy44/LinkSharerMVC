<?php
session_start();

if (!(isset($_SESSION['status']))){
	$_SESSION['status']=0;
	header("Location: index.php");
	exit();
}

if($_SESSION['status']==0){
	header("Location: index.php");
	exit();
}

session_destroy();
header("Location: index.php");
exit();

?>