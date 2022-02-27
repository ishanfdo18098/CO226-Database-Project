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
            // for alterations
            $regno = $_GET['reg_no'];
            $internID = $_GET['internID'];
            $sql = "delete from student_works_in where internship_id = $internID and e_no = '$regno';";

            if ($conn->query($sql) === TRUE) {
                echo "<h3>Working student removed successfully<h3><br> You will be directed back to previous page in 2 seconds.";
                redirectToURL("/supervisorHome.php", 2000);
            } else {
                echo "Something went wrong. Maybe you have already deleted the student  for this internship. If not please contact admin<br>Error: " . $sql . "<br>" . $conn->error;
            }
            ?>
        </h3>
    </center>

    <?php printFooter(); ?>
</body>

</html>