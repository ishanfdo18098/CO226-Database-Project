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

            $sql = "select name, email, phone_number from lecturer where email = 'namilaindika@eng.pdn.ac.lk';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone_number = $row['phone_number'];
                    echo ("Welcome back, $name <br> Email : $email <br> Phone Number: $phone_number");
                }
            } else {
                echo "<br>Server error. Contact admin";
            }
            echo ("<br><br>");

            echo ("Students that are guided by you,<br>");
            $sql = "select preferred_name, student.e_no from lecturer, guides, student where lecturer.email = '$email' and lecturer.lecturer_id = guides.lecturer_id and guides.e_no = student.e_no;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['preferred_name'];
                    $eno = $row['e_no'];
                    echo ("$eno - $name<button type='button' onclick=\"location.href='/lecturerRemoveGuiding.php?eno=$eno'\" class=\"btn btn-danger\">Remove</button> <br>");
                }
            } else {
                echo "<br>No supervisor available";
            }
            echo ("<br><br>");
            ?>
            <br>Add new guiding student,<br>
            <form action="lecturerNewGuidingStudent.php" method="post">
                <label for="eno">Reg. No:</label>
                <input type="text" name='eno'>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </h3>
    </center>

    <?php printFooter(); ?>
</body>

</html>