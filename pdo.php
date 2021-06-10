<?php

// using php data objects
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);

  // set attr of error mode 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // $conn->beginTransaction();

  // $conn->exec("INSERT INTO connect.myguests (firstname, lastname, email)
  // VALUES ('fdgfh', 'hjgj', 'john@example.com')");
  // $conn->exec("INSERT INTO connect.myguests (firstname, lastname, email)
  // VALUES ('hjhk', 'hjghjgh', 'mary@example.com')");
  // $conn->exec("INSERT INTO connect.myguests (firstname, lastname, email)
  // VALUES ('Jjoio', 'Djhkhk', 'julhgjhjie@example.com')");

  // // commit the transaction
  // $conn->commit();
  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO connect.MyGuests (firstname, lastname, email)
   VALUES (:firstname, :lastname, :email)");
  $stmt->bindParam(':firstname', $firstname);
  $stmt->bindParam(':lastname', $lastname);
  $stmt->bindParam(':email', $email);
  // insert a row
  $firstname = "John";
  $lastname = "Doe";
  $email = "john@example.com";
  $stmt->execute();

  // insert another row
  $firstname = "Mary";
  $lastname = "Moe";
  $email = "mary@example.com";
  $stmt->execute();

  // insert another row
  $firstname = "Julie";
  $lastname = "Dooley";
  $email = "julie@example.com";
  $stmt->execute();

  echo "New records created successfully";
  echo "records created successfully";
} catch (PDOException $e) {
  $conn->rollback();
  echo  "</br>" . $e->getMessage();
}



$connect = null;