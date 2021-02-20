#!C:\xampp\htdocs\basicweb\venv\Scripts\python.exe
import cgi

print('Context-type:text/html\n')
Form = cgi.FieldStorage()
Message = Form.getvalue('Message')
Col = Form.getvalue('Cols')
Row = Form.getvalue('Rows')
print('<html>')
print('<head>')
print('<title>My Py Web</title>')
print('</head>')
print('<body>')
print('<center>')
print('<table cellspacing="0" cellpadding="0">')
for y in range(int(Col)):
    print('<tr {}'.format('style="background-color:red;">' if y % 2 == 0 else 'style="background-color:blue">'))
    for x in range(int(Row)):
        # if x == y:
        # print('<th style="padding: 10px;"><a href="https://www.tni.ac.th" target="_blank"><img src="image/rocket.png" width="50px" height="50px"></a></th>')
        # else:
        print('<th style="padding: 10px;">{}</th>'.format(Message))
    print('</tr>')
print('</table>')
print('</center>')
print('</body>')
print('</html>')
