<?php
namespace Controllers;

	class LoginController
	{

	
	public function post(){	

			if ($_POST["username"] && $_POST["password"])
			{

				require(__DIR__ . '/../../config/credentials.php');

				$con=  mysqli_connect($creden['host'],$creden['username'],$creden['passkey'],$creden['db']);
			
				if(mysqli_connect_errno()){
					die("Connection failed: " . mysqli_connect_errno());
				}
				//echo $con;
				$query="SELECT * FROM members WHERE username = '" . $_POST["username"] . "' AND password='" . $_POST["password"] . "'";
				
				$result = mysqli_query($con,$query);
				//var_dump($con);
				
				if (mysqli_num_rows($result) > 0) {
					

		    
		    		$row = $result->fetch_assoc();

					session_start();
					$_SESSION["username"]=$row["username"];
					$_SESSION['status']=1;
					$_SESSION["name"]=$row["name"];
					header("Location: home.php");

		        } else {
		        	echo "Invalid Username or Password";
		        }

				

			}else{
				header("Location: front.php");
			}

		}
}	
?>
