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
        $email = mysqli_real_escape_string($conn, $_GET['email-address']);
        $password = mysqli_real_escape_string($conn, $_GET['password']);
        ?>
        <center>
            <h3>Logging in</h3>
        </center>
        <?php
        $isStudent = false;
        $isLecturer = false;
        $isSupervisor = false;
        $isInstructor = false;
        $count = 0;

        // check if student
        $sql = "select * from student where  email = '" . $email . "' and password = '" . $password . "'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // echo json_encode($row);
            echo "<center><h4>Welcome back, " . $row["e_no"] . " - " . $row["preferred_name"] . "<h4></center>";
            $isStudent = true;
            $count++;
        }

        // check if instructor
        $sql = "select * from instructor where  email = '" . $email . "' and password = '" . $password . "'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // echo json_encode($row);
            echo "<center><h4>Welcome back, " . $row["name"] . "<h4></center>";
            $isInstructor = true;
            $count++;
        }

        // check if lecturer
        $sql = "select * from lecturer where  email = '" . $email . "' and password = '" . $password . "'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // echo json_encode($row);
            echo "<center><h4>Welcome back, " . $row["name"] . "<h4></center>";
            $isLecturer = true;
            $count++;
        }

        // check if supervisor
        $sql = "select * from supervisor where  email = '" . $email . "' and password = '" . $password . "'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // echo json_encode($row);
            echo "<center><h4>Welcome back, " . $row["name"] . "<h4></center>";
            $isSupervisor = true;
            $count++;
        }

        if ($count == 0) {
            echo ("<center><h4>Email and password do not match. Please go <a href='/'>back</a> and try again.<h4></center> ");
        }
        if ($count > 1) {
            // same email and password are present in multiple tables
            die("<center><h4>Server error - please contact admin.<h4></center> ");
        }

        if ($count == 1) {
            echo ("<center><h5>You will be redirected in a second.<h5></center>");
        }
        if ($isStudent) {
            redirectToURL("/studentHome.php");
        } else if ($isInstructor) {
            header("refresh:1; url=instructorHome.php");
        } else if ($isLecturer) {
            header("refresh:1; url=lecturerHome.php");
        } else if ($isSupervisor) {
            header("refresh:1; url=supervisorHome.php");
        }

        ?>
    </div>
    <?php printFooter(); ?>
</body>

</html>