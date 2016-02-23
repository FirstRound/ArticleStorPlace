#!/usr/bin/env python

import os
from bottle import route, run, SimpleTemplate, static_file, template, view, request, post, redirect
import time
from models.user import User
from controllers.UserController import UserController
from controllers.WebDBController import WebDBController

dbname = "knbase"
user = "postgres"
password = "root"

dbController = WebDBController()
dbController.connect(dbname, user, password)
uCont = UserController(dbController)

@route('/js/<filename>')
def js_static(filename):
	return static_file(filename, root='./js')

@route('/images/<filename>')
def img_static(filename):
	return static_file(filename, root='./images')
	
@route('/images/patterns/<filename>')
def img_patterns_static(filename):
	return static_file(filename, root='./images/patterns')

@route('/asset/css/<filename>')
def asset_css_static(filename):
	return static_file(filename, root='./asset/css')

@route('/asset/js/<filename>')
def asset_css_static(filename):
	return static_file(filename, root='./asset/js')

@route('/images/Portfolio/<filename>')
def img_portfolio_static(filename):
	return static_file(filename, root='./images/Portfolio')

@route('/images/slider/<filename>')
def img_slider_static(filename):
	return static_file(filename, root='./images/slider')

@route('/css/<filename>')
def css_static(filename):
    return static_file(filename, root='./css')

@route('/fonts/<filename>')
def fonts_static(filename):
    return static_file(filename, root='./fonts')

@route('/css/colors/<filename>')
def css_static_path(filename):
    return static_file(filename, root='./css/colors')

@route('/<filename>')
def index(filename):
	tpl = SimpleTemplate(name = "./" + filename+".html")
	return tpl.render()

@post('/index') # or @route('/login', method='POST')
def do_login():
	if (request.query.page == "register"):
		username = request.forms.get('name')
		password = request.forms.get('pass')
		email = request.forms.get("email")
		tpl = SimpleTemplate(name = "./index.html")
		return tpl.render(reg = (username, password, email))

	elif(request.query.page == "login"):
		if (User.is_login() == False):
			if(uCont.login(request.forms.get('name'), request.forms.get('pass'))):
				return template("./reg_ok")
			else: 
				redirect("./index?page=login")

		else:
			return template("./reg_ok")
	elif (request.query.page == "article"):
		print("here")
		rate = request.forms.get("rating")
		id = request.query.id
		uCont.add_rate(id, rate)
		tpl = SimpleTemplate(name = "./index.html")
		return tpl.render()


run(host='localhost', port=8080)