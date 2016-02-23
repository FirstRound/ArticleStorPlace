import sys
sys.path.append('..\\')
from models.article import Article
from controllers.WebDBController import WebDBController
import copy

class ArticleController:
	"""Use DB to get data and other operations with acticle model"""
	articles = []
	dbController = None

	def __init__(self, controller):
		self.dbController = controller

	def get_full_articles(self, tab):
		data = []
		articles = []
		try:
			data = self.dbController.get_full_articles(tab)
			#articles = self.make_objects(data)
		except Exception as e:
			print(e)
		return data

	def get_article_by_id(self, id):
		data = None
		keywords = []
		authors = []
		data = self.dbController.get_article_by_id(id)
		keywords = self.dbController.get_article_keywords_by_id(id)
		authors = self.dbController.get_article_authors_by_id(id)
		return self.make_object(data, keywords, authors)

	def get_similar_article(self, article):
		similar = self.dbController.get_similar_articles(article.getValues()["id"])
		article.add_similar(similar)

	def get_articles_by_keyword(self, key):
		articles = self.dbController.get_articles_by_keyword(key)
		return articles

	def get_articles_by_author(self, author):
		articles = self.dbController.get_articles_by_author(author)
		return articles

	def get_top_keywords(self):
		keys = self.dbController.get_top_keywords()
		return keys

	def create_new_account(self, user, passw, email):
		return self.dbController.insert_user(user, passw, email)

	def get_articles_to_conference(self,conf, tab):
		return self.dbController.get_articles_to_conference(conf, tab)


	def make_object(self, data, keys, authors):
		art = Article(data)
		art.add_keywords(keys)
		art.add_authors(authors)
		return art

	def make_objects(self, rows):
		data = list()
		for i in range(0, len(rows)):
			data.append(rows[i])
		for i in data:
			print(i)
		return data

