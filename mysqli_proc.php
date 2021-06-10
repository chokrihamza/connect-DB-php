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
$sql = "CREATE TABLE MyGuests (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

if (mysqli_query($conn, $sql)) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
// insert data into table 
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  $last_id = mysqli_insert_id($conn);
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($connect);