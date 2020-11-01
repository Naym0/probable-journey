import mysql.connector
import xml.etree.ElementTree as ET

mydb = mysql.connector.connect(
  host="127.0.0.1",
  user="root",
  password="Admin",
  database="xml"
)

# Table creation and inserting 1 row of data
mycursor = mydb.cursor()
mycursor.execute("CREATE TABLE students (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), email VARCHAR(255))")
sql = "INSERT INTO students (id, name, email) VALUES (%s, %s, %s)"
val = ("101112", "Nicole Muswanya", "nicole.muswanya@strathmore.edu")
mycursor.execute(sql, val)
mydb.commit()

# Retrieve data in db
mycursor.execute("SELECT id FROM students")
myid = mycursor.fetchone()
mycursor.execute("SELECT name FROM students")
myname = mycursor.fetchone()
mycursor.execute("SELECT email FROM students")
myemail = mycursor.fetchone()


########### TO CREATE AND WRITE INTO XML DOCUMENT ###########


# This is the parent (root) tag onto which other tags would be created
data = ET.Element('User')

# Adding subtags inside our root tag
element1 = ET.SubElement(data, 'ID') 
element2 = ET.SubElement(data, 'Name') 
element3 = ET.SubElement(data, 'Email') 

# display the data
element1.text = str(myid)
element2.text = str(myname)
element3.text = str(myemail)

# Converting the xml data to byte object, for allowing flushing data to file stream 
b_xml = ET.tostring(data) 

# Opening a file under the name `user.xml`,with operation mode `wb` (write + binary)
# File will be found in the default user folder (C:/User/Nicole)
with open("user.xml", "wb") as f: 
    f.write(b_xml)
    print("File user.xml created successfully")
    
    
########### READING FROM THE XML DOCUMENT ###########

    
# Passing the path of the xml document to enable the parsing process 
tree = ET.parse('user.xml') 
  
# getting the parent tag of the xml document 
root = tree.getroot() 
  
# printing the attributes of the first tag from the parent
print("Below is the data read from the students.xml document")
print(root[0].text, root[1].text, root[2].text) 


