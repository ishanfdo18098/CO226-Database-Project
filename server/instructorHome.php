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
        <h3>
            <?php
            $sql = "select name, department_name, phone_number from instructor where email = '$email';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $department = $row['department_name'];
                    $phone = $row['phone_number'];
                    echo ("Welcome back, $name <br> Department: $department <br> Phone Number - $phone");
                }
            } else {
                echo "<br>Something went wrong. Please contact admin - Error 1";
            }


            echo ("<br><br>You are instructing,<br>");
            $sql = "select student.e_no, student.preferred_name from student, instructs, instructor where instructor.instructor_id = instructs.instructor_id and instructor.email = '$email' and instructs.e_no = student.e_no;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['preferred_name'];
                    $eno = $row['e_no'];
                    echo ("$eno - $name <button type='button' onclick=\"location.href='/instructorRemoveInstructing.php?eno=$eno'\" class=\"btn btn-danger\">Remove</button> <br>");
                }
            } else {
                echo "<br>No supervisor available";
            }
            ?>
            <br>Add new instructing student,<br>
            <form action="instructorAddInstructingStudent.php" method="post">
                <label for="eno">Reg. No:</label>
                <input type="text" name='eno'>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            <form action="/instructorChangePassword.php" method="post">
                <label for="newPass">Change your password: </label>
                <input type="text" name='newPass'>
                <button type='submit' class="btn btn-primary">Change password</button>
            </form>
        </h3>
    </center>

    <?php printFooter(); ?>
</body>

</html>