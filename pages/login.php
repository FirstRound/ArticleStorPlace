<?php

	function Login($username, $password, $db) { 
		if ($username == "" or $password == "") 
			return false;
		$user = new UserController($db);
		$q = $user->login($username, $password);
		return $q;
	}
	//
	// Сброс авторизации.
	//
	function Logout() {
		User::Logout();
	}
	//
	// Точка входа.
	//
	if (count($_POST) > 0)
		$s = Login($_POST["name"], $_POST["pass"], $dbController);

	if ($s == true) {
		header("Location: index.php");
		exit();
	} 
?>
 	<html>
		<head>
			<title>Вход на сайт</title>
		</head>
		<body>
		<div class="form-group">
			<div class="row">
				<div align = "center" class="col-md-4"></div>
				<div align = "center" class="col-md-4">
					<h3>Вход на сайт</h3>
					<form action="" method="post" class="form-horizontal">
						 <div class="control-group">
							<br/>
							<label for="name" class="control-label">Логин</label>
							<input type="text" name="name" class="form-control" placeholder="Введите логин"/>
							
							<label for="pass" class="control-label">Пароль</label>
							<input type="password" name="pass" class="form-control" placeholder="Введите пароль"/>
							<br/>
							<button type="submit" class="btn btn-info btn-lg btn-block">Войти</button> 
							<br />
							<button class="pull-right btn btn-success" href="index.php?page=registration">Регистрация</button>  
						</div>
					</form>
				</div>
			</div>
		</body>
	</html>