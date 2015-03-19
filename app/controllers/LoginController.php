<?php
namespace Controllers;
use Models\Users;

	class LoginController
	{

	
	public function post(){	

			if ($_POST["username"] && $_POST["password"])
			{

				
				//echo $con;
					$row=Users::authUser($_POST["username"] , $_POST["password"]);
					if(!$row){
						die("Invalid Username or password.");
					}
					session_start();
					$_SESSION["username"]=$row["username"];
					$_SESSION['status']=1;
					$_SESSION["name"]=$row["name"];
					header("Location: home.php");


				

			}else{
				header("Location: front.php");
			}

		}
}	
?>
