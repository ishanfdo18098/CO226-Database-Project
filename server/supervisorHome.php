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
                echo ("<h3>Welcome back, $name <br>");
                echo ("Phone Number : $phone <br>");
                echo ("Email : $email <br>");
            }
        } else {
            echo "<br>You arent working in any company. Please contact admin";
        }
        echo ("<br>");


        echo ("<h3>You are working for, </h3>");
        $sql = "select company.name from supervisor, company where company.company_id = supervisor.company_id and supervisor.email = '$email';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $company_name = $row['name'];
                echo ("<h3>" . $company_name);
            }
        } else {
            echo "<br>You arent working in any company. Please contact admin";
        }
        echo ("<br>");
        echo ("<br>");

        echo ("<h3>You are superivising, </h3>");
        $sql = "select student.e_no, student.preferred_name from student, supervisor, supervises where student.e_no = supervises.e_no and supervisor.supervisor_id = supervises.supervisor_id and supervisor.email = '$email';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $e_no = $row['e_no'];
                $name = $row['preferred_name'];
                echo ("<h3>" . $e_no . " " . $name);
            }
        } else {
            echo "<br>N/A";
        }
        echo ("<br><br>");

        echo ("Add new student to supervising list,");
        ?>
        <form action="/supervisorAddSupervising.php" method="post">
            <input type="text" name="reg_no" placeholder="E/18/098 etc...">
            <button type="submit">Add</button>
        </form>

    </center>
    <?php printFooter(); ?>
</body>

</html>