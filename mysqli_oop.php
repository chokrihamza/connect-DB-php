<?php

$servername = "localhost";
$username = "root";
$password = "";

// connect to the data base 

$connect = new mysqli($servername, $username, $password);

if ($connect->connect_error) {
  die("there is a problem when trying connect to DB" . $connect->connect_error);
}

echo "connected ...";
// Create data base 
$sql = "CREATE DATABASE connect";

if ($connect->query($sql) === true) {
  echo "databae created successfully";
} else {
  echo "Error creating DB" . $connect->error;
}
$sql = "DROP DATABASE IF EXISTS connect";
if ($connect->query($sql) === true) {
  echo "data base droped";
} else {
  echo "Error creating DB" . $connect->error;
}
$connect->close();