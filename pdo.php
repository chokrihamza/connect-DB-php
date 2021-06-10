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
} catch (PDOException $e) {
  echo $sql . "</br>" . $e->getMessage();
}



$connect = null;