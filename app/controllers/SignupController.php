<?php
namespace Controllers;
use Models\Users;
class SignupController
{

	
	public function post(){	

		if ($_POST["username"] && $_POST["password"])
		{

				//var_dump($con);
			$res=Users::createUser($_POST["username"] ,$_POST["password"] , $_POST["name"]);
			if (!$res) {

				die ("This username is already used.");
			} else {

				session_start();
				$_SESSION['status']=1;
				$_SESSION['username']=$_POST["username"];
				$_SESSION['name']=$_POST["name"];
				header("Location: home.php");


			}



		}else{
			header("Location: front.php");
		}
	}
}			
?>
