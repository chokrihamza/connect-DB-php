<?php

$servername = "localhost";
$username = "root";
$password = "";
// using mysql improved 
// connect to the data base 

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("there is a problem when trying connect to DB" . $conn->connect_error);
}

echo "connected ...";
// Create data base 
$sql = "CREATE DATABASE IF NOT EXISTS connect";

if ($conn->query($sql) === true) {
  echo "databae created successfully";
}
// $sql = "DROP DATABASE IF EXISTS connect";
// if ($connect->query($sql) === true) {
//   echo "data base droped";
// } else {
//   echo "Error creating DB" . $connect->error;
// }

// create tabel using sql

// sql to create table
// $sql = "CREATE TABLE connect.MyGuests (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   firstname VARCHAR(30) NOT NULL,
//   lastname VARCHAR(30) NOT NULL,
//   email VARCHAR(50),
//   reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//   )";

// if ($conn->query($sql) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

//insert data to mysql using mysqli and pdo

$sql = "INSERT INTO connect.MyGuests(firstname,lastname,email)
 VALUES ('jhon','doe','jhondoe0123@gmail.com');";
$sql .= "INSERT INTO connect.MyGuests(firstname,lastname,email)
 VALUES ('alex','smith','alexsmith0123@gmail.com');";
$sql .= "INSERT INTO connect.MyGuests(firstname,lastname,email)
 VALUES ('ameelka','smirnova','ameelkasmirnova@gmail.com')";

// isert multiple data
/*$conn->query($sql) === TRUE*/
if ($conn->multi_query($sql) === true) {
  //  get id of the last inserted id
  echo "New records created successfully";
  $last_insert_id = $conn->insert_id;
  echo "the last insert id : $last_insert_id";
  
} else {
  echo "Error" . $sql . "</br>" . $conn->error;
}





$conn->close();