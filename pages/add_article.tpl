 	<html>
		<head>
			<title>Вход на сайт</title>

		<script>
			function some(){
				$('#form').append('<input type="text" name="name[]" class="my form-control" placeholder="Enter author"/>')
			}
		</script>
		</head>
		<body>
		<div class="form-group">
			<div class="row">
				<div align = "center" class="col-md-4"></div>
				<div align = "center" class="col-md-4">
					<div id="form">
					<h3>Add author</h3>
					<input type="text" name="name" class="my form-control" placeholder="Enter author"/>
				</div>
					<button class="btn my" onclick="some()"> ADD </button>
				</div>
			</div>
		</body>
	</html>