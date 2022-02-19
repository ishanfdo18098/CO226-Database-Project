<?php
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
