<?php

	function Login($username, $password, $db) { 
		if ($username == "" or $password == "") 
			return false;
		$user = new UserController($db);
		$q = $user->login($username, $password);
		return $q;
	}

	function Registration($username, $password, $db) {
		if ($username == "" or $password == "") 
			return false;
		$user = new UserController($db);
		$q = $user->registrate($username, $password);
		return $q;
	}


	if (count($_POST) > 0) {
		if ($_POST["pass"] == $_POST["confirm-pass"]) {
			$s = Registration($_POST["name"], $_POST["pass"], $dbController);
		}
	}

	if ($s == true) {
		Login($_POST["name"], $_POST["pass"], $dbController);
		header("Location: index.php");
		exit();
	} 

?>

<html>
		<head>
			<title>Регистрация</title>
		</head>
		<body>
		<div class="form-group">
			<div class="row">
				<div align = "center" class="col-md-4"></div>
				<div align = "center" class="col-md-4">
					<h3>Регистрация</h3>
					<form action="" method="post" class="form-horizontal" id="registration">
						 <div class="control-group">
							<br/>
							<label for="username" class="control-label">Логин</label>
							<input type="text" name="name" class="form-control" placeholder="Введите логин"/>
							 
							<label for="pass" class="control-label">Пароль</label>
							<input type="password" name="pass" class="form-control" placeholder="Введите пароль"/>
							<label for="confirm-pass" class="control-label">Подтвердите пароль</label>
							<input type="password" name="confirm-pass" class="form-control" placeholder="Введите пароль еще раз"/>
							<br/>
							<button type="submit" class="btn btn-info btn-lg btn-block">Зарегистрироваться</button> 
							<br />
						</div>
					</form>
				</div>
			</div>
		</body>
	</html>