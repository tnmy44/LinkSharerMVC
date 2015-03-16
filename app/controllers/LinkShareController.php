<?php
namespace Controllers;

class LinkShareController
{
		public function post(){
			session_start();
			$str=file_get_contents('php://input');
			if(!($str)) exit();
			require(__DIR__ . '/../../config/credentials.php');

			$con=  mysqli_connect($creden['host'],$creden['username'],$creden['passkey'],$creden['link_sharer']);

			if(mysqli_connect_errno()){
				die("Connection failed: " . mysqli_connect_errno());
			}
			//echo $con;
			$query="INSERT INTO links(username,url) VALUES ('" . $_SESSION['username'] . "','" . $str . "')";

			//echo("$query");
			$result = mysqli_query($con,$query);

		}
}

?>
				