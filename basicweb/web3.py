#!C:\xampp\htdocs\basicweb\venv\Scripts\python.exe
import cgi
import sqlite3

db = './AppData/Sqlite_Northwind.sqlite3'
print('Context-type:text/html\n')
Form = cgi.FieldStorage()
CategoryName = Form.getvalue('Pro_Cat')
SortBy = "UnitPrice" if Form.getvalue('Pro_Sort') == "Price" else "ProductName" if Form.getvalue(
    'Pro_Sort') == "Product Name" else "Suppliers.CompanyName"
OrderBy = "ASC" if Form.getvalue('Pro_Sort_Type') == "Ascending" else "DESC"
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
with (sqlite3.connect(db)) as conn:
    conn.row_factory = sqlite3.Row
    sql_command = '''SELECT ProductName,Suppliers.CompanyName,Categories.CategoryName,UnitPrice FROM Products
                    INNER JOIN Suppliers,Categories
                    ON Products.SupplierId = Suppliers.SupplierID AND Products.CategoryId = Categories.CategoryID
                    Where Categories.CategoryName = "{}"
                    ORDER BY {} {}'''.format(CategoryName, SortBy, OrderBy)
    cursor = conn.execute(sql_command)
    for i in cursor:
        list_data.append(i)
print('<center><h1>พบข้อมูล {} รายการ</h1></center>'.format(list_data.__len__()))
print('<table>')
print('<tr>')
print('<th>{}</th>'.format('สินค้า'))
print('<th>{}</th>'.format('ซัพพลายเออร์'))
print('<th>{}</th>'.format('ประเภท'))
print('<th>{}</th>'.format('ราคา'))
print('</tr>')
for y in range(list_data.__len__()):
    print('<tr>')
    print('<th>{}</th>'.format(list_data[y]['ProductName']))
    print('<th>{}</th>'.format(list_data[y]['CompanyName']))
    print('<th>{}</th>'.format(list_data[y]['CategoryName']))
    print('<th><p style="text-align: right;">{:,.2f}</p></th>'.format(list_data[y]['UnitPrice']))
    print('</tr>')
print('</table>')
print('</body>')
print('</html>')
