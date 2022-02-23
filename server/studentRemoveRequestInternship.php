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

        $sql = "delete from requests where e_no = (select e_no from student where email='$email') and internship_id = $internship_id;";

        if ($conn->query($sql) === TRUE) {
            echo "<h3 style='color:Green;'>Request for internship successfully deleted<h3><br> You will be directed back to previous page in 2 seconds.<h3>";
            redirectToURL("/studentHome.php", 2000);
        }

        ?>
    </div>




    <?php printFooter(); ?>
</body>

</html>