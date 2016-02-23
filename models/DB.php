<?php
class DataBase {
	private $name = "u519287019_de";
	private $password = "vlad94";
	private $user = "u519287019_user";
	private $host = "mysql.hostinger.com.ua";

	function __construct($n, $p, $u, $h) {
		$this->name = $n;
		$this->password = $p;
		$this->user = $u;
		$this->host = $h;
	}

	// Геттеры и сеттеры свойств
	//BEGIN
	public function getName() {
		return $this->name;
	}
	public function setName($n) {
		$this->name = $n;
	}

	public function getPassword() {
		return $this->password;
	}
	public function setPassword($pass) {
		$this->password = $pass;
	}

	public function getUser() {
		return $this->user;
	}
	public function setUser($u) {
		$this->user = $u;
	}

	public function getHost() {
		return $this->host;
	}
	public function setHost($h) { 
		$this->host = $h;
	}
	//END
}
?>