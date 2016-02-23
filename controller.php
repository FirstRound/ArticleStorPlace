<?php
	require_once "models/DB.php";
	require_once "models/User.php";


	require_once "controllers/DBController.php";
	require_once "controllers/UserController.php";


	$database = new DataBase("u519287019_de", "vlad94", "u519287019_user", "mysql.hostinger.com.ua");
	$dbController = new DataBaseController($database);
	$dbController->Connect();

	function saveCurrentPageAddress() {
		$_SESSION["current_page"] = $_SERVER['REQUEST_URI'];
	}

	function getPrevPage() {
		return $_SESSION["current_page"];
	}

	function getPage($str) {
		return substr($str, 0, strpos($str, "&"))?substr($str, 0, strpos($str, "&")):substr($str, 0,strlen($str)); 
	}
?>