<?php
namespace Controllers;
use Models\Links;
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

		$arr = Links::getLinks();	
		echo $this->twig->render("front.html", $arr) ;
	}

}
