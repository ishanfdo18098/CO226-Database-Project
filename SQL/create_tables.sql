-- MariaDB

-- when testing code. delete exisiting tables
use id18333488_site; --dont use this on 000webhost
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
    first_name varchar(100),
    last_name varchar(100),
    preferred_name varchar(100),
    surname_with_initials varchar(100),
    cv varchar(100),
    deparment_name varchar(100),
    constraint fk_student
        foreign key (deparment_name) references department (dep_name)
);

create table internship (
    internship_id int primary key,
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
    phone_number varchar(15),
    deparment_name varchar(100),
    constraint fk_instructor
        foreign key (deparment_name) references department (dep_name)
);

create table lecturer (
    lecturer_id int primary key,
    name varchar(100),
    email varchar(100),
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