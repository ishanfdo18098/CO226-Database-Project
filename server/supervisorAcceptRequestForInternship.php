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
            $eno = $_GET['reg_no'];
            $internshipID = $_GET['internship_id'];
            $sql = "delete from requests where e_no = '$eno' and internship_id = $internshipID;";
            if ($conn->query($sql) === TRUE) {
                
            } else {
                echo "Something went wrong please contact admin<br>Error: " . $sql . "<br>" . $conn->error;
                die();
            }
            $sql = "insert into student_works_in values ('$eno',$internshipID);";
            if ($conn->query($sql) === TRUE) {
                echo "<h3>Request for internship successfully Accepted<h3><br> You will be directed back to previous page in 2 seconds.";
                redirectToURL("/supervisorHome.php", 2000);
            } else {
                echo "Something went wrong. Maybe you have already accepted the request for this internship, or he already works for that internship. If not please contact admin<br>Error: " . $sql . "<br>" . $conn->error;
            }

            ?>
        </h3>
    </center>
    <?php printFooter(); ?>
</body>

</html>