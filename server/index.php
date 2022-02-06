<?php
1234 from website
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
$sql = "INSERT INTO table1 VALUES 
('U.G. Kanewala'),
('S.W. Buthpitiya'),
('G.L.I.M.K. Kahanda'),
('H.M. Gamaarachchi'),
('H.P.T.N.K. Jayarathna'),
('W. M. L. I. Prasanna'),
('A. S. P. Athukorala'),
('M.P. Prematilake'),
('R.P.B.J. Alupotha'),
('T.N. Dahanayaka'),
('E. D. L. Dias'),
('R.P.S. Prasadi'),
('R.M.G.R.S. Ramanayake'),
('K.D.B.C.Udugama'),
('S.L.B. Karunarathne'),
('L.K.R.Liyanage'),
('Y.N.Rajapaksha'),
('A. M. Hishan Indrajith Adikari'),
('Agalakumbura S.T'),
('J.M.S.M. Jayasundara'),
('G.C. Jayatilaka'),
('T.B.D.H. Kavinda'),
('S.L.Munasinghe'),
('P. Pankayaraj'),
('G S D Perera'),
('J.M.D.J Ruwantha'),
('U. G. C. B. Samarasinghe'),
('D.N Warusamana'),
('W.G.H.S. Weligampola'),
('EY Welikala'),
('S. Anojan'),
('M.H. Hisni Mohammed'),
('Jaliyagoda A.J.N.M.'),
('Karunrathna S.D.D.D'),
('M.P.U Premathilaka'),
('Suneth Samarasinghe'),
('Adikari'),
('Amarasinghe D.L.C.'),
('Amasith K.T.D.'),
('Balasuriya B.M.N.U. Ms'),
('Harshana Bandara'),
('Basnayake S.S.'),
('Bragadeeshan S.'),
('Kavindu Chamith'),
('J.P.D.M. Chandula'),
('De Silva K.R.'),
('De Silva M.D.S. Ms'),
('De Silva N.S.C.K.S. Ms'),
('Deshan L.A.C.'),
('J.M.Praveen Dhananjaya'),
('S.M. Viraj Dhanushka'),
('Dharmathilaka A.L.V.H. Ms'),
('Dissanayaka W.M.S.C. Ms'),
('Dissanayake D.M.T.H.'),
('N.A.D.D. Dissanayake'),
('Shirly Madushanka'),
('Ekanayake J.E.M.D.Y. Ms'),
('Girishikan S.'),
('Hansika D.G.N. Ms'),
('Harshana P.Y.S.'),
('Herath H.M.Y.B.'),
('Jayathilaka H.A.D.T.T. Ms'),
('Kalpage S.W.'),
('Karikaran V.'),
('Karunarathna D.A.D.T.'),
('B. L. S. Lakmali'),
('S.A.I Lakshan'),
('Madushan K.H.G.H.'),
('Wishva'),
('Madushanki K.H.H.C. Ms'),
('F.S. Marzook'),
('A.V.S.S.A Munasinghe'),
('Nuwantha B.L.A.'),
('Parackrama G.T.W. Ms'),
('A. L. H. E Perera'),
('Perera G.K.B.H.'),
('Nuwan Piyarathna'),
('Kalani Prabodha'),
('Maneesha Randeniya'),
('Rathnayaka R.P.V.N.'),
('Rathnayake E.W.S.P.'),
('A A R V Samaraweera'),
('Shanaka T.K.M.'),
('Somarathna N.C.D.'),
('T.T.N. Suwaris'),
('Thilakarathna W.M.D.U.'),
('Thisanke M.K.H.'),
('Rusiru Thushara'),
('Vindula I.B.S.'),
('Weerasundara W.M.T.M.P.B.'),
('Welikanda V.H.L.N.'),
('Wijayasinghe S.D.D.D.'),
('Wijekoon W.M.T.S.'),
('Erandana Wijerathne'),
('Abeyweera S.K.'),
('Ahamed M.I.R.'),
('Alahakoon A.M.H.H.'),
('Alahakoon T.'),
('Amarasinghe R.A.A.U.'),
('Arshadh M.R.M.'),
('I.S. Balasuriya'),
('Bandara K.G.K.R.'),
('Bandara S.M.P.C.'),
('Chamika K.T.M.'),
('Chandrasekara C.M.A.'),
('Chandrasena M.M.D.'),
('Coralage D.T.S.'),
('De Silva M.G.S.C.'),
('G.A.I. Devindi'),
('Dhushintha R.'),
('Dilhan M.A.K.'),
('D.M.D.R. Dissanayake'),
('Ekanayake E.M.M.U.B.'),
('Francis F.B.A.H.'),
('Gallage P.G.A.P.'),
('Gunathilaka R.M.S.M.'),
('Gunathilaka S.P.A.U.'),
('Isthikar F.S.'),
('Kavindu Jayasooriya'),
('K.P.C.D.B. Jayaweera'),
('Kalpana M.W.V.'),
('Karunachandra R.H.I.O.'),
('A.I. Karunanayake'),
('Karunarathna M.G.I.U.'),
('Kavinaya Y.'),
('Kodagoda K.H.S.P.'),
('Kumara W.M.E.S.K.'),
('Liyanage S.N.'),
('Madhushan R.'),
('Madushani W.T.'),
('Manohara H.T.'),
('Marasinghe M.A.P.G.'),
('Morais K.W.G.A.N.D.'),
('Nawarathna K.G.I.S.'),
('Nishankar S.'),
('Nadeesha Diwakara'),
('Perera C.R.M.'),
('Perera K.S.D.'),
('Perera S.S.'),
('Perera U.A.K.K.'),
('Piriyaraj S.'),
('Piyumi Bhagya S'),
('Rathnayaka R.L.D.A.S.'),
('Rathnayaka R.M.T.N.K.'),
('Rilwan M.M.M.'),
('Rossmaree D.M.'),
('R.H. Rupasinghe'),
('T.T.V.N. Rupasinghe'),
('Sangarasekara S.A.I.U.'),
('Udith Senanayake'),
('Shalha A.M.F.'),
('H.S.C. Silva'),
('Srimal R.M.L.C.'),
('Mr. Tharmapalan Thanujan'),
('Isara Tillekeratne'),
('N.Varnaraj'),
('Wannigama S.B.'),
('Weerasinghe S.P.D.D.S.'),
('Weerasooriya S.S.'),
('Weragoda W.A.L.M.'),
('Wijerathne I.D.H.S.D.'),
('Wijesinghe W.D.L.P.'),
('H.D Wijesooriya'),
('Abeyweera P.S.'),
('Abeywickrama A.K.D.A.S.'),
('Abilash R.'),
('Ahamad I.L.A.'),
('Aarah J.F.'),
('Amarasinghe D.I.'),
('Ariyawansha P.H.J.U.'),
('Aththanayaka A.M.S.'),
('Bandara L.R.M.U.'),
('De Alwis K.K.M.'),
('Dedigamuwa N.T.'),
('Devinda G.C.'),
('Dhananjaya W.M.T.'),
('Dharmarathne N.S.'),
('Eswaran M.'),
('K.A.I. Fernando'),
('Fernando K.N.A.'),
('Gowsigan A.'),
('Gunarathna H.P.H.M.'),
('Gurusinghe D.C.'),
('Hariharan R.'),
('Hemachandra K.T.H.'),
('Jameel S.'),
('Jayakody J.M.I.H.'),
('Jayarathna H.M.Y.S.'),
('Jayasumana C.H.'),
('Jayasundara J.W.K.R.B.'),
('Jayathilake W.A.T.N.'),
('Karan R.'),
('Karunarathna W.K.'),
('Kasthuripitiya K.A.I.M.'),
('Khan A.K.M.S.'),
('Kithmal P.G.S.'),
('Kodituwakku M.K.N.M.'),
('Konara K.M.S.L.'),
('Madhusanka K.G.A.S.'),
('H.K. Manahara'),
('Mihiranga G.D.R.'),
('Mudalige D.H.'),
('Munathanthri M.D.H.I.'),
('Nimnadi J.A.S.'),
('Nishani K.'),
('Prasanna N.W.G.L.M.'),
('Premathilaka K.N.I.'),
('Rajasooriya J.M.'),
('Ranasinghe R.A.N.S.'),
('Ranasinghe R.D.J.M.'),
('Ranasinghe S.M.T.S.C.'),
('Rathnayake R.M.P.P.'),
('Rishad N.M.'),
('Sandaruwan V.B.'),
('Sandunika S.A.P.'),
('Seekkubadu H.D.'),
('Senevirathna M.D.C.D.'),
('Sewwandi D.W.S.N.'),
('Sewwandi H.R.'),
('Subramanieam V.'),
('Thalisha W.G.A.P.'),
('Tharaka K.K.D.R.'),
('Thulasiyan Y.'),
('Uduwanage H.U.'),
('Vilakshan V.'),
('Vindula K.P.A.'),
('Wanduragala T.D.B.'),
('Weerarathne L.D.'),
('Wijerathne E.S.G.'),
('Wijerathne R.M.N.S.'),
('Wimalasiri K.H.C.T.'),
('Zameer M.H.M.'),
('De Silva M.S.G.M.');";
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
