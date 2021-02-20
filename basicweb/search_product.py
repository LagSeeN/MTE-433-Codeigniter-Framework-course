#!C:\xampp\htdocs\basicweb\venv\Scripts\python.exe
import sqlite3

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
cat_list_data = []
with (sqlite3.connect(db)) as conn:
    conn.row_factory = sqlite3.Row
    sql_command = '''SELECT distinct Categories.CategoryName FROM Products
                    INNER JOIN Suppliers,Categories ON Products.SupplierId = Suppliers.SupplierID AND Products.CategoryId = Categories.CategoryID'''
    cursor = conn.execute(sql_command)
    for i in cursor:
        cat_list_data.append(i)
print('</style>')
print('<body>')
print('<form action="web3.py" method="post">')
print('<table>')
print('<tr>')
print('<th>')
print('Choose Category : ')
print('</th>')
print('<th>')
print('<select name="Pro_Cat">')
for i in range(cat_list_data.__len__()):
    print('<option value="{}">{}</option>'.format(cat_list_data[i]["CategoryName"], cat_list_data[i]["CategoryName"]))
print('</th>')
print('</select>')
print('</tr>')
print('<tr>')
print('<th>')
print('Sort : ')
print('</th>')
print('<th>')
print('<select name="Pro_Sort">')
print('<option value="Price">Price</option>')
print('<option value="Product_Name">Product Name</option>')
print('<option value="Supplier_Name">Supplier Name</option>')
print('</select>')
print('</th>')
print('</tr>')
print('<tr>')
print('<th>')
print('Sort Type : ')
print('</th>')
print('<th>')
print('<select name="Pro_Sort_Type">')
print('<option value="Ascending">Ascending</option>')
print('<option value="Descending">Descending</option>')
print('</select>')
print('</th>')
print('</tr>')
print('<tr>')
print('<th colspan="2"><center><input type="submit" value="แสดงข้อมูล"></center></th>')
print('</tr>')
print('</table>')
print('</form>')
print('</body>')
print('</html>')
