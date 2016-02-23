import sys
sys.path.append('..\\')
from models.conference import Conference
from controllers.WebDBController import WebDBController
import copy

class ConferenceController:
	"""Use DB to get data and other operations with conference model"""
	dbController = None

	def __init__(self, controller):
		self.dbController = controller

	def get_all_conferences(self, tab):
		return self.dbController.get_all_conferences(tab)

	def get_conference_by_name(self, name):
		return self.dbController.get_conference_by_name(name)

