<?php
namespace Controllers;
use \Models\Links;
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

		$arr = Links::getLinks();
		$arr['username']=$_SESSION['username'];
		$arr['name'] = $_SESSION['name'];
		
		



			echo $this->twig->render("home.html", $arr) ;

		}
}
?>