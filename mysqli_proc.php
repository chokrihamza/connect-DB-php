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




mysqli_close($connect);