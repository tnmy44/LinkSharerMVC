<?php
namespace Controllers;
use Models\Links;

class LinkShareController
{
		public function post(){
			session_start();
			$str=file_get_contents('php://input');
			if(!($str)) exit();

			createLink($_SESSION['username'],$str)

		}
}

?>
				