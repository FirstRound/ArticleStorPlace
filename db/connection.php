<?php
if (!isset($_SESSION["connect"])) {
	$dbHost = "mysql.hostinger.com.ua";
	$dbUser = "u519287019_user";
	$dbName = "u519287019_de";
	$dbPass = "vlad94";

	$dbConnect = mysql_connect($dbHost, $dbUser, $dbPass);
	mysql_select_db($dbName, $dbConnect);
	session_start();
	$_SESSION["connect"] = $dbConnect;
}
?>