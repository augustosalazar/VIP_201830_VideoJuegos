import mysql.connector

cnx = mysql.connector.connect(user="root", password="password", host="servicioweb_db_1", database="down")
cursor = cnx.cursor()