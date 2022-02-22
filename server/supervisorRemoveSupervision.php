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
            $regNo = $_GET['reg_no'];
            $sql = "delete from supervises where supervisor_id = (select supervisor_id from supervisor where email = '$email') and e_no = '$regNo';";

            if ($conn->query($sql) === TRUE) {
                echo "Supervision removed successfullly<br> You will be redirected to the previous page in 2 seconds";
                redirectToURL("/supervisorHome.php", 2000);
            } else {
                echo "Something went wrong. Maybe you have already removed supervision. If not please contact admin<br>Error: " . $sql . "<br>" . $conn->error;
            }
            ?>

        </h3>
    </center>

    <?php printFooter(); ?>
</body>

</html>