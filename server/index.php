<?php
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
echo "Connected to db successfully<br>";


// drop table
$sql = "drop table table1;";
if ($conn->query($sql) === TRUE) {
  echo "Table dropped successfully<br>";
} else {
  echo "Error dropping table: " . $conn->error;
}

// Create table
$sql = "create table table1(
  name varchar(100) primary key
);";
if ($conn->query($sql) === TRUE) {
  echo "Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

// insert some data
$sql = "insert into table1 values ('Ishan'),('Adeepa'),('Ridma');";
if ($conn->query($sql) === TRUE) {
  echo "Data inserted  successfully<br>";
} else {
  echo "Error inserting data" . $conn->error;
}

echo "<br> Read from db<br>";
$sql = "SELECT * FROM table1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "Name: " . $row["name"] . "<br>";
  }
} else {
  echo "0 results";
}


$conn->close();
