<?php
session_start();
require("./functions.php");
$conn = connectToDB();
printHeader();
?>
<html>

<body>
    <?php printNavbar(); ?>
    <div class="container">
        <?php
        $internship_id = $_GET['internshipID'];
        $email = $_SESSION['email'];
        $date = date("Y/m/d");

        $sql = "insert into requests values ($internship_id,(select e_no from student where email = '$email'),'$date');";

        if ($conn->query($sql) === TRUE) {
            echo "<h3>New record created successfully<h3><br> You will be directed back to previous page in 2 seconds.";
            redirectToURL("/studentHome.php", 2000);
        } else {
            echo "Something went wrong. Maybe you have already requested for this internship. If not please contact admin<br>Error: " . $sql . "<br>" . $conn->error;
        }

        ?>
    </div>




    <?php printFooter(); ?>
</body>

</html>