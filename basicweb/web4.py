#!C:\xampp\htdocs\basicweb\venv\Scripts\python.exe
import csv

db = './AppData/Sqlite_Northwind.sqlite3'
print('Context-type:text/html\n')
print('<html>')
print('<head>')
print('<title>My Py Web</title>')
print('<meta charset="UTF-8">')
print('</head>')
print('<style>')
print('''table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
  margin-left: auto;
  margin-right: auto;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}''')
print('</style>')
print('<body>')
list_data = []
total = 0
curr_country = ""
curr_select = {}
skip_first = True
with open('./AppData/COVID.csv', mode='r', encoding='utf-8-sig', newline='') as fn:
    fr = csv.DictReader(fn)
    for i in fr:
        if i['WHO_region'] == 'EURO':
            if curr_country != i['Country']:
                curr_country = i['Country']
                if skip_first:
                    skip_first = False
                    continue
                list_data.append(curr_select)
            elif curr_country == i['Country']:
                curr_select = i
print('<table>')
print('<tr>')
print('<th>{}</th>'.format('ประเทศ'))
print('<th>{}</th>'.format('ติดเชื้อสะสม'))
print('<th>{}</th>'.format('ตาย'))
print('</tr>')
for y in range(list_data.__len__()):
    print('<tr>')
    print('<th>{}</th>'.format(list_data[y]['Country']))
    print('<th>{}</th>'.format(list_data[y]['Cumulative_cases']))
    print('<th>{}</th>'.format(list_data[y]['Cumulative_deaths']))
    print('</tr>')
print('</table>')
print('</body>')
print('</html>')
