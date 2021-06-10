<?php

// using php data objects
$servername = "localhost";
$username = "root";
$password = "";

try {
  $connect = new PDO("mysql:host=$servername", $username, $password);
  // set attr of error mode 
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE connect ";
  $connect->exec($sql);
  echo "data base created ...";
  // sql to create table
  $sql = "CREATE TABLE MyGuests (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(30) NOT NULL,
      lastname VARCHAR(30) NOT NULL,
      email VARCHAR(50),
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table MyGuests created successfully";

  $sql = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
  $last_id = $conn->lastInsertId();
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} catch (PDOException $e) {
  echo $sql . "</br>" . $e->getMessage();
}



$connect = null;