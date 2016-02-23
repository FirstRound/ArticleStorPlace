<?php
class User {

	public static function Login($data, $token) {
		setcookie("login_ok", true, time()+60*60*24*30);
		setcookie("user_id", $data['user_id'], time()+60*60*24*30);
        setcookie("user_token", $token, time()+60*60*24*30);
        setcookie("user_name", $data['name'], time()+60*60*24*30);
	}

	public static function Logout() {
		setcookie("login_ok"); 
		setcookie("user_id");
        setcookie("user_token");
        setcookie("user_name");
		return true;
	}

	public static function IsLogin() {
		return $_COOKIE["login_ok"];
	}

	// Геттеры свойств
	//BEGIN
	public static function getName() {
		return $_COOKIE["user_name"];
	}

	public static function getToken() {
		return $_COOKIE["user_token"];
	}

	public static function getId() {
		return $_COOKIE["user_id"];
	}
	//END

}
?>