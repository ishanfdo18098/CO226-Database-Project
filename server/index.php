<?php
$servername = "localhost";
$username = "id18333488_user";
$password = "wGskxx!o>b=8Rj8)";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected to db successfully one two";
?>