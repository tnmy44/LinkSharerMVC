<?php
namespace Models;

class Users
{

	public function authUser($username,$password)
	{
		require(__DIR__ . '/../../config/credentials.php');
			$query="SELECT * FROM members WHERE username = '" . $username . "' AND password='" . $password . "'";
		$con=  mysqli_connect($creden['host'],$creden['username'],$creden['passkey'],$creden['db']);				
				$result = mysqli_query($con,$query);
				//var_dump($con);
				
				if (mysqli_num_rows($result) > 0) {
					

		    
		    		$row = $result->fetch_assoc();
		    		return $row;
		    	} else{
		    		return 0;
		    	}
	}

	public function createUser($username,$password,$name){
		require(__DIR__ . '/../../config/credentials.php');

				$con=  mysqli_connect($creden['host'],$creden['username'],$creden['passkey'],$creden['db']);
	
				if(mysqli_connect_errno()){
					die("Connection failed: " . mysqli_connect_errno());
				}
				//echo $con;
				$query="SELECT * FROM members WHERE username = '" . $username . "'";
				
				$result = mysqli_query($con,$query);
					
				if (mysqli_num_rows($result) > 0) {
					return 0;
				}	

				$query="INSERT INTO members (username,password,name) VALUES ('" . $username . "','" . $password . "','" . $name . "');";
				
					$result = mysqli_query($con,$query);
		        	
		        	if (mysql_errno())  
		        		die ("eror");
		        	return 1;
	}

}
