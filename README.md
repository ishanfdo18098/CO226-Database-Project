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
7) Close Shell
8) Open Apache config > httpd.conf from XAMPP main window.![image](https://user-images.githubusercontent.com/73381996/156097400-1724ad78-aff4-413e-ab9c-30c016565692.png)
9) In line 252 and 253, change "C:/xampp/htdocs" into the path of /server in this repo. ![image](https://user-images.githubusercontent.com/73381996/156095012-b48790b9-db9a-42a5-8090-29e87982af9f.png)
10) Start Apache and go to http://localhost/reset_db.php
11) Now the website is live at http://localhost/ 
12) Later, if you want to reset the databse. Go to http://localhost/reset_db.php

## How to upload to website
1) Make your changes in /server/ folder
2) In WSL or linux, Run command "make uploadncftp" at the cloned repo. ![image](https://user-images.githubusercontent.com/73381996/156109875-4573ffed-f691-4a13-b2d8-4e04116d7b1c.png)

- Note: You may need to install ncftp for the first time. To install, run "sudo apt update" then "sudo apt install ncftp"


## Team
- [Fernando K.A.I. - E/18/098](https://people.ce.pdn.ac.lk/students/e18/098/)
- [Fernando K.N.A. - E/18/100](https://people.ce.pdn.ac.lk/students/e18/100/)
- [Jayasundara J.W.K.R.B. - E/18/155](https://people.ce.pdn.ac.lk/students/e18/155/)

## ER Diagram 

![ERDIAGRAM](./ER%20Diagram/ER_DIAGRAM.png)

## Relational Schema Diagram
![Relational Schema Diagram](./ER%20Diagram/Relational_schema_diagram.png)
