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

   $db = mysqli_connect($servername, $username, $password, $dbname);

?>


<?php
/* Prepared Statements */

$stmtRegister = $conn->prepare("INSERT INTO account (username, password) VALUES (?, ?)");
$stmtRegister->bind_param("ss", $insertedUsername, $cryptedPassword);

$stmtAddMovie = $conn->prepare("INSERT INTO movie (name, year, trailer, addedBy) VALUES (?, ?, ?, ?)");
$stmtAddMovie->bind_param("ssss", $inputName, $inputYear, $convertedTrailer, $inputUser);

$stmtAddLink = $conn->prepare("INSERT INTO link (mID, gID) VALUES (?, ?)");
$stmtAddLink->bind_param("ss", $newestID, $temp);

$stmtDelete = $conn->prepare("DELETE FROM movie WHERE id = ?");
$stmtDelete->bind_param("i", $rowid);

$stmtDeleteLink = $conn->prepare("DELETE FROM link WHERE mid = ?");
$stmtDeleteLink->bind_param("i", $rowid);

?>


</html>
