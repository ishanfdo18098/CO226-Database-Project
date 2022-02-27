<?php
// for retriving
$sql = "select * from company where company_id = '$company_id';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        echo ($name);
    }
} else {
    echo "<br>No supervisor available";
}

// for alterations
$sql = "delete from requests where e_no = (select e_no from student where email='$email') and internship_id = $internship_id;";

if ($conn->query($sql) === TRUE) {
    echo "<h3>Request for internship successfully deleted<h3><br> You will be directed back to previous page in 2 seconds.";
    redirectToURL("/studentHome.php", 2000);
} else {
    echo "Something went wrong. Maybe you have already deleted the request for this internship. If not please contact admin<br>Error: " . $sql . "<br>" . $conn->error;
}
