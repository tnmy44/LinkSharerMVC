<?php

//echo "start";
require_once __DIR__ . "/../vendor/autoload.php";
Toro::serve(array(
	"/" => "Controllers\\FrontController",
	"/front.php" => "Controllers\\FrontController",
	"/home.php" => "Controllers\\HomeController",
	"/login.php" => "Controllers\\LoginController",
	"/logout.php" => "Controllers\\LogoutController",
	"/handle.php" => "Controllers\\LinkShareController",
	"/signup.php" => "Controllers\\SignupController",
	"/am.html" => "Controllers\\AMController"

	))
?>