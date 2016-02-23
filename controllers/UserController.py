import sys
sys.path.append('..\\')
from models.user import User


class UserController:

	dbController = None

	def __init__(self, controller):
		self.dbController = controller

	def login(self, n, p):
		if self.dbController.login(n, p):
			User.login()
			User.set_values(n, "", p)
		else:
			User.logout()
		return User.is_login()

	def get_rated_articles(self):
		return self.dbController.get_rated_articles(User.get_name())

	def get_article_rating(self, id):
		return self.dbController.get_rate(id, User.get_name())

	def add_rate(self, id, rate):
		self.dbController.add_rate(id, str(int(float(rate)*2)), User.get_name())

	def logout(self):
		User.logout

	def is_logged(self):
		return User.is_login()