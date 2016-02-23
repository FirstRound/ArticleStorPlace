%name, email, passw = User.get_values()

 	<html>
		<head>
			<title>Вход на сайт</title>
		</head>
		<body>
		<div class="form-group">
			<div class="row">
				<div align = "center" class="col-md-4"></div>
				<div align = "center" class="col-md-4">
					<h3>Login</h3>
					<form action="" method="post" class="form-horizontal">
						 <div class="control-group">
							<br/>
							<label for="name" class="control-label">Login</label>
							<input type="text" name="name" 
							%if name != None:
							value="{{name}}" 
							%end
							class="form-control" placeholder="Enter login"/>
							
							<label for="pass" class="control-label">Password</label>
							<input type="password" name="pass" value="some" class="form-control" placeholder="Enter password"/>
							<br/>
							<button type="submit" class="btn btn-danger btn-lg btn-block">Login</button> 
							<br />
							<a class="btn btn-warning btn-lg btn-block" href="index?page=register">Registration</a>  
							<br />
						</div>
					</form>
				</div>
			</div>
		</body>
	</html>