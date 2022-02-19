<?php
session_start();
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