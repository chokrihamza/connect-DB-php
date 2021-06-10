<?php

// using php data objects
$servername = "localhost";
$username = "root";
$password = "";
class TableRows extends RecursiveIteratorIterator
{
  function __construct($it)
  {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current()
  {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
  }

  function beginChildren()
  {
    echo "<tr>";
  }

  function endChildren()
  {
    echo "</tr>" . "\n";
  }
}

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
  //   $stmt = $conn->prepare("INSERT INTO connect.MyGuests (firstname, lastname, email)
  //    VALUES (:firstname, :lastname, :email)");
  //   $stmt->bindParam(':firstname', $firstname);
  //   $stmt->bindParam(':lastname', $lastname);
  //   $stmt->bindParam(':email', $email);
  //  // insert a row
  //   $firstname = "John";
  //   $lastname = "Doe";
  //   $email = "john@example.com";
  //   $stmt->execute();

  //   // insert another row
  //   $firstname = "Mary";
  //   $lastname = "Moe";
  //   $email = "mary@example.com";
  //   $stmt->execute();

  //   // insert another row
  //   $firstname = "Julie";
  //   $lastname = "Dooley";
  //   $email = "julie@example.com";
  //   $stmt->execute();

  //   echo "New records created successfully";
  //   echo "records created successfully";

  $stmt = $conn->prepare("SELECT id, firstname, lastname FROM connect.myguests WHERE id>10 ORDER BY id  LIMIT 20,30");
  $stmt->execute();
  echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";
  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
    echo $v;
  }
} catch (PDOException $e) {
  $conn->rollback();
  echo  "</br>" . $e->getMessage();
}



$connect = null;