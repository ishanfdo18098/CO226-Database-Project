<html>
<?php
require("./functions.php");

$conn = connectToDB();
printHeader();
session_start();
?>

<body>
    <?php printNavbar();
    $_SESSION['isLogged'] = false;
    session_destroy(); ?>
    <center>
        <h3>You have been logged out now.</h3><br>
        <h4><a href="/">Go back to home</a></h4>
    </center>

    <?php printFooter(); ?>
</body>

</html>