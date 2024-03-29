-- find user by email and password
select * from student where  email = 'e18098@eng.pdn.ac.lk' and password = 'e18098' ;
select * from instructor where  email = 'e18098@eng.pdn.ac.lk' and password = 'e18098' ;
select * from lecturer where  email = 'e18098@eng.pdn.ac.lk' and password = 'e18098' ;
select * from supervisor where  email = 'e18098@eng.pdn.ac.lk' and password = 'e18098' ;



-- studentHome.php
-- get student name from email
select * from studnet where email = 'e18098@eng.pdn.ac.lk';
-- get supervisor details from student email
select * from supervisor, supervises where supervises.supervisor_id = supervisor.supervisor_id and supervises.e_no = (select e_no from student where email = 'e18098@eng.pdn.ac.lk'); 
-- get company details from company id
select * from company where company_id = '1';
-- get working in company details
select internship.name as internship_name, company.name as company_name from student, student_works_in, internship, company where student.email = 'e18155@eng.pdn.ac.lk' and student.e_no = student_works_in.e_no and student_works_in.internship_id = internship.internship_id and internship.company_id = company.company_id;
-- get requested interships
select internship.internship_id ,requests.date, internship.name from internship, student, requests where student.e_no = requests.e_no and student.email = 'e18098@eng.pdn.ac.lk' and internship.internship_id = requests.internship_id;
-- get guider info
select lecturer.name from guides, lecturer,student where student.email = 'e18098@eng.pdn.ac.lk' and student.e_no = guides.e_no and guides.lecturer_id = lecturer.lecturer_id;
-- get instructor details
select instructor.name from student, instructs, instructor where student.email = 'e18098@eng.pdn.ac.lk' and student.e_no = instructs.e_no and instructs.instructor_id = instructor.instructor_id;
-- get all available internships
select internship.internship_id ,internship.name as internship_name, internship.time_period, internship.mode_location, internship.type, internship.salary_allowance, company.name from internship, company where internship.company_id = company.company_id order by internship.name;
-- request new internship
insert into requests values ($id,(select e_no from student where email = 'e18098@eng.pdn.ac.lk'),'$date');
-- delete request
delete from requests where e_no = (select e_no from student where email='e18098@eng.pdn.ac.lk') and internship_id = 1;
-- change password
update student set password='newpassword' where email='e18098@eng.pdn.ac.lk';




-- supervisor
-- test login - supervisor@compnay1.com  password123 
-- get your name
select name from supervisor where email = 'supervisor@compnay1.com';
-- get where you work
select company.name from supervisor, company where company.company_id = supervisor.company_id and supervisor.email = 'supervisor@compnay1.com';
-- who you're supervising
select student.e_no, student.preferred_name from student, supervisor, supervises where student.e_no = supervises.e_no and supervisor.supervisor_id = supervises.supervisor_id and supervisor.email = 'supervisor@compnay1.com';
-- add new supervising student
insert into supervises values ((select supervisor_id from supervisor where email = 'supervisor@compnay1.com'),'E/18/155');
-- remove supervision
delete from supervises where supervisor_id = (select supervisor_id from supervisor where email = 'supervisor@compnay1.com') and e_no = 'E/18/155';
-- get all requests for internships for your company
select student.e_no, student.first_name,  company.name as compName, internship.name as internshipName from requests, internship, company, student, supervises where company.company_id = internship.company_id and requests.internship_id = internship.internship_id and student.e_no = supervises.e_no and supervises.supervisor_id = (select supervisor_id from supervisor where email = 'supervisor@company1.com');
-- accept request for internship
delete from requests where e_no = 'E/18/098';
insert into student_works_in values ('E/18/098',1);
-- find who is working at your company
select student.e_no, student.preferred_name, internship.internship_id, internship.name  from student ,student_works_in, internship, company, supervisor where internship.company_id = company.company_id and student_works_in.internship_id = internship.internship_id and company.company_id = supervisor.company_id and supervisor.email = 'supervisor@company1.com' and student.e_no = student_works_in.e_no ;
-- delete student thats workign for you
delete from student_works_in where internship_id = 1 and e_no = 'E/18/098';


-- instructor
-- test login  nuwanjaliyagoda@ce.pdn.ac.lk password123
-- get name
select name, department_name, phone_number from instructor where email = 'nuwanjaliyagoda@ce.pdn.ac.lk';
--  get students you are curently instructing
select student.e_no, student.preferred_name from student, instructs, instructor where instructor.instructor_id = instructs.instructor_id and instructor.email = 'nuwanjaliyagoda@ce.pdn.ac.lk' and instructs.e_no = student.e_no;
-- remove instructing student
delete from instructs where e_no = 'E/18/098' and instructor_id = (select instructor_id from instructor where email = 'nuwanjaliyagoda@ce.pdn.ac.lk');
-- add new instructing student
insert into instructs values ((select instructor_id from instructor where email = 'nuwanjaliyagoda@ce.pdn.ac.lk'), 'E/18/098');


-- lecturer
-- test login namilaindika@eng.pdn.ac.lk password123
-- get name and phone number
select name, email, phone_number from lecturer where email = 'namilaindika@eng.pdn.ac.lk';
-- get students that are guided by u
select preferred_name, student.e_no from lecturer, guides, student where lecturer.email = 'namilaindika@eng.pdn.ac.lk' and lecturer.lecturer_id = guides.lecturer_id and guides.e_no = student.e_no;