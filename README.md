# CO226-Database-Project

## DATABASE MANAGEMENT SYSTEM FOR :
# INTERNSHIP ALLOCATION FOR DEPARTMENT OF COMPUTER ENGINEERING
## DESCRIPTION :
A Database to manage the allocation of internships in Companies for Students of the department of Computer Engineering under the supervision of the Staff through Student profiling, Company profiling and creating an interface between Students, Staff and Companies.

## How to test the website locally

1) Install XAMPP https://www.apachefriends.org/download.html
2) Start MySQL and open Shell
3) Login to MySQL command line using "mysql -u root"
4) Run command "CREATE USER 'id18333488_user'@'localhost' IDENTIFIED BY 'wGskxx!o>b=8Rj8)';"
5) Run command "GRANT ALL PRIVILEGES ON * . * TO 'id18333488_user'@'localhost';"
6) Run command "create database id18333488_site;"
7) Run command "use id18333488_site;"
8) Run the commands from SQL/create_tables.sql and SQL/insert_data.sql in the mysql shell
9) Close Shell
10) Open Apache config > httpd.conf from XAMPP main window.![image](https://user-images.githubusercontent.com/73381996/156097400-1724ad78-aff4-413e-ab9c-30c016565692.png)
11) In line 252 and 253, change "C:/xampp/htdocs" into the path of /server in this repo. ![image](https://user-images.githubusercontent.com/73381996/156095012-b48790b9-db9a-42a5-8090-29e87982af9f.png)
12) Start Apache and go to http://localhost/ using your webbrowser.


## Team
- [Fernando K.A.I. - E/18/098](https://people.ce.pdn.ac.lk/students/e18/098/)
- [Fernando K.N.A. - E/18/100](https://people.ce.pdn.ac.lk/students/e18/100/)
- [Jayasundara J.W.K.R.B. - E/18/155](https://people.ce.pdn.ac.lk/students/e18/155/)

## ER Diagram 

![ERDIAGRAM](./ER%20Diagram/ER_DIAGRAM.png)

## Relational Schema Diagram
![Relational Schema Diagram](./ER%20Diagram/Relational_schema_diagram.png)
