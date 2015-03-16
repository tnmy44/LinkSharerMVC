<?php
namespace Controllers;
//echo("EG");
class FrontController
{
	protected $twig ;

	public function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
		$this->twig = new \Twig_Environment($loader) ;
	}

	public function get(){
		session_start();
		if (!(isset($_SESSION['status']))){
			$_SESSION['status']=0;
		}
		if($_SESSION['status']==1){
			header("Location: home.php");
		exit();
		}		

	
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
					echo $this->twig->render("front.html", $arr) ;
				}

	}
