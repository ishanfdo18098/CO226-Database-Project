<!-- TODO: Passwords are not hashed. Hash them -->

<html>
<?php
require("./functions.php");
session_start();
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
            $_SESSION["email"] = $email;
            $_SESSION['isLogged'] = true;
            echo ("<center><h5>You will be redirected in a second.<h5></center>");
        }
        if ($isStudent) {
            $_SESSION['userType'] = "student";
            redirectToURL("/studentHome.php", 1000);
        } else if ($isInstructor) {
            $_SESSION['userType'] = "instructor";
            redirectToURL("/instructorHome.php", 1000);
        } else if ($isLecturer) {
            $_SESSION['userType'] = "lecturer";
            redirectToURL("/lecturerHome.php", 1000);
        } else if ($isSupervisor) {
            $_SESSION['userType'] = "supervisor";
            redirectToURL("/supervisorHome.php", 1000);
        }

        ?>
    </div>
    <?php printFooter(); ?>
</body>

</html>