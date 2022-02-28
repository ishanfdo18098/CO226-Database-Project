<?php
require("./functions.php");
session_start();
$conn = connectToDB();
printHeader();
?>
<html>

<body>
    <?php printNavbar();
    if ($_SESSION['isLogged'] == false || $_SESSION['userType'] != 'student') {
        redirectToURL("/logout.php", 0);
    }
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM student where email = '" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<center><h3>Welcome back, " . $row['preferred_name'] . "</h3><br>";
            echo "<h4>Your details:<h4><br>";
            echo "<h5>E Number: " . $row['e_no'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            echo "First Name: " . $row['first_name'] . "<br>";
            echo "Surname With Initials: " . $row['surname_with_initials'] . "<br>";
            echo "CV: " . $row['cv'] . "<br>";
            echo "Department: " . $row['department_name'] . "<br>";
        }
    } else {
        echo "0 results";
    }

    $sql = "select * from supervisor, supervises where supervises.supervisor_id = supervisor.supervisor_id and supervises.e_no = (select e_no from student where email = '" . $_SESSION['email'] . "'); ";
    $result = mysqli_query($conn, $sql);

    echo ("<br>You are supervised by, ");
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $company_id = $row['company_id'];
            echo ("$name from ");
            $sql = "select * from company where company_id = '$company_id';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    echo ($name);
                }
            } else {
                echo "server error, inform admin";
            }
        }
    } else {
        echo "N/A";
    }


    $sql = "select lecturer.name from guides, lecturer,student where student.email = '$email' and student.e_no = guides.e_no and guides.lecturer_id = lecturer.lecturer_id;";
    $result = mysqli_query($conn, $sql);
    echo ("<br><br>You are guided by, ");
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            echo ($name . " ");
        }
    } else {
        echo "N/A";
    }
    $sql = "select instructor.name from student, instructs, instructor where student.email = '$email' and student.e_no = instructs.e_no and instructs.instructor_id = instructor.instructor_id;
";
    $result = mysqli_query($conn, $sql);
    echo ("<br><br>You are instructed by, ");
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            echo ($name . " ");
        }
    } else {
        echo "N/A";
    }

    echo "<br><br> You are currently working in: ";
    $sql = "select internship.name as internship_name, company.name as company_name from  student, student_works_in, internship, company where student.email = '$email' and student.e_no = student_works_in.e_no and student_works_in.internship_id = internship.internship_id and internship.company_id = company.company_id;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $intern_name = $row['internship_name'];
            $company_name = $row['company_name'];
            echo ($intern_name . " at " . $company_name);
        }
    } else {
        echo "N/A";
    }

    echo ("<br><br>You have currently requested for, <br>");
    $sql = "select internship.internship_id ,requests.date, internship.name from internship, student, requests where student.e_no = requests.e_no and student.email = '$email' and internship.internship_id = requests.internship_id;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $date = $row['date'];
            $internship_ID = $row['internship_id'];
            $intership_name = $row['name'];
            echo ($intership_name . " on " . $date . "<button type='button' onclick=\"location.href='/studentRemoveRequestInternship.php?internshipID=$internship_ID'\" class=\"btn btn-danger\">Remove</button><br>");
        }
    } else {
        echo "N/A";
    }

    echo ("<br><br>Available internships,<br>");
    $sql = "select internship.internship_id ,internship.name as internship_name, internship.time_period, internship.mode_location, internship.type, internship.salary_allowance, company.name from internship, company where internship.company_id = company.company_id;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['internship_id'];
            $name = $row['internship_name'];
            $time_period = $row['time_period'];
            $mode = $row['mode_location'];
            $type = $row['type'];
            $salary = $row['salary_allowance'];
            $compy_name = $row['name'];

            echo ($name . "<button type='button' onclick=\"location.href='/studentRequestInternship.php?internshipID=$id'\" class=\"btn btn-primary\">Apply</button><br>");
        }
    } else {
        echo "<br>No internships available";
    }

    // echo ("<br><br> You are currently working in,<br>");
    // $sql = "select internship.name, company.name as comp_name from student_works_in, company, internship where e_no = (select e_no from student where email = '$email') and student_works_in.internship_id = internship.internship_id and company.company_id = internship.company_id;";
    // $result = mysqli_query($conn, $sql);

    // if (mysqli_num_rows($result) > 0) {
    //     // output data of each row
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $internship_name = $row['name'];
    //         $company_name = $row['comp_name'];
    //         echo ($name . " at " . $company_name);
    //     }
    // } else {
    //     echo "N/A";
    // }

    ?>
    <br><br>
    <form action="/studentChangePassword.php" method="post">
        <label for="newPass">Change your password: </label>
        <input type="text" name='newPass'>
        <button type='submit' class="btn btn-primary">Change password</button>
    </form>
    </center>
    <?php printFooter(); ?>
</body>

</html>