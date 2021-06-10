<?php

// using php data objects
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);

  // set attr of error mode 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->beginTransaction();

  $conn->exec("INSERT INTO connect.myguests (firstname, lastname, email)
  VALUES ('fdgfh', 'hjgj', 'john@example.com')");
  $conn->exec("INSERT INTO connect.myguests (firstname, lastname, email)
  VALUES ('hjhk', 'hjghjgh', 'mary@example.com')");
  $conn->exec("INSERT INTO connect.myguests (firstname, lastname, email)
  VALUES ('Jjoio', 'Djhkhk', 'julhgjhjie@example.com')");

  // commit the transaction
  $conn->commit();

  echo "records created successfully";
} catch (PDOException $e) {
  $conn->rollback();
  echo  "</br>" . $e->getMessage();
}



$connect = null;