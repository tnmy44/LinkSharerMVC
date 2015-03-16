<?php
namespace Controllers;

class HomeController
{
	protected $twig ;

	public function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
		$this->twig = new \Twig_Environment($loader) ;
	}

	public function get(){
		session_start();
		//var_dump((isset($_SESSION['status'])));
		//exit();
		if (!(isset($_SESSION['status'])) || $_SESSION['status']==0){
			$_SESSION['status']=0;
			header("Location: front.php");
			exit();
		}
		$arr = array();
		$arr['username']=$_SESSION['username'];
		$arr['name'] = $_SESSION['name'];
		
		




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
						
								$tstamp =\DateTime::createFromFormat("Y-m-d H:i:s",$row['time']);
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
					echo $this->twig->render("home.html", $arr) ;

		}
}
?>