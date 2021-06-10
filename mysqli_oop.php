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

// echo "connected ...";
// Create data base 
// $sql = "CREATE DATABASE IF NOT EXISTS connect";

// if ($conn->query($sql) === true) {
//   echo "databae created successfully";
// }
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

// $sql =
//   "INSERT INTO connect.MyGuests(firstname,lastname,email)
//  VALUES ('jhon','doe','jhondoe0123@gmail.com');SELECT LAST_INSERT_ID();";
// $sql .=
//   "INSERT INTO connect.MyGuests(firstname,lastname,email)
//  VALUES ('alex','smith','alexsmith0123@gmail.com');SELECT LAST_INSERT_ID();";
// $sql .=
//   "INSERT INTO connect.MyGuests(firstname,lastname,email)
//  VALUES ('ameelka','smirnova','ameelkasmirnova@gmail.com');SELECT LAST_INSERT_ID()";

// // isert multiple data
// /*$conn->query($sql) === TRUE*/
// if ($conn->multi_query($sql) === true) {
//   do {
//     if ($result = $conn->store_result()) {
//       while ($row = $result->fetch_row()) {
//         var_dump($row);
//       }
//     }
//   } while ($conn->next_result());

// } else {
//   echo "Error" . $sql . "</br>" . $conn->error;
// }


/// mysql prepare statment
// $stmt = $conn->prepare("INSERT INTO connect.myguests(firstname,lastname,email)
// VALUES(?,?,?);
// ");
// $stmt->bind_param('sss', $firstname, $lastname, $email);
// // set parameters and execute
// $firstname = "aaa";
// $lastname = "aaa";
// $email = "aaa@example.com";
// $stmt->execute();

// $firstname = "bbb";
// $lastname = "bbb";
// $email = "bbb@example.com";
// $stmt->execute();

// $firstname = "ccc";
// $lastname = "ccc";
// $email = "ccc@example.com";
// $stmt->execute();

// echo "New records created successfully";

// $stmt->close();

// select data

$sql = "SELECT * FROM connect.myguests";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table style='border-collapse: collapse;border: 1px solid black;'>";
  while ($row = $result->fetch_assoc()) {

    echo "<tr style='border: 1px solid #ddd;'><td style='border: 2px solid #ddd;' >id: {$row['id']}</td>
<td style='border: 2px solid #ddd;'>Name: {$row['firstname']}</td>
<td style='border: 2px solid #ddd;'>{$row['lastname']}</td>
<td style='border: 2px solid #ddd;'>email: {$row['email']}</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();