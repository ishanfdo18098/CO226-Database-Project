<?php
require("./functions.php");

$sql = " -- MariaDB

-- when testing code. delete exisiting tables

-- dont use this on 000webhost

drop table student_works_in;
drop table supervises;
drop table student_skills;
drop table company_services;
drop table company_awards;
drop table requests;
drop table guides;
drop table instructs;
drop table student;
drop table supervisor;
drop table internship;
drop table instructor;
drop table lecturer;
drop table company;
drop table department;

create table company(
    company_id int primary key,
    name varchar(100),
    email varchar(100),
    ranking varchar(100),
    website_url varchar(100),
    description varchar(100),
    address_line1 varchar(100),
    address_line2 varchar(100),
    address_country varchar(50),
    address_state_province varchar(100)
);

create table supervisor ( 
    supervisor_id int primary key,
    name varchar(100),
    email varchar(100),
    password varchar(50),
    phone_number varchar(20),
    company_id int,
    constraint fk_supervisor_company
        foreign key (company_id) references company (company_id)
);

create table department (
    dep_name varchar(100) primary key,
    email varchar(100),
    website_url varchar(100),
    students_url varchar(100),
    projects_url varchar(100)
);


create table student (
    e_no varchar(9) primary key,
    email varchar(100),
    password varchar(50),
    first_name varchar(100),
    last_name varchar(100),
    preferred_name varchar(100),
    surname_with_initials varchar(100),
    cv varchar(100),
    department_name varchar(100),
    constraint fk_student
        foreign key (department_name) references department (dep_name)
);

create table internship (
    internship_id int primary key,
    name varchar(100),
    company_id int,
    time_period varchar(50),
    mode_location varchar(50),
    type varchar(50),
    salary_allowance int,
    constraint fk_internship
        foreign key (company_id) references company (company_id)
);

create table instructor (
    instructor_id int primary key,
    name varchar(100),
    email varchar(100),
    password varchar(50),
    phone_number varchar(15),
    deparment_name varchar(100),
    constraint fk_instructor
        foreign key (deparment_name) references department (dep_name)
);

create table lecturer (
    lecturer_id int primary key,
    name varchar(100),
    email varchar(100),
    password varchar(50),
    phone_number varchar(15),
    deparment_name varchar(100),
    constraint fk_lecturer
        foreign key (deparment_name) references department (dep_name)
);

create table instructs (
    instructor_id int,
    e_no varchar(9),
    primary key(instructor_id,e_no),
    constraint fk_instructs
        foreign key (instructor_id) references instructor (instructor_id),
        foreign key (e_no) references student (e_no)
);

create table guides (
    lecturer_id int,
    e_no varchar(9),
    primary key(lecturer_id,e_no),
    constraint fk_guides
        foreign key (lecturer_id) references lecturer (lecturer_id),
        foreign key (e_no) references student (e_no)
);

create table requests (
    internship_id int,
    e_no varchar(9),
    date varchar(30),
    primary key(internship_id,e_no),
    constraint fk_requests
        foreign key (internship_id) references internship (internship_id),
        foreign key (e_no) references student (e_no)
);

create table student_skills (
    e_no varchar(9),
    skills varchar(50),
    primary key(skills,e_no),
    constraint fk_skills
        foreign key (e_no) references student (e_no)
);

create table company_services (
    company_id int,
    services varchar(50),
    primary key(company_id,services),
    constraint fk_services 
        foreign key (company_id) references company (company_id)
);

create table company_awards (
    company_id int,
    awards varchar(50),
    primary key(company_id,awards),
    constraint fk_awards
        foreign key (company_id) references company (company_id)
);

create table supervises (
    supervisor_id int,
    e_no varchar(9),
    primary key(supervisor_id,e_no),
    constraint fk_supervises
        foreign key (supervisor_id) references supervisor (supervisor_id)
);

create table student_works_in (
    e_no varchar(9) primary key,
    internship_id int,
    constraint fk_student_works_in
        foreign key (e_no) references student (e_no),
        foreign key (internship_id) references internship (internship_id)
);


-- MariaDB


insert into department values 
('Department of Computer Engineering','head@ce.pdn.ac.lk','http://ce.pdn.ac.lk','http://people.ce.pdn.ac.lk','https://projects.ce.pdn.ac.lk'),
('Department of Mechanical Engineering','head@me.pdn.ac.lk','http://me.pdn.ac.lk','http://siteNotFound.me.pdn.ac.lk','https://notFound.me.pdn.ac.lk'),
('Department of Manufacturing & Industrial Engineering','head@mie.pdn.ac.lk','http://mie.pdn.ac.lk','http://siteNotFound.mie.pdn.ac.lk','https://notFound.mie.pdn.ac.lk');


-- this was generated using the API from api.ce.pdn.ac.lk and python scripting
INSERT INTO student VALUES
('E/16/012','e16012@eng.pdn.ac.lk','e16012','','Adikari','Adikari','','','Department of Computer Engineering'),
('E/16/022','e16022@eng.pdn.ac.lk','e16022','','Amarasinghe D.L.C.','Amarasinghe D.L.C.','','','Department of Computer Engineering'),
('E/16/025','e16025@eng.pdn.ac.lk','e16025','','Amasith K.T.D.','Amasith K.T.D.','','','Department of Computer Engineering'),
('E/16/039','e16039@eng.pdn.ac.lk','e16039','','Balasuriya B.M.N.U. Ms','Balasuriya B.M.N.U. Ms','','','Department of Computer Engineering'),
('E/16/049','e16049@eng.pdn.ac.lk','e16049','','Harshana Bandara','Harshana Bandara','','','Department of Computer Engineering'),
('E/16/054','e16054@eng.pdn.ac.lk','e16054','','Basnayake S.S.','Basnayake S.S.','','','Department of Computer Engineering'),
('E/16/055','e16055@eng.pdn.ac.lk','e16055','','Bragadeeshan S.','Bragadeeshan S.','','','Department of Computer Engineering'),
('E/16/057','e16057@eng.pdn.ac.lk','e16057','','Kavindu Chamith','Kavindu Chamith','','','Department of Computer Engineering'),
('E/16/061','e16061@eng.pdn.ac.lk','e16061','Madushan Chandula','Chandula','J.P.D.M. Chandula','','','Department of Computer Engineering'),
('E/16/068','e16068@eng.pdn.ac.lk','e16068','','De Silva K.R.','De Silva K.R.','','','Department of Computer Engineering'),
('E/16/069','e16069@eng.pdn.ac.lk','e16069','','De Silva M.D.S. Ms','De Silva M.D.S. Ms','','','Department of Computer Engineering'),
('E/16/070','e16070@eng.pdn.ac.lk','e16070','Chaminie De Silva','Chaminie','N. S. C. K. S. De Silva','','','Department of Computer Engineering'),
('E/16/076','e16076@eng.pdn.ac.lk','e16076','Chamli Deshan','Deshan','L.A.C. Deshan','','','Department of Computer Engineering'),
('E/16/081','e16081@eng.pdn.ac.lk','e16081','Praveen Dhananjaya','Praveen','J.M.Praveen Dhananjaya','','','Department of Computer Engineering'),
('E/16/083','e16083@eng.pdn.ac.lk','e16083','Viraj Dhanushka','Viraj','S.M. Viraj Dhanushka','','','Department of Computer Engineering'),
('E/16/086','e16086@eng.pdn.ac.lk','e16086','','Dharmathilaka A.L.V.H. Ms','Dharmathilaka A.L.V.H. Ms','','','Department of Computer Engineering'),
('E/16/087','e16087@eng.pdn.ac.lk','e16087','','Dissanayaka W.M.S.C. Ms','Dissanayaka W.M.S.C. Ms','','','Department of Computer Engineering'),
('E/16/088','e16088@eng.pdn.ac.lk','e16088','','Dissanayake D.M.T.H.','Dissanayake D.M.T.H.','','','Department of Computer Engineering'),
('E/16/089','e16089@eng.pdn.ac.lk','e16089','Denuke Dissanayake','Denuke','N.A.D.D. Dissanayake','','','Department of Computer Engineering'),
('E/16/094','e16094@eng.pdn.ac.lk','e16094','','Shirly Madushanka','Shirly Madushanka','','','Department of Computer Engineering'),
('E/16/096','e16096@eng.pdn.ac.lk','e16096','','Ekanayake J.E.M.D.Y. Ms','Ekanayake J.E.M.D.Y. Ms','','','Department of Computer Engineering'),
('E/16/115','e16115@eng.pdn.ac.lk','e16115','','Girishikan S.','Girishikan S.','','','Department of Computer Engineering'),
('E/16/126','e16126@eng.pdn.ac.lk','e16126','','Hansika D.G.N. Ms','Hansika D.G.N. Ms','','','Department of Computer Engineering'),
('E/16/127','e16127@eng.pdn.ac.lk','e16127','','Harshana P.Y.S.','Harshana P.Y.S.','','','Department of Computer Engineering'),
('E/16/134','e16134@eng.pdn.ac.lk','e16134','','Herath H.M.Y.B.','Herath H.M.Y.B.','','','Department of Computer Engineering'),
('E/16/156','e16156@eng.pdn.ac.lk','e16156','','Jayathilaka H.A.D.T.T. Ms','Jayathilaka H.A.D.T.T. Ms','','','Department of Computer Engineering'),
('E/16/168','e16168@eng.pdn.ac.lk','e16168','','Kalpage S.W.','Kalpage S.W.','','','Department of Computer Engineering'),
('E/16/172','e16172@eng.pdn.ac.lk','e16172','','Karikaran V.','Karikaran V.','','','Department of Computer Engineering'),
('E/16/173','e16173@eng.pdn.ac.lk','e16173','','Karunarathna D.A.D.T.','Karunarathna D.A.D.T.','','','Department of Computer Engineering'),
('E/16/200','e16200@eng.pdn.ac.lk','e16200','Sumudu Liyanage','Sumudu','B. L. S. Lakmali','','','Department of Computer Engineering'),
('E/16/203','e16203@eng.pdn.ac.lk','e16203','Isuru Lakshan','Isuru','S.A.I Lakshan','','','Department of Computer Engineering'),
('E/16/217','e16217@eng.pdn.ac.lk','e16217','','Madushan K.H.G.H.','Madushan K.H.G.H.','','','Department of Computer Engineering'),
('E/16/222','e16222@eng.pdn.ac.lk','e16222','','Wishva','Wishva','','','Department of Computer Engineering'),
('E/16/223','e16223@eng.pdn.ac.lk','e16223','','Madushanki K.H.H.C. Ms','Madushanki K.H.H.C. Ms','','','Department of Computer Engineering'),
('E/16/232','e16232@eng.pdn.ac.lk','e16232','Shamra Marzook','Shamra','F.S. Marzook','','','Department of Computer Engineering'),
('E/16/242','e16242@eng.pdn.ac.lk','e16242','','A.V.S.S.A Munasinghe','A.V.S.S.A Munasinghe','','','Department of Computer Engineering'),
('E/16/261','e16261@eng.pdn.ac.lk','e16261','','Nuwantha B.L.A.','Nuwantha B.L.A.','','','Department of Computer Engineering'),
('E/16/267','e16267@eng.pdn.ac.lk','e16267','','Parackrama G.T.W. Ms','Parackrama G.T.W. Ms','','','Department of Computer Engineering'),
('E/16/275','e16275@eng.pdn.ac.lk','e16275','Hashan Eranga','Hashan','A. L. H. E Perera','','','Department of Computer Engineering'),
('E/16/276','e16276@eng.pdn.ac.lk','e16276','Buddhi Perera','Buddhi','Perera G.K.B.H.','','','Department of Computer Engineering'),
('E/16/286','e16286@eng.pdn.ac.lk','e16286','Nuwan Piyarathna','Nuwan','M.G.N.H.Piyarathna','','','Department of Computer Engineering'),
('E/16/290','e16290@eng.pdn.ac.lk','e16290','','Kalani Prabodha','Kalani Prabodha','','','Department of Computer Engineering'),
('E/16/313','e16313@eng.pdn.ac.lk','e16313','','Maneesha Randeniya','Maneesha Randeniya','','','Department of Computer Engineering'),
('E/16/319','e16319@eng.pdn.ac.lk','e16319','','Rathnayaka R.P.V.N.','Rathnayaka R.P.V.N.','','','Department of Computer Engineering'),
('E/16/320','e16320@eng.pdn.ac.lk','e16320','','Rathnayake E.W.S.P.','Rathnayake E.W.S.P.','','','Department of Computer Engineering'),
('E/16/332','e16332@eng.pdn.ac.lk','e16332','Randika Viraj','Randika','A A R V Samaraweera','','','Department of Computer Engineering'),
('E/16/351','e16351@eng.pdn.ac.lk','e16351','','Shanaka T.K.M.','Shanaka T.K.M.','','','Department of Computer Engineering'),
('E/16/360','e16360@eng.pdn.ac.lk','e16360','','Somarathna N.C.D.','Somarathna N.C.D.','','','Department of Computer Engineering'),
('E/16/364','e16364@eng.pdn.ac.lk','e16364','Tharushi Suwaris','Tharushi','T.T.N. Suwaris','','','Department of Computer Engineering'),
('E/16/366','e16366@eng.pdn.ac.lk','e16366','Dinindu Thilakarathna','Dinindu','Thilakarathna W.M.D.U.','','','Department of Computer Engineering'),
('E/16/368','e16368@eng.pdn.ac.lk','e16368','','Thisanke M.K.H.','Thisanke M.K.H.','','','Department of Computer Engineering'),
('E/16/369','e16369@eng.pdn.ac.lk','e16369','','Rusiru Thushara','Rusiru Thushara','','','Department of Computer Engineering'),
('E/16/377','e16377@eng.pdn.ac.lk','e16377','','Vindula I.B.S.','Vindula I.B.S.','','','Department of Computer Engineering'),
('E/16/388','e16388@eng.pdn.ac.lk','e16388','','Weerasundara W.M.T.M.P.B.','Weerasundara W.M.T.M.P.B.','','','Department of Computer Engineering'),
('E/16/389','e16389@eng.pdn.ac.lk','e16389','','Welikanda V.H.L.N.','Welikanda V.H.L.N.','','','Department of Computer Engineering'),
('E/16/394','e16394@eng.pdn.ac.lk','e16394','','Wijayasinghe S.D.D.D.','Wijayasinghe S.D.D.D.','','','Department of Computer Engineering'),
('E/16/396','e16396@eng.pdn.ac.lk','e16396','','Wijekoon W.M.T.S.','Wijekoon W.M.T.S.','','','Department of Computer Engineering'),
('E/16/399','e16399@eng.pdn.ac.lk','e16399','','Erandana Wijerathne','Erandana Wijerathne','','','Department of Computer Engineering'),
('E/17/004','e17004@eng.pdn.ac.lk','e17004','','Abeyweera S.K.','Abeyweera S.K.','','','Department of Computer Engineering'),
('E/17/005','e17005@eng.pdn.ac.lk','e17005','','Ahamed M.I.R.','Ahamed M.I.R.','','','Department of Computer Engineering'),
('E/17/006','e17006@eng.pdn.ac.lk','e17006','','Alahakoon A.M.H.H.','Alahakoon A.M.H.H.','','','Department of Computer Engineering'),
('E/17/008','e17008@eng.pdn.ac.lk','e17008','','Alahakoon T.','Alahakoon T.','','','Department of Computer Engineering'),
('E/17/012','e17012@eng.pdn.ac.lk','e17012','','Amarasinghe R.A.A.U.','Amarasinghe R.A.A.U.','','','Department of Computer Engineering'),
('E/17/015','e17015@eng.pdn.ac.lk','e17015','','Arshadh M.R.M.','Arshadh M.R.M.','','','Department of Computer Engineering'),
('E/17/018','e17018@eng.pdn.ac.lk','e17018','Imesh Balasuriya','Imesh','I.S. Balasuriya','','','Department of Computer Engineering'),
('E/17/024','e17024@eng.pdn.ac.lk','e17024','','Bandara K.G.K.R.','Bandara K.G.K.R.','','','Department of Computer Engineering'),
('E/17/027','e17027@eng.pdn.ac.lk','e17027','','Bandara S.M.P.C.','Bandara S.M.P.C.','','','Department of Computer Engineering'),
('E/17/035','e17035@eng.pdn.ac.lk','e17035','','Chamika K.T.M.','Chamika K.T.M.','','','Department of Computer Engineering'),
('E/17/038','e17038@eng.pdn.ac.lk','e17038','','Chandrasekara C.M.A.','Chandrasekara C.M.A.','','','Department of Computer Engineering'),
('E/17/040','e17040@eng.pdn.ac.lk','e17040','','Chandrasena M.M.D.','Chandrasena M.M.D.','','','Department of Computer Engineering'),
('E/17/044','e17044@eng.pdn.ac.lk','e17044','','Coralage D.T.S.','Coralage D.T.S.','','','Department of Computer Engineering'),
('E/17/053','e17053@eng.pdn.ac.lk','e17053','','De Silva M.G.S.C.','De Silva M.G.S.C.','','','Department of Computer Engineering'),
('E/17/058','e17058@eng.pdn.ac.lk','e17058','Isuri Devindi','Isuri','G.A.I. Devindi','','','Department of Computer Engineering'),
('E/17/064','e17064@eng.pdn.ac.lk','e17064','','Dhushintha R.','Dhushintha R.','','','Department of Computer Engineering'),
('E/17/065','e17065@eng.pdn.ac.lk','e17065','','Dilhan M.A.K.','Dilhan M.A.K.','','','Department of Computer Engineering'),
('E/17/072','e17072@eng.pdn.ac.lk','e17072','Dinura Dissanayake','Dinura','D.M.D.R. Dissanayake','','','Department of Computer Engineering'),
('E/17/083','e17083@eng.pdn.ac.lk','e17083','','Ekanayake E.M.M.U.B.','Ekanayake E.M.M.U.B.','','','Department of Computer Engineering'),
('E/17/090','e17090@eng.pdn.ac.lk','e17090','','Francis F.B.A.H.','Francis F.B.A.H.','','','Department of Computer Engineering'),
('E/17/091','e17091@eng.pdn.ac.lk','e17091','','Gallage P.G.A.P.','Gallage P.G.A.P.','','','Department of Computer Engineering'),
('E/17/100','e17100@eng.pdn.ac.lk','e17100','','Gunathilaka R.M.S.M.','Gunathilaka R.M.S.M.','','','Department of Computer Engineering'),
('E/17/101','e17101@eng.pdn.ac.lk','e17101','','Gunathilaka S.P.A.U.','Gunathilaka S.P.A.U.','','','Department of Computer Engineering'),
('E/17/122','e17122@eng.pdn.ac.lk','e17122','','Isthikar F.S.','Isthikar F.S.','','','Department of Computer Engineering'),
('E/17/134','e17134@eng.pdn.ac.lk','e17134','','Kavindu Jayasooriya','Kavindu Jayasooriya','','','Department of Computer Engineering'),
('E/17/144','e17144@eng.pdn.ac.lk','e17144','Denuka Jayaweera','Denuka','K.P.C.D.B. Jayaweera','','','Department of Computer Engineering'),
('E/17/148','e17148@eng.pdn.ac.lk','e17148','','Kalpana M.W.V.','Kalpana M.W.V.','','','Department of Computer Engineering'),
('E/17/153','e17153@eng.pdn.ac.lk','e17153','','Karunachandra R.H.I.O.','Karunachandra R.H.I.O.','','','Department of Computer Engineering'),
('E/17/154','e17154@eng.pdn.ac.lk','e17154','Akila Karunanayake','Akila','A.I. Karunanayake','','','Department of Computer Engineering'),
('E/17/156','e17156@eng.pdn.ac.lk','e17156','','Karunarathna M.G.I.U.','Karunarathna M.G.I.U.','','','Department of Computer Engineering'),
('E/17/159','e17159@eng.pdn.ac.lk','e17159','','Kavinaya Y.','Kavinaya Y.','','','Department of Computer Engineering'),
('E/17/168','e17168@eng.pdn.ac.lk','e17168','','Kodagoda K.H.S.P.','Kodagoda K.H.S.P.','','','Department of Computer Engineering'),
('E/17/176','e17176@eng.pdn.ac.lk','e17176','','Kumara W.M.E.S.K.','Kumara W.M.E.S.K.','','','Department of Computer Engineering'),
('E/17/190','e17190@eng.pdn.ac.lk','e17190','','Liyanage S.N.','Liyanage S.N.','','','Department of Computer Engineering'),
('E/17/194','e17194@eng.pdn.ac.lk','e17194','','Madhushan R.','Madhushan R.','','','Department of Computer Engineering'),
('E/17/201','e17201@eng.pdn.ac.lk','e17201','','Madushani W.T.','Madushani W.T.','','','Department of Computer Engineering'),
('E/17/206','e17206@eng.pdn.ac.lk','e17206','','Manohara H.T.','Manohara H.T.','','','Department of Computer Engineering'),
('E/17/207','e17207@eng.pdn.ac.lk','e17207','','Marasinghe M.A.P.G.','Marasinghe M.A.P.G.','','','Department of Computer Engineering'),
('E/17/212','e17212@eng.pdn.ac.lk','e17212','','Morais K.W.G.A.N.D.','Morais K.W.G.A.N.D.','','','Department of Computer Engineering'),
('E/17/219','e17219@eng.pdn.ac.lk','e17219','','Nawarathna K.G.I.S.','Nawarathna K.G.I.S.','','','Department of Computer Engineering'),
('E/17/230','e17230@eng.pdn.ac.lk','e17230','','Nishankar S.','Nishankar S.','','','Department of Computer Engineering'),
('E/17/240','e17240@eng.pdn.ac.lk','e17240','','Nadeesha Diwakara','Nadeesha Diwakara','','','Department of Computer Engineering'),
('E/17/242','e17242@eng.pdn.ac.lk','e17242','','Perera C.R.M.','Perera C.R.M.','','','Department of Computer Engineering'),
('E/17/246','e17246@eng.pdn.ac.lk','e17246','','Perera K.S.D.','Perera K.S.D.','','','Department of Computer Engineering'),
('E/17/251','e17251@eng.pdn.ac.lk','e17251','','Perera S.S.','Perera S.S.','','','Department of Computer Engineering'),
('E/17/252','e17252@eng.pdn.ac.lk','e17252','','Perera U.A.K.K.','Perera U.A.K.K.','','','Department of Computer Engineering'),
('E/17/256','e17256@eng.pdn.ac.lk','e17256','','Piriyaraj S.','Piriyaraj S.','','','Department of Computer Engineering'),
('E/17/259','e17259@eng.pdn.ac.lk','e17259','','Piyumi Bhagya S','Piyumi Bhagya S','','','Department of Computer Engineering'),
('E/17/284','e17284@eng.pdn.ac.lk','e17284','','Rathnayaka R.L.D.A.S.','Rathnayaka R.L.D.A.S.','','','Department of Computer Engineering'),
('E/17/286','e17286@eng.pdn.ac.lk','e17286','','Rathnayaka R.M.T.N.K.','Rathnayaka R.M.T.N.K.','','','Department of Computer Engineering'),
('E/17/292','e17292@eng.pdn.ac.lk','e17292','','Rilwan M.M.M.','Rilwan M.M.M.','','','Department of Computer Engineering'),
('E/17/294','e17294@eng.pdn.ac.lk','e17294','','Rossmaree D.M.','Rossmaree D.M.','','','Department of Computer Engineering'),
('E/17/296','e17296@eng.pdn.ac.lk','e17296','Ravisha Rupasinghe','Ravisha','R.H. Rupasinghe','','','Department of Computer Engineering'),
('E/17/297','e17297@eng.pdn.ac.lk','e17297','Vishva Navanjana','Vishva','T.T.V.N. Rupasinghe','','','Department of Computer Engineering'),
('E/17/312','e17312@eng.pdn.ac.lk','e17312','','Sangarasekara S.A.I.U.','Sangarasekara S.A.I.U.','','','Department of Computer Engineering'),
('E/17/318','e17318@eng.pdn.ac.lk','e17318','','Udith Senanayake','Udith Senanayake','','','Department of Computer Engineering'),
('E/17/327','e17327@eng.pdn.ac.lk','e17327','','Shalha A.M.F.','Shalha A.M.F.','','','Department of Computer Engineering'),
('E/17/331','e17331@eng.pdn.ac.lk','e17331','Sathira Silva','Sathira','H.S.C. Silva','','','Department of Computer Engineering'),
('E/17/338','e17338@eng.pdn.ac.lk','e17338','','Srimal R.M.L.C.','Srimal R.M.L.C.','','','Department of Computer Engineering'),
('E/17/342','e17342@eng.pdn.ac.lk','e17342','','Mr. Tharmapalan Thanujan','Mr. Tharmapalan Thanujan','','','Department of Computer Engineering'),
('E/17/352','e17352@eng.pdn.ac.lk','e17352','','Isara Tillekeratne','Isara Tillekeratne','','','Department of Computer Engineering'),
('E/17/356','e17356@eng.pdn.ac.lk','e17356','Shashini Upekha','Shashini','H.P.S.Upekha','','','Department of Computer Engineering'),
('E/17/358','e17358@eng.pdn.ac.lk','e17358','Varnaraj','Varnaa','N.Varnaraj','','','Department of Computer Engineering'),
('E/17/369','e17369@eng.pdn.ac.lk','e17369','','Wannigama S.B.','Wannigama S.B.','','','Department of Computer Engineering'),
('E/17/379','e17379@eng.pdn.ac.lk','e17379','','Weerasinghe S.P.D.D.S.','Weerasinghe S.P.D.D.S.','','','Department of Computer Engineering'),
('E/17/380','e17380@eng.pdn.ac.lk','e17380','Shamal Weerasooriya','Shamal','Weerasooriya S.S.','','','Department of Computer Engineering'),
('E/17/388','e17388@eng.pdn.ac.lk','e17388','','Weragoda W.A.L.M.','Weragoda W.A.L.M.','','','Department of Computer Engineering'),
('E/17/398','e17398@eng.pdn.ac.lk','e17398','','Wijerathne I.D.H.S.D.','Wijerathne I.D.H.S.D.','','','Department of Computer Engineering'),
('E/17/405','e17405@eng.pdn.ac.lk','e17405','','Wijesinghe W.D.L.P.','Wijesinghe W.D.L.P.','','','Department of Computer Engineering'),
('E/17/407','e17407@eng.pdn.ac.lk','e17407','Hasara Wijesooriya','Hasara','H.D Wijesooriya','','','Department of Computer Engineering'),
('E/18/009','e18009@eng.pdn.ac.lk','e18009','','Abeyweera P.S.','Abeyweera P.S.','','','Department of Computer Engineering'),
('E/18/010','e18010@eng.pdn.ac.lk','e18010','','Abeywickrama A.K.D.A.S.','Abeywickrama A.K.D.A.S.','','','Department of Computer Engineering'),
('E/18/013','e18013@eng.pdn.ac.lk','e18013','','Abilash R.','Abilash R.','','','Department of Computer Engineering'),
('E/18/014','e18014@eng.pdn.ac.lk','e18014','','Ahamad I.L.A.','Ahamad I.L.A.','','','Department of Computer Engineering'),
('E/18/017','e18017@eng.pdn.ac.lk','e18017','','Aarah J.F.','Aarah J.F.','','','Department of Computer Engineering'),
('E/18/022','e18022@eng.pdn.ac.lk','e18022','','Amarasinghe D.I.','Amarasinghe D.I.','','','Department of Computer Engineering'),
('E/18/028','e18028@eng.pdn.ac.lk','e18028','','Ariyawansha P.H.J.U.','Ariyawansha P.H.J.U.','','','Department of Computer Engineering'),
('E/18/030','e18030@eng.pdn.ac.lk','e18030','','Aththanayaka A.M.S.','Aththanayaka A.M.S.','','','Department of Computer Engineering'),
('E/18/036','e18036@eng.pdn.ac.lk','e18036','','Bandara L.R.M.U.','Bandara L.R.M.U.','','','Department of Computer Engineering'),
('E/18/058','e18058@eng.pdn.ac.lk','e18058','','De Alwis K.K.M.','De Alwis K.K.M.','','','Department of Computer Engineering'),
('E/18/063','e18063@eng.pdn.ac.lk','e18063','','Dedigamuwa N.T.','Dedigamuwa N.T.','','','Department of Computer Engineering'),
('E/18/068','e18068@eng.pdn.ac.lk','e18068','','Devinda G.C.','Devinda G.C.','','','Department of Computer Engineering'),
('E/18/073','e18073@eng.pdn.ac.lk','e18073','','Dhananjaya W.M.T.','Dhananjaya W.M.T.','','','Department of Computer Engineering'),
('E/18/077','e18077@eng.pdn.ac.lk','e18077','','Dharmarathne N.S.','Dharmarathne N.S.','','','Department of Computer Engineering'),
('E/18/097','e18097@eng.pdn.ac.lk','e18097','','Eswaran M.','Eswaran M.','','','Department of Computer Engineering'),
('E/18/098','e18098@eng.pdn.ac.lk','e18098','Ishan Fernando','Ishan','K.A.I. Fernando','','','Department of Computer Engineering'),
('E/18/100','e18100@eng.pdn.ac.lk','e18100','Adeepa Fernando','Adeepa','Fernando K.N.A.','','','Department of Computer Engineering'),
('E/18/115','e18115@eng.pdn.ac.lk','e18115','','Gowsigan A.','Gowsigan A.','','','Department of Computer Engineering'),
('E/18/118','e18118@eng.pdn.ac.lk','e18118','','Gunarathna H.P.H.M.','Gunarathna H.P.H.M.','','','Department of Computer Engineering'),
('E/18/126','e18126@eng.pdn.ac.lk','e18126','','Gurusinghe D.C.','Gurusinghe D.C.','','','Department of Computer Engineering'),
('E/18/128','e18128@eng.pdn.ac.lk','e18128','','Hariharan R.','Hariharan R.','','','Department of Computer Engineering'),
('E/18/131','e18131@eng.pdn.ac.lk','e18131','','Hemachandra K.T.H.','Hemachandra K.T.H.','','','Department of Computer Engineering'),
('E/18/147','e18147@eng.pdn.ac.lk','e18147','Saadia Jameel','Saadia','S. Jameel','','','Department of Computer Engineering'),
('E/18/149','e18149@eng.pdn.ac.lk','e18149','','Jayakody J.M.I.H.','Jayakody J.M.I.H.','','','Department of Computer Engineering'),
('E/18/150','e18150@eng.pdn.ac.lk','e18150','','Jayarathna H.M.Y.S.','Jayarathna H.M.Y.S.','','','Department of Computer Engineering'),
('E/18/154','e18154@eng.pdn.ac.lk','e18154','','Jayasumana C.H.','Jayasumana C.H.','','','Department of Computer Engineering'),
('E/18/155','e18155@eng.pdn.ac.lk','e18155','','Jayasundara J.W.K.R.B.','Jayasundara J.W.K.R.B.','','','Department of Computer Engineering'),
('E/18/156','e18156@eng.pdn.ac.lk','e18156','','Jayathilake W.A.T.N.','Jayathilake W.A.T.N.','','','Department of Computer Engineering'),
('E/18/168','e18168@eng.pdn.ac.lk','e18168','','Karan R.','Karan R.','','','Department of Computer Engineering'),
('E/18/170','e18170@eng.pdn.ac.lk','e18170','','Karunarathna W.K.','Karunarathna W.K.','','','Department of Computer Engineering'),
('E/18/173','e18173@eng.pdn.ac.lk','e18173','','Kasthuripitiya K.A.I.M.','Kasthuripitiya K.A.I.M.','','','Department of Computer Engineering'),
('E/18/177','e18177@eng.pdn.ac.lk','e18177','','Khan A.K.M.S.','Khan A.K.M.S.','','','Department of Computer Engineering'),
('E/18/178','e18178@eng.pdn.ac.lk','e18178','','Kithmal P.G.S.','Kithmal P.G.S.','','','Department of Computer Engineering'),
('E/18/180','e18180@eng.pdn.ac.lk','e18180','','Kodituwakku M.K.N.M.','Kodituwakku M.K.N.M.','','','Department of Computer Engineering'),
('E/18/181','e18181@eng.pdn.ac.lk','e18181','','Konara K.M.S.L.','Konara K.M.S.L.','','','Department of Computer Engineering'),
('E/18/203','e18203@eng.pdn.ac.lk','e18203','','Madhusanka K.G.A.S.','Madhusanka K.G.A.S.','','','Department of Computer Engineering'),
('E/18/214','e18214@eng.pdn.ac.lk','e18214','Kushan Manahara','Kushan','H.K. Manahara','','','Department of Computer Engineering'),
('E/18/224','e18224@eng.pdn.ac.lk','e18224','','Mihiranga G.D.R.','Mihiranga G.D.R.','','','Department of Computer Engineering'),
('E/18/227','e18227@eng.pdn.ac.lk','e18227','','Mudalige D.H.','Mudalige D.H.','','','Department of Computer Engineering'),
('E/18/230','e18230@eng.pdn.ac.lk','e18230','','Munathanthri M.D.H.I.','Munathanthri M.D.H.I.','','','Department of Computer Engineering'),
('E/18/242','e18242@eng.pdn.ac.lk','e18242','','Nimnadi J.A.S.','Nimnadi J.A.S.','','','Department of Computer Engineering'),
('E/18/245','e18245@eng.pdn.ac.lk','e18245','','Nishani K.','Nishani K.','','','Department of Computer Engineering'),
('E/18/264','e18264@eng.pdn.ac.lk','e18264','','Prasanna N.W.G.L.M.','Prasanna N.W.G.L.M.','','','Department of Computer Engineering'),
('E/18/266','e18266@eng.pdn.ac.lk','e18266','','Premathilaka K.N.I.','Premathilaka K.N.I.','','','Department of Computer Engineering'),
('E/18/276','e18276@eng.pdn.ac.lk','e18276','','Rajasooriya J.M.','Rajasooriya J.M.','','','Department of Computer Engineering'),
('E/18/282','e18282@eng.pdn.ac.lk','e18282','Nethmi Sudeni','Nethmi','Ranasinghe R.A.N.S.','','','Department of Computer Engineering'),
('E/18/283','e18283@eng.pdn.ac.lk','e18283','','Ranasinghe R.D.J.M.','Ranasinghe R.D.J.M.','','','Department of Computer Engineering'),
('E/18/285','e18285@eng.pdn.ac.lk','e18285','','Ranasinghe S.M.T.S.C.','Ranasinghe S.M.T.S.C.','','','Department of Computer Engineering'),
('E/18/297','e18297@eng.pdn.ac.lk','e18297','','Rathnayake R.M.P.P.','Rathnayake R.M.P.P.','','','Department of Computer Engineering'),
('E/18/304','e18304@eng.pdn.ac.lk','e18304','','Rishad N.M.','Rishad N.M.','','','Department of Computer Engineering'),
('E/18/316','e18316@eng.pdn.ac.lk','e18316','','Sandaruwan V.B.','Sandaruwan V.B.','','','Department of Computer Engineering'),
('E/18/318','e18318@eng.pdn.ac.lk','e18318','','Sandunika S.A.P.','Sandunika S.A.P.','','','Department of Computer Engineering'),
('E/18/323','e18323@eng.pdn.ac.lk','e18323','','Seekkubadu H.D.','Seekkubadu H.D.','','','Department of Computer Engineering'),
('E/18/327','e18327@eng.pdn.ac.lk','e18327','','Senevirathna M.D.C.D.','Senevirathna M.D.C.D.','','','Department of Computer Engineering'),
('E/18/329','e18329@eng.pdn.ac.lk','e18329','','Sewwandi D.W.S.N.','Sewwandi D.W.S.N.','','','Department of Computer Engineering'),
('E/18/330','e18330@eng.pdn.ac.lk','e18330','','Sewwandi H.R.','Sewwandi H.R.','','','Department of Computer Engineering'),
('E/18/340','e18340@eng.pdn.ac.lk','e18340','','Subramanieam V.','Subramanieam V.','','','Department of Computer Engineering'),
('E/18/349','e18349@eng.pdn.ac.lk','e18349','','Thalisha W.G.A.P.','Thalisha W.G.A.P.','','','Department of Computer Engineering'),
('E/18/354','e18354@eng.pdn.ac.lk','e18354','','Tharaka K.K.D.R.','Tharaka K.K.D.R.','','','Department of Computer Engineering'),
('E/18/366','e18366@eng.pdn.ac.lk','e18366','','Thulasiyan Y.','Thulasiyan Y.','','','Department of Computer Engineering'),
('E/18/368','e18368@eng.pdn.ac.lk','e18368','','Uduwanage H.U.','Uduwanage H.U.','','','Department of Computer Engineering'),
('E/18/373','e18373@eng.pdn.ac.lk','e18373','','Vilakshan V.','Vilakshan V.','','','Department of Computer Engineering'),
('E/18/375','e18375@eng.pdn.ac.lk','e18375','','Vindula K.P.A.','Vindula K.P.A.','','','Department of Computer Engineering'),
('E/18/379','e18379@eng.pdn.ac.lk','e18379','Thamish Wanduragala','Thamish','T.D.B. Wanduragala','','','Department of Computer Engineering'),
('E/18/382','e18382@eng.pdn.ac.lk','e18382','','Weerarathne L.D.','Weerarathne L.D.','','','Department of Computer Engineering'),
('E/18/397','e18397@eng.pdn.ac.lk','e18397','','Wijerathne E.S.G.','Wijerathne E.S.G.','','','Department of Computer Engineering'),
('E/18/398','e18398@eng.pdn.ac.lk','e18398','','Wijerathne R.M.N.S.','Wijerathne R.M.N.S.','','','Department of Computer Engineering'),
('E/18/402','e18402@eng.pdn.ac.lk','e18402','','Wimalasiri K.H.C.T.','Wimalasiri K.H.C.T.','','','Department of Computer Engineering'),
('E/18/406','e18406@eng.pdn.ac.lk','e18406','','Zameer M.H.M.','Zameer M.H.M.','','','Department of Computer Engineering'),
('E/18/412','e18412@eng.pdn.ac.lk','e18412','','De Silva M.S.G.M.','De Silva M.S.G.M.','','','Department of Computer Engineering');


insert into company values
(1,'CompanyNo1','admin@company1.com','someRank1','https://google1.com','We are google1','addressline11','addressline21','country1','state1'),
(2,'companyNo2','admin@company2.com','someRank2','https://google2.com','We are google2','addressline12','addressline22','country1','state2'),
(3,'companyNo3','admin@company3.com','someRank3','https://google3.com','We are google3','addressline13','addressline23','country1','state3'),
(4,'companyNo4','admin@company4.com','someRank4','https://google4.com','We are google4','addressline14','addressline24','country1','state4'),
(5,'companyNo5','admin@company5.com','someRank5','https://google5.com','We are google5','addressline15','addressline25','country1','state5'),
(6,'companyNo6','admin@company6.com','someRank6','https://google6.com','We are google6','addressline16','addressline26','country1','state1'),
(7,'companyNo7','admin@company7.com','someRank7','https://google7.com','We are google7','addressline17','addressline27','country1','state2'),
(8,'companyNo8','admin@company8.com','someRank8','https://google8.com','We are google8','addressline18','addressline28','country1','state3'),
(9,'companyNo9','admin@company9.com','someRank9','https://google9.com','We are google9','addressline19','addressline29','country1','state4'),
(10,'companyNo10','admin@company10.com','someRank10','https://google10.com','We are google10','addressline110','addressline210','country1','state5'),
(11,'companyNo11','admin@company11.com','someRank11','https://google11.com','We are google11','addressline111','addressline210','country1','state1'),
(12,'companyNo12','admin@company12.com','someRank12','https://google12.com','We are google12','addressline112','addressline210','country1','state2'),
(13,'companyNo13','admin@company13.com','someRank13','https://google13.com','We are google13','addressline113','addressline210','country1','state3'),
(14,'companyNo14','admin@company14.com','someRank14','https://google14.com','We are google14','addressline114','addressline210','country1','state4'),
(15,'companyNo15','admin@company15.com','someRank15','https://google15.com','We are google15','addressline115','addressline210','country1','state5'),
(16,'companyNo16','admin@company16.com','someRank16','https://google16.com','We are google16','addressline116','addressline210','country1','state1'),
(17,'companyNo17','admin@company17.com','someRank17','https://google17.com','We are google17','addressline117','addressline210','country1','state2'),
(18,'companyNo18','admin@company18.com','someRank18','https://google18.com','We are google18','addressline118','addressline210','country1','state3'),
(19,'companyNo19','admin@company19.com','someRank19','https://google19.com','We are google19','addressline119','addressline210','country1','state4'),
(20,'companyNo20','admin@company20.com','someRank20','https://google20.com','We are google20','addressline120','addressline210','country1','state5');

insert into company_awards values 
(1,'Award1'),
(1,'Award2'),
(1,'Award3'),
(2,'Award1'),
(2,'Award2'),
(2,'Award3'),
(3,'Award1'),
(3,'Award2'),
(3,'Award3'),
(4,'Award1'),
(4,'Award2'),
(4,'Award3'),
(5,'Award1'),
(5,'Award2'),
(5,'Award3'),
(6,'Award1'),
(6,'Award2'),
(6,'Award3'),
(7,'Award1'),
(7,'Award2'),
(7,'Award3'),
(8,'Award1'),
(8,'Award2'),
(8,'Award3'),
(9,'Award1'),
(9,'Award2'),
(9,'Award3'),
(10,'Award1'),
(10,'Award2'),
(10,'Award3'),
(11,'Award1'),
(11,'Award2'),
(11,'Award3'),
(12,'Award1'),
(12,'Award2'),
(12,'Award3'),
(13,'Award1'),
(13,'Award2'),
(13,'Award3'),
(14,'Award1'),
(14,'Award2'),
(14,'Award3'),
(15,'Award1'),
(15,'Award2'),
(15,'Award3'),
(16,'Award1'),
(16,'Award2'),
(16,'Award3'),
(17,'Award1'),
(17,'Award2'),
(17,'Award3'),
(18,'Award1'),
(18,'Award2'),
(18,'Award3'),
(19,'Award1'),
(19,'Award2'),
(19,'Award3'),
(20,'Award1'),
(20,'Award2'),
(20,'Award3');

insert into company_services values 
(1,'Service1'),
(1,'Service2'),
(1,'Service3'),
(2,'Service1'),
(2,'Service2'),
(2,'Service3'),
(3,'Service1'),
(3,'Service2'),
(3,'Service3'),
(4,'Service1'),
(4,'Service2'),
(4,'Service3'),
(5,'Service1'),
(5,'Service2'),
(5,'Service3'),
(6,'Service1'),
(6,'Service2'),
(6,'Service3'),
(7,'Service1'),
(7,'Service2'),
(7,'Service3'),
(8,'Service1'),
(8,'Service2'),
(8,'Service3'),
(9,'Service1'),
(9,'Service2'),
(9,'Service3'),
(10,'Service1'),
(10,'Service2'),
(10,'Service3'),
(11,'Service1'),
(11,'Service2'),
(11,'Service3'),
(12,'Service1'),
(12,'Service2'),
(12,'Service3'),
(13,'Service1'),
(13,'Service2'),
(13,'Service3'),
(14,'Service1'),
(14,'Service2'),
(14,'Service3'),
(15,'Service1'),
(15,'Service2'),
(15,'Service3'),
(16,'Service1'),
(16,'Service2'),
(16,'Service3'),
(17,'Service1'),
(17,'Service2'),
(17,'Service3'),
(18,'Service1'),
(18,'Service2'),
(18,'Service3'),
(19,'Service1'),
(19,'Service2'),
(19,'Service3'),
(20,'Service1'),
(20,'Service2'),
(20,'Service3');

insert into supervisor values
(1,'supervisorName1','supervisor@company1.com','password123','077123456789',1),
(2,'supervisorName2','supervisor@company2.com','password123','077456789123',2),
(3,'supervisorName3','supervisor@company3.com','password123','077123456789',3),
(4,'supervisorName4','supervisor@company4.com','password123','077456789123',4),
(5,'supervisorName5','supervisor@company5.com','password123','077456789123',5),
(6,'supervisorName6','supervisor@company6.com','password123','077456789123',6),
(7,'supervisorName7','supervisor@company7.com','password123','077456789123',7),
(8,'supervisorName8','supervisor@company8.com','password123','077456789123',8),
(9,'supervisorName9','supervisor@company9.com','password123','077456789123',9),
(10,'supervisorName10','supervisor@company10.com','password123','077456789123',10),
(11,'supervisorName11','supervisor@company11.com','password123','077456789123',11),
(12,'supervisorName12','supervisor@company12.com','password123','077456789123',12),
(13,'supervisorName13','supervisor@company13.com','password123','077456789123',13),
(14,'supervisorName14','supervisor@company14.com','password123','077456789123',14),
(15,'supervisorName15','supervisor@company15.com','password123','077456789123',15),
(16,'supervisorName16','supervisor@company16.com','password123','077456789123',16),
(17,'supervisorName17','supervisor@company17.com','password123','077456789123',17),
(18,'supervisorName18','supervisor@company18.com','password123','077456789123',18),
(19,'supervisorName19','supervisor@company19.com','password123','077456789123',19),
(20,'supervisorName20','supervisor@company20.com','password123','077456789123',20);

insert into supervises values 
(1,'E/18/009'),
(2,'E/18/010'),
(3,'E/18/013'),
(4,'E/18/014'),
(5,'E/18/017'),
(6,'E/18/022'),
(7,'E/18/028'),
(8,'E/18/030'),
(9,'E/18/036'),
(10,'E/18/058'),
(11,'E/18/063'),
(12,'E/18/068'),
(13,'E/18/073'),
(14,'E/18/077'),
(15,'E/18/097'),
(16,'E/18/098'),
(17,'E/18/100'),
(18,'E/18/115'),
(18,'E/18/118'),
(19,'E/18/126'),
(20,'E/18/128');

insert into instructor values
(1,'Anjalee Wanigarathne','anj.wanigarathne@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(2,'Thushara Bandara','thusharab@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(3,'Kalani Hansima','kalaniu@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(4,'Dilshani Karunarathna','dilshanik@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(5,'Nuwan Jaliyagoda','nuwanjaliyagoda@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(6,'Imesh Ekanayake','imeshuek@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(7,'Keshara Weerasinghe','kesharaw@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(8,'Chathuri Aththanayake','chathurimalee@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(9,'Arjuna Thennakoon','arjunat@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(10,'Kanchana Jayasinghe','kc43224jayasinghe@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(11,'instructor1','instructor1@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(12,'instructor1','instructor1@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(13,'instructor1','instructor1@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(14,'instructor1','instructor1@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(15,'instructor1','instructor1@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(16,'instructor1','instructor1@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(17,'instructor1','instructor1@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(18,'instructor1','instructor1@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(19,'instructor1','instructor1@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering'),
(20,'instructor1','instructor1@ce.pdn.ac.lk','password123','0791234567','Department of Computer Engineering');

insert into instructs values
(1,'E/18/010'),
(1,'E/18/013'),
(1,'E/18/017'),
(2,'E/18/022'),
(2,'E/18/028'), 
(2,'E/18/030'),
(3,'E/18/036'),
(3,'E/18/058'), 
(3,'E/18/068'),
(4,'E/18/073'), 
(4,'E/18/077'),
(4,'E/18/115'),
(5,'E/18/098'),
(5,'E/18/100'),
(5,'E/18/155'),
(6,'E/18/118'),
(6,'E/18/128'),
(6,'E/18/147'),
(7,'E/18/149'),
(7,'E/18/150'),
(7,'E/18/154');

-- this was generated using the API from api.ce.pdn.ac.lk and python scripting
INSERT INTO lecturer VALUES
(1,'Mr. Amila Indika','namilaindika@eng.pdn.ac.lk','password123',947000000,'Department of Computer Engineering'),
(2,'Dr. Asitha Bandaranayake','asithab@eng.pdn.ac.lk','password123',947000000,'Department of Computer Engineering'),
(3,'Dr. Damayanthi Herath','damayanthiherath@eng.pdn.ac.lk','password123',+94812393920,'Department of Computer Engineering'),
(4,'Dr. Dhammika Elkaduwe','dhammika@eng.pdn.ac.lk','password123',+94812393914,'Department of Computer Engineering'),
(5,'Dr. Isuru Nawinne','isurunawinne@eng.pdn.ac.lk','password123',+94812393470,'Department of Computer Engineering'),
(6,'Dr. Janaka Alawatugoda','alawatugoda@eng.pdn.ac.lk','password123',+94812393470,'Department of Computer Engineering'),
(7,'Dr. Eng. Kamalanath Samarakoon','kamalanath@eng.pdn.ac.lk','password123',+94712277994,'Department of Computer Engineering'),
(8,'Dr. Mahanama Wickramasinghe','mahanamaw@eng.pdn.ac.lk','password123',+94704153780,'Department of Computer Engineering'),
(9,'Dr. Manjula Sandirigama','manjula.sandirigama@gmail.com','password123',+94718385968,'Department of Computer Engineering'),
(10,'Mrs. Nadeesha Adikari','nadeeshaa@eng.pdn.ac.lk','password123',947000000,'Department of Computer Engineering'),
(11,'Prof. Roshan G. Ragel','roshanr@eng.pdn.ac.lk','password123',+94812393913,'Department of Computer Engineering'),
(12,'Mr. Sampath Deegalla','sampath@eng.pdn.ac.lk','password123',+94812393477,'Department of Computer Engineering'),
(13,'Dr. Shirley Dewasurendra','dewasuren@gmail.com','password123',+94812393478,'Department of Computer Engineering'),
(14,'Dr. Sithumini Ekanayake','sithuminie@eng.pdn.ac.lk','password123',947000000,'Department of Computer Engineering'),
(15,'Dr. Suneth Namal Karunarathna','namal@eng.pdn.ac.lk','password123',+94768321333,'Department of Computer Engineering'),
(16,'Dr. Swarnalatha Radhakrishnan','swarnar@eng.pdn.ac.lk','password123',+94812393476,'Department of Computer Engineering'),
(17,'Dr. Upul Jayasinghe','upuljm@eng.pdn.ac.lk','password123',+94812393470,'Department of Computer Engineering'),
(18,'Mr. Ziyan Maraikar','ziyanm@eng.pdn.ac.lk','password123',+94812393475,'Department of Computer Engineering');


insert into guides values 
(1,'E/18/010'),
(1,'E/18/013'),
(1,'E/18/017'),
(2,'E/18/022'),
(2,'E/18/028'), 
(2,'E/18/030'),
(3,'E/18/036'),
(3,'E/18/058'), 
(3,'E/18/068'),
(4,'E/18/073'), 
(4,'E/18/077'),
(4,'E/18/115'),
(5,'E/18/098'),
(5,'E/18/100'),
(5,'E/18/155'),
(6,'E/18/118'),
(6,'E/18/128'),
(6,'E/18/147'),
(7,'E/18/149'),
(7,'E/18/150'),
(7,'E/18/154');

insert into internship values
(1,'Software developer intern 1',1,'2 months','Online','Software developing','50000'),
(2,'Software developer intern 2',1,'2 months','Online','Software developing','40000'),
(3,'Software developer intern 3',1,'2 months','Online','Software developing','10000');

insert into requests values
(1,'E/18/098','2022/02/12');

insert into student_works_in values 
('E/18/155',1);

insert into student_skills values
('E/18/009','Python'),
('E/18/010','Python'),
('E/18/013','Python'),
('E/18/014','Python'),
('E/18/017','Python'),
('E/18/022','Python'),
('E/18/028','Python'),
('E/18/030','Python'),
('E/18/036','Python'),
('E/18/058','Python'),
('E/18/063','Python'),
('E/18/068','Python'),
('E/18/073','Python'),
('E/18/077','Python'),
('E/18/097','Python'),
('E/18/098','Python'),
('E/18/100','Python'),
('E/18/115','Python'),
('E/18/118','Python'),
('E/18/126','Python'),
('E/18/128','Python'),
('E/18/009','C'),
('E/18/010','C'),
('E/18/013','C'),
('E/18/014','C'),
('E/18/017','C'),
('E/18/022','C'),
('E/18/028','C'),
('E/18/030','C'),
('E/18/036','C'),
('E/18/058','C'),
('E/18/063','C'),
('E/18/068','C'),
('E/18/073','C'),
('E/18/077','C'),
('E/18/097','C'),
('E/18/098','C'),
('E/18/100','C'),
('E/18/115','C'),
('E/18/118','C'),
('E/18/126','C'),
('E/18/128','C'),
('E/18/009','Java'),
('E/18/010','Java'),
('E/18/013','Java'),
('E/18/014','Java'),
('E/18/017','Java'),
('E/18/022','Java'),
('E/18/028','Java'),
('E/18/030','Java'),
('E/18/036','Java'),
('E/18/058','Java'),
('E/18/063','Java'),
('E/18/068','Java'),
('E/18/073','Java'),
('E/18/077','Java'),
('E/18/097','Java'),
('E/18/098','Java'),
('E/18/100','Java'),
('E/18/115','Java'),
('E/18/118','Java'),
('E/18/126','Java'),
('E/18/128','Java'),
('E/18/009','MySQL'),
('E/18/010','MySQL'),
('E/18/013','MySQL'),
('E/18/014','MySQL'),
('E/18/017','MySQL'),
('E/18/022','MySQL'),
('E/18/028','MySQL'),
('E/18/030','MySQL'),
('E/18/036','MySQL'),
('E/18/058','MySQL'),
('E/18/063','MySQL'),
('E/18/068','MySQL'),
('E/18/073','MySQL'),
('E/18/077','MySQL'),
('E/18/097','MySQL'),
('E/18/098','MySQL'),
('E/18/100','MySQL'),
('E/18/115','MySQL'),
('E/18/118','MySQL'),
('E/18/126','MySQL'),
('E/18/128','MySQL');";
$conn = connectToDB();
$count = 1;
if ($conn->multi_query($sql)) {
    do {
        // Store first result set
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s", $row[0]);
            }
            $result->free_result();
        }
        // if there are more result-sets, the print a divider
        if ($conn->more_results()) {
            $count++;
        }
        //Prepare next result set
    } while ($conn->next_result());
}
echo ($count . " out of 45 queries submitted <br> DB should be now resetted.");