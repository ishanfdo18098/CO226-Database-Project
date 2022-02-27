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
            $newPassword = $_POST['newPass'];
            $sql = "update student set password='$newPassword' where email='$email';";

            if ($conn->query($sql) === TRUE) {
                echo "Password successfully changed<br> You will be directed back to previous page in 2 seconds.";
                redirectToURL("/studentHome.php", 2000);
            } else {
                echo "Something went wrong, please contact admin<br>Error: " . $sql . "<br>" . $conn->error;
            }
            ?>
        </h3>
    </center>

    <?php printFooter(); ?>
</body>

</html>