<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">

<!-- This file is being included to all files. The idea is to have less lines of code. -->

<?php
	session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SMDb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected. <br>";
?>

<?php
   $db = mysqli_connect($servername, $username, $password, $dbname);
?>


</html>
