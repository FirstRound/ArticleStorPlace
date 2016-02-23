import psycopg2
import hashlib
import sys
 
from controllers.GlobalController import GlobalController
 
class WebDBController:
        dbname = ""
        user = ""
        password = ""
        cursor = 0
        db = None
        my_db = None
        cusor = 0
 
 
        def connect(self, dbname, user, password):
                self.cusor = GlobalController("db.txt")
                self.dbname = dbname
                self.user = user
                self.password = password
                try:
                        db = psycopg2.connect("dbname=%s user=%s password=%s" %
                                                                                                (self.dbname, self.user, self.password))
                        self.cursor = db.cursor()
 
                        self.cusor.connect()
                        self.db = db
                except:
                        print("ERROR!")
 
        def get_full_articles(self, tab):
                '''returns list of tuples'''
                tab = str(int(tab)*10)
                a = self.cusor.execute("SELECT * FROM article LIMIT(%s,10)" % (tab, ))
                return a
 
        def get_article_by_id(self, id):
                a = self.cusor.execute("SELECT * FROM article WHERE article.a_id=%s ;" % (id,))
                a[0].append("0")
                return a[0]
 
        def get_article_keywords_by_id(self, id):
                a = self.cusor.execute("SELECT word FROM k_t_a|keywords WHERE k_t_a.a_id=%s ;" % (id,))
                return a
 
        def get_article_authors_by_id(self, id):
                a = self.cusor.execute("SELECT name FROM a_t_au|author WHERE a_t_au.a_id=%s" % (id,))
                return a
 
        def get_similar_articles(self, id):
                #
                self.cursor.execute("select a.title, a.doi, a.pdf, a.a_id  from article a, keyword_to_article ka where a.a_id = ka.a_id AND ka.k_id in (SELECT k.k_id FROM keyword k, keyword_to_article ka WHERE ka.a_id = %s AND ka.k_id=k.k_id)AND a.a_id <> %s GROUP BY  a.a_id ORDER by count(a.a_id) LIMIT 5", (id,id))
                return self.cursor.fetchall()
 
        def get_top_keywords(self):
                #
                self.cursor.execute("select k.word from keyword k, keyword_to_article ka where k.k_id = ka.k_id group by k.word order by count(k.word) desc limit 15")
                return self.cursor.fetchall()
 
        def get_articles_by_keyword(self, key):
                key = key.replace(" ", "&")
                a = self.cusor.execute("select title,doi,pdf,a_id from k_t_a|article|keywords LIKE keywords.word=%s LIMIT(0,10) distinct" % (key,))
                return a
 
        def get_articles_by_author(self, author):
                author = author.replace(" ", "&")
                a = self.cusor.execute("select title,doi,pdf,a_id from a_t_au|article|author LIKE author.name=%s LIMIT(0,10) distinct" % (author,))
                return a
 
        def insert_user(self, user, passw, email):
                #
                try:
                        self.cursor.execute("insert into users (name,email,password) values(%s, %s, %s)", (user, email, passw))
                        self.db.commit()
                        return True
                except:
                        return False
 
        def get_all_conferences(self, tab):
                tab = str(int(tab)*10)
                a = self.cusor.execute("select name,issn,isbn,c_id from conference LIMIT(%s,10)" % (tab, ))
                return a
 
        def get_articles_to_conference(self, id, tab):
                tab = str(int(tab)*10)
                a = self.cusor.execute("select title,doi,pdf,a_id from a_t_c|article where a_t_c.c_id=%s LIMIT(%s,10) ;" % (id, tab))
                return a
 
        def get_conference_by_name(self, name):
                name = name.replace(" ", "&")
                a = self.cusor.execute("select name,isbn,issn,c_id from a_t_c|conference|article WHERE conference.name=%s LIMIT(0,10) " % (name,))
                return a
 
        def add_rate(self, id, rate, name):
                #
                self.cursor.execute("(select u_id from users where name=%s)", (name,))
                u_id = self.cursor.fetchone()
                self.cursor.execute('insert into votes values(%s, %s, %s )', (u_id, rate, id))
                self.db.commit()
 
        def get_rate(self, id, name):
                #
                self.cursor.execute("select v.vote from article a, votes v where a.a_id=%s and v.a_id=%s and v.u_id IN (select u_id from users where name=%s)", (id, id, name))
                return self.cursor.fetchone()
 
        def get_rated_articles(self, name):
                #
                self.cursor.execute("(select u_id from users where name=%s)", (name,))
                u_id = self.cursor.fetchone()
                self.cursor.execute('select a.title, a.a_id from article a, votes v where a.a_id=v.a_id and v.u_id=%s order by vote desc limit 3', (u_id, ))
                return self.cursor.fetchall()
 
        def login(self, n, p):
                #
                try:
                        self.cursor.execute("select * from users where name=%s and password=%s", (n, p))
                        s = self.cursor.fetchall()
                        if(len(s) > 0):
                                return True
                        else:
                                return False
                except BaseException as e:
                        print(str(e))
                        return False