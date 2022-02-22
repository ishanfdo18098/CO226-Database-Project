<?php
session_start();
$email = $_SESSION['email'];
require("./functions.php");
$conn = connectToDB();
printHeader();
?>
<html>

<body>
    <?php printNavbar(); ?>


    <?php printFooter(); ?>
</body>

</html>