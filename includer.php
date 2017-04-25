<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">

<?php
/* This file is included in ALL other files. */
/* This file contains Connections, Session_Start and Prepared Statements. */
?>

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
/* Prepared Statements (UPDATE Table) */

$stmtRegister = $conn->prepare("INSERT INTO account (username, password) VALUES (?, ?)");
$stmtRegister->bind_param("ss", $insertedUsername, $cryptedPassword);

$stmtAddMovie = $conn->prepare("INSERT INTO movie (name, year, trailer, addedBy) VALUES (?, ?, ?, ?)");
$stmtAddMovie->bind_param("ssss", $inputName, $inputYear, $convertedTrailer, $inputId);

$stmtAddLink = $conn->prepare("INSERT INTO link (mID, gID) VALUES (?, ?)");
$stmtAddLink->bind_param("ss", $newestMID, $newestGID);
/* Adding a Link between the Movie and Genres. */

$stmtDelete = $conn->prepare("DELETE FROM movie WHERE id = ?");
$stmtDelete->bind_param("i", $rowid);
/* This is used for deleting a specific movie. */

$stmtDeleteLink = $conn->prepare("DELETE FROM link WHERE mid = ?");
$stmtDeleteLink->bind_param("i", $rowid);
/* This is used to get rid of the old, useless data. */

$stmtPromote = $conn->prepare("UPDATE account SET admin = 1 WHERE id = ?");
$stmtPromote->bind_param("i", $userToBePromoted);

/* Prepared Statements (READ Table) */

$stmtLogin = $conn->prepare("SELECT id from account where username=? AND password=?");
$stmtLogin->bind_param("ss", $myusername, $mycrypt);
/* This is used in "login_process.php" */

$stmtCheckUsername = $conn->prepare("SELECT username from account where username=?");
$stmtCheckUsername->bind_param("s", $insertedUsername);
/* This is used in "register_process.php" to see if the username is already taken. */

$stmtFindUsername = $conn->prepare("SELECT username FROM account WHERE id =?");
$stmtFindUsername->bind_param("s", $inputId);
/* This is used in "addmovie_process.php" for addedBy-value. */

$stmtMovieCount = $conn->prepare("SELECT COUNT(*) FROM movie");
/* This is used in "addmovie_process.php". */

$stmtNewestMID = $conn->prepare("SELECT MAX(id) FROM movie");
/* This is used in "addmovie_process.php" to get the ID of the recently added movie. */

?>


</html>
