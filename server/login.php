<!-- TODO: only student login is done. have to do other logins. need to detect which use is this too plus the sql seems to be wrong. better if we check in each table one by one -->

<html>
<?php
require("./functions.php");

$conn = connectToDB();
printHeader();
?>

<body>
    <div class="container">
        <?php printNavbar(); ?>
        <?php
        // collect value of input field
        $email = $_GET['email-address'];
        $password = $_GET['password'];
        ?>
        <center>
            <h3>Logging in</h3>
        </center>
        <?php
        $sql = "select * from student, lecturer, instructor, supervisor where (student.password = '" . $password . "' or lecturer.password = '" . $password . "' or instructor.password = '" . $password . "' or supervisor.password = '" . $password . "') and (student.email = '" . $email . "' or lecturer.email = '" . $email . "' or instructor.email = '" . $email . "' or supervisor.email = '" . $email . "');";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo json_encode($row);
                echo "<center><h4>Welcome back, " . $row["e_no"] . " - " . $row["preferred_name"] . "<h4></center>";
            }
        } else {
            echo "<center><h4>Email and password do not match. Please <a href='/'>go back</a> and try again<h4></center>";
        }


        ?>
    </div>
    <?php printFooter(); ?>
</body>

</html>