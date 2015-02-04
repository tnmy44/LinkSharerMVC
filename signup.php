<html>
	<head>
		<title>Link Sharer</title>
		<link rel="stylesheet" href="styles.css" type="text/css">
	</head>
	
	<body>
		
			<?php
			
			
			

			if ($_POST["username"] && $_POST["password"])
			{

							include('credentials.php');

				$con=  mysqli_connect($creden['host'],$creden['username'],$creden['passkey'],$creden['link_sharer']);
	
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
				header("Location: index.php");
			}
			
			?>
			
		
	</body>	
</html>
