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
            $eno = $_GET['eno'];
            $sql = "delete from instructs where e_no = '$eno' and instructor_id = (select instructor_id from instructor where email = '$email');";

            if ($conn->query($sql) === TRUE) {
                echo "<h3>Instructing student successfully deleted<h3><br> You will be directed back to previous page in 2 seconds.";
                redirectToURL("/instructorHome.php", 2000);
            } else {
                echo "Something went wrong. Maybe you have already deleted the student for instructing. If not please contact admin<br>Error: " . $sql . "<br>" . $conn->error;
            }
            ?>
        </h3>
    </center>
    <?php printFooter(); ?>
</body>

</html>