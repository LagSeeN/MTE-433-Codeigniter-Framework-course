#!C:\xampp\htdocs\webapi\venv\Scripts\python.exe
import myDatabase
import json

print('Content-type:text/html\n')
db = myDatabase.connectDatabase()
myCursor = db.cursor()
sql_command = 'select * from products'
myCursor.execute(sql_command)
rows = myCursor.fetchall()
# print("{}".format(rows))
result = []
for i in rows:
    data = {
        'id': '{}'.format(i['ProductID']),
        'name': '{}'.format(i['ProductName']),
        'price': '{}'.format(i['UnitPrice'])
    }
    result.append(data)
print(json.dumps(result))
