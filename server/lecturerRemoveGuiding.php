<?php
session_start();
require("./functions.php");
$conn = connectToDB();
$email = $_SESSION['email'];
$userType = $_SESSION['userType'];
printHeader();
?>
<html>

<body>
    <?php printNavbar(); ?>
    <div class="container">
        <?php
        $eno = $_GET['eno'];

        $sql = "delete from guides where e_no = '$eno' and lecturer_id = (select lecturer_id from lecturer where email = '$email');";

        if ($conn->query($sql) === TRUE) {
            echo "<h3 style='color:Green;'>Request for internship successfully deleted<h3><br> You will be directed back to previous page in 2 seconds.<h3>";
            redirectToURL("/lecturerHome.php", 2000);
        }

        ?>
    </div>




    <?php printFooter(); ?>
</body>

</html>