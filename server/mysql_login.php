<?php
function connectToDB()
{
    $servername = "localhost";
    $db_name = "id18333488_site";
    $username = "id18333488_user";
    $password = "wGskxx!o>b=8Rj8)";


    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
