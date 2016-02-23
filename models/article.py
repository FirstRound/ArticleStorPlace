class Article:
	data = {}

	def __init__(self):
		pass

	def __init__(self, t):
		a, b, c, d, e = t
		self.data["title"] = a
		self.data["doi"] = b
		self.data["pdf"] = c
		self.data["id"] = d
		self.data["rating"] = e

	def add_keywords(self, data):
		self.data["keywords"] = data

	def add_authors(self, data):
		self.data["authors"] = data

	def add_similar(self, sim):
		self.data["similar"] = sim

	def getValues(self):
		return self.data