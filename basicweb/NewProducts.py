#!C:\xampp\htdocs\basicweb\venv\Scripts\python.exe
import cgi
from datetime import datetime

import pymongo

print('Context-type:text/html\n')
Form = cgi.FieldStorage()
Pro_ID = Form.getvalue('Pro_ID')
Pro_Type = Form.getvalue('Pro_Type')
Pro_Name = Form.getvalue('Pro_Name')
Pro_Price = Form.getvalue('Pro_Price')
Pro_Stock = Form.getvalue('Pro_Stock')

print('<html>')
print('<head>')
print('<title>My Py Web</title>')
print('</head>')
print('<body>')
connectTNIMongoDB = 'mongodb+srv://adisak:RPGnqPNGypIy6bQJ@cluster0.ffnxq.mongodb.net/<dbname>?retryWrites=true&w=majority'
with pymongo.MongoClient(connectTNIMongoDB) as conn:
    db = conn.get_database('TNIWeb')
    data = {'id': Pro_ID, 'type': Pro_Type, 'name': Pro_Name, 'price': float(Pro_Price), 'stock': int(Pro_Stock),
            'user': 'Danupol', 'date': datetime.now()}
    db['Products'].insert_one(data)
    print('<p>OK 200</p>')
print('</body>')
print('</html>')
