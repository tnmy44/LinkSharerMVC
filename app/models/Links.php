<?php
namespace Models;

class Links
{

		public static function getLinks()
		{
				require(__DIR__ . '/../../config/credentials.php');

				$con=  mysqli_connect($creden['host'],$creden['username'],$creden['passkey'],$creden['db']);
				if(mysqli_connect_errno()){
					die("Connection failed: " . mysqli_connect_errno());
				}
				//echo $con;
				$query="SELECT * FROM links ORDER BY time DESC";

					$result = mysqli_query($con,$query);
				//var_dump($con);
					$objs=array();
					while ($row = $result->fetch_assoc()) {
							$obji=array();
						
								$tstamp = \DateTime::createFromFormat("Y-m-d H:i:s",$row['time']);
								$timr="Just now maybe";
								$tdiff= $tstamp->diff(new \DateTime());
								if($tdiff-> y){
									$timr=($tdiff-> y . " years ago");
								} elseif ($tdiff-> m) {
									$timr=($tdiff-> m . " months ago");
								} elseif ($tdiff-> d) {
									$timr=($tdiff-> d . " days ago");
								} elseif ($tdiff-> h) {
									$timr=($tdiff-> h . " hours ago");
								} elseif ($tdiff-> i) {
									$timr=($tdiff-> i . " minutes ago");
								} elseif ($tdiff-> s) {
									$timr=($tdiff-> s . " seconds ago");
								}

								$obji['timr']=$timr;
								$obji['url']=$row['url'];
								$obji['username']=$row['username'];
								$objs[]=$obji;		

					}
					
					$arr['objs']=$objs;
					return $arr;
		}

		public function createLink($username,$str)
		{
			require(__DIR__ . '/../../config/credentials.php');

			$con=  mysqli_connect($creden['host'],$creden['username'],$creden['passkey'],$creden['link_sharer']);

			if(mysqli_connect_errno()){
				die("Connection failed: " . mysqli_connect_errno());
			}
			//echo $con;
			$query="INSERT INTO links(username,url) VALUES ('" . $username . "','" . $str . "')";

			//echo("$query");
			$result = mysqli_query($con,$query);
		}
}