<?php
session_start();
$email = $_SESSION['email'];
$userType = $_SESSION['userType'];
require("./functions.php");
$conn = connectToDB();
printHeader();
?>
<html>

<body>
    <?php printNavbar(); ?>
    <center>
        <?php
        $sql = "select * from supervisor where email = '$email';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $phone = $row['phone_number'];
                $email = $row['email'];
                echo ("<h4>Welcome back, $name <br>");
                echo ("Phone Number : $phone <br>");
                echo ("Email : $email <br>");
            }
        } else {
            echo "<br>You arent working in any company. Please contact admin";
        }
        echo ("<br>");

        $sql = "select company.name from supervisor, company where company.company_id = supervisor.company_id and supervisor.email = '$email';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $company_name = $row['name'];
                echo ("<h4>" . $company_name);
            }
        } else {
            echo "<br>You arent working in any company. Please contact admin";
        }

        echo ("");

        echo ("<br>");
        echo ("<br>");

        echo ("<h4>You are superivising,<br> ");
        $sql = "select student.e_no, student.preferred_name from student, supervisor, supervises where student.e_no = supervises.e_no and supervisor.supervisor_id = supervises.supervisor_id and supervisor.email = '$email';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $e_no = $row['e_no'];
                $name = $row['preferred_name'];
                echo ($e_no . " " . $name . "<button type='button' onclick=\"location.href='/supervisorRemoveSupervision.php?reg_no=$e_no'\" class=\"btn btn-danger\">Remove</button><br>");
            }
        } else {
            echo "<br>N/A";
        }
        echo ("<br>");

        echo ("Add new student to supervising list,");
        ?>
        <form action="/supervisorAddSupervising.php" method="post">
            <input type="text" name="reg_no" placeholder="E/18/098 etc...">
            <button type="submit" class="btn btn-primary">Add</button>
        </form>


        <?php
        echo ("Requests for internships to your company,<br>");
        $sql = "select student.e_no, student.first_name, internship.name as internshipName, internship.internship_id from requests, internship, company, student, supervises where company.company_id = internship.company_id and requests.internship_id = internship.internship_id and student.e_no = supervises.e_no and supervises.supervisor_id = (select supervisor_id from supervisor where email = '$email');";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $eno = $row['e_no'];
                $studentName = $row['first_name'];
                $internshipName = $row['internshipName'];
                $internshipID = $row['internship_id'];
                echo ($eno . " " . $studentName . " " . $internshipName . "<button type='button' onclick=\"location.href='/supervisorAcceptRequestForInternship.php?reg_no=$e_no&internship_id=$internshipID'\" class=\"btn btn-success\">Accept</button><br>");
            }
        } else {
            echo "No requests available";
        }
        ?>

    </center>
    <?php printFooter(); ?>
</body>

</html>