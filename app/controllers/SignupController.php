<?php
namespace Controllers;

	class SignupController
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
				$query="SELECT * FROM members WHERE username = '" . $_POST["username"] . "'";
				
				$result = mysqli_query($con,$query);
				//var_dump($con);
				
				if (mysqli_num_rows($result) > 0) {
					

		    
		    		echo "This username is already used.";
		        } else {
		        	
		        	$query="INSERT INTO members (username,password,name) VALUES ('" . $_POST["username"] . "','" . $_POST['password'] . "','" . $_POST['name'] . "');";
				
					$result = mysqli_query($con,$query);
		        	
		        	if (mysql_errno()) { 
		        		echo "eror";


		        		
		        	}else{
		        		session_start();
		        		$_SESSION['status']=1;
		        		$_SESSION['username']=$_POST["username"];
		        		$_SESSION['name']=$_POST["name"];
		        		header("Location: home.php");
		        	}

		        }

				

			}else{
				header("Location: front.php");
			}
}
}			
			?>
