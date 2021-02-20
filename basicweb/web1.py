#!C:\xampp\htdocs\basicweb\venv\Scripts\python.exe
import cgi
print('Context-type:text/html\n')
Form = cgi.FieldStorage()
line = Form.getvalue('Lines')
print('<html>')
print('<head>')
print('<title>My Py Web</title>')
print('</head>')
print('<body>')
for i in range(int(line)):
    print('<b>{} Hello</b><br>'.format(i + 1))
print('</body>')
print('</html>')
