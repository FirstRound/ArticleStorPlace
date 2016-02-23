import sys
sys.path.append('..\\')
import os
from bottle import route, run, SimpleTemplate, static_file, template, view, request

class ArticleView:
	artCont = ""
	def __init__(self, artCont):
		self.artCont = artCont

	def show_full_article_table(self, tab):
		articles = self.artCont.get_full_articles(tab)
		return articles

	def show_article_by_id(self, id):
		article = self.artCont.get_article_by_id(id)
		return article

	def show_similar_article(self, articles):
		self.artCont.get_similar_article(articles)

	def show_articles_by_keyword(self, key):
		a = self.artCont.get_articles_by_keyword(key)
		return a

	def show_articles_by_author(self, author):
		a = self.artCont.get_articles_by_author(author)
		return a


		