<?php
namespace Controllers;

class LogoutController
{


	public function get(){	

		session_start();

		if (!(isset($_SESSION['status']))){
			$_SESSION['status']=0;
			header("Location: front.php");
			exit();
		}

		if($_SESSION['status']==0){
			header("Location: front.php");
			exit();
		}

		session_destroy();
		header("Location: front.php");
		exit();
	}
}
?>