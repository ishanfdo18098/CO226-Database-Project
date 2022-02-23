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
            $reg_no = strtoupper($_POST['reg_no']);
            $sql = "insert into supervises values ((select supervisor_id from supervisor where email = '$email'),'$reg_no');";

            if ($conn->query($sql) === TRUE) {
                echo "<h3 style='color:Green;'>New supervision registered successfullly<br> You will be redirected to the previous page in 2 seconds</h3>";
                redirectToURL("/supervisorHome.php", 2000);
            } else {
                echo "Something went wrong. Maybe you are already supervising this student. If not please contact admin<br>Error: " . $sql . "<br>" . $conn->error;
            }
            ?>
        </h3>
    </center>
    <?php printFooter(); ?>
</body>

</html>