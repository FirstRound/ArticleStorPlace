<?php
class UserController {

	private $dbController;

    function __construct($db = "NULL") {
    	$this->dbController = $db;
    }

	public  function login($name, $password) {
		$data = mysql_fetch_assoc($this->dbController->validateUser($name, $password)); 
		if ($data != null) {
			$token = md5($this->_generateCode(10));
			$this->dbController->updateUsersToken($data["user_id"], $token);
        	User::Login($data, $token);
        	return true;
		}
		return false; 
	}

	public function registrate($name, $password) {
		$data = $this->dbController->registrateUser($name, $password);
		if ($data != null) {
			$token = md5($this->_generateCode(10));
			$this->dbController->updateUsersToken($data["user_id"], $token);
        	User::Login($data, $token);
        	return true;
		}
		return false;
	}

	public function logout() {
		setcookie("user_id");
        setcookie("user_token");
        setcookie("user_name");
        User::Logout();
	}

	public function register() {

	}


	private function _generateCode($length=6) {
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
	    $code = "";
	    $clen = strlen($chars) - 1;  
	    while (strlen($code) < $length) {
	            $code .= $chars[mt_rand(0,$clen)];  
	    }
	    return $code;
	}
}
?>