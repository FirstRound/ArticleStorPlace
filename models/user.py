from bottle import route, run, SimpleTemplate, static_file, template, view, request, redirect,response

class User:
	def set_values(n, e, p):
		response.set_cookie("name", n)
		response.set_cookie("email", e)
		response.set_cookie("passw", p)

	def get_name():
		print(request.get_cookie("name"))
		return request.get_cookie("name")

	def logout():
		response.set_cookie("name", "")
		response.set_cookie("email", "")
		response.set_cookie("passw", "")
		response.set_cookie("login", "")

	def login():
		response.set_cookie("login", "true")

	def get_values():
		return (request.get_cookie("name"), request.get_cookie("email"), request.get_cookie("passw"))

	def is_login():
		if (request.get_cookie("login") == "true"):
			return True
		else:
			return False