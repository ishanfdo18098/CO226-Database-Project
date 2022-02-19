<html>
<?php
require("./functions.php");
session_start();
$conn = connectToDB();
printHeader();
?>

<body>
    <?php printNavbar(); ?>


    <?php printFooter(); ?>
</body>

</html>