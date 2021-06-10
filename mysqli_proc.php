<?php

$servername = "localhost";
$username = "root";
$password = "";

// connect to the data base 

$connect = mysqli_connect($servername, $username, $password);
if (!$connect) {
  die("there is a problem when trying connect to DB" . mysqli_connect_error());
}

echo "connected ...";
// Create data base 
$sql = "CREATE DATABASE connect";

if (mysqli_query($connect, $sql)) {
  echo "databae created successfully";
} else {
  echo "Error creating DB" . mysqli_error($connect);
}

// $sql = "DROP DATABASE IF EXISTS connect";

// if (mysqli_query($connect, $sql)) {
//   echo "data base droped";
// } else {
//   echo "Erro drop db" . mysqli_error($connect);
// }

// sql to create table
// $sql = "CREATE TABLE MyGuests (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   firstname VARCHAR(30) NOT NULL,
//   lastname VARCHAR(30) NOT NULL,
//   email VARCHAR(50),
//   reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//   )";

// if (mysqli_query($conn, $sql)) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . mysqli_error($conn);
// }
// insert data into table 
// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com');";
// $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('Mary', 'Moe', 'mary@example.com');";
// $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('Julie', 'Dooley', 'julie@example.com')";
// if (mysqli_multi_query($conn, $sql)) {
//   echo "New records created successfully";
//   $last_id = mysqli_insert_id($conn);
//   echo "New record created successfully. Last inserted ID is: " . $last_id;
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($connect);