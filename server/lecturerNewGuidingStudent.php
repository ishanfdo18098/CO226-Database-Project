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
            $eno = $_POST['eno'];
            $sql = "insert into guides values ((select lecturer_id from lecturer where email = '$email'), '$eno');";

            if ($conn->query($sql) === TRUE) {
                echo "<h3>New Student added successfully<h3><br> You will be directed back to previous page in 2 seconds.";
                redirectToURL("/lecturerHome.php", 2000);
            } else {
                echo "Something went wrong. Maybe you are already instructing the student. If not please contact admin<br>Error: " . $sql . "<br>" . $conn->error;
            }
            ?>
        </h3>
    </center>

    <?php printFooter(); ?>
</body>

</html>