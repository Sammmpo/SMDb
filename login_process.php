<?php
/* This is ran after filling the login form. */
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Storing the Login form data to variables
$myusername = $_POST['login_username'];
$mypassword = $_POST['login_password'];
$mycrypt = crypt($mypassword, "abc");

  // Checking if an account with this username-password combination exists

  $stmtLogin->execute();
  $stmtLogin->bind_result($result);
  $stmtLogin->store_result();
  $stmtLogin->fetch();
  if ($stmtLogin->num_rows > 0) {
    $_SESSION['sessionID'] = $result;
    setcookie('sessionID', $result, time() + (60 * 60 * 24 * 30)); // Setting up the cookie.
    echo "Logged in successfully.<br><br>Entering SMDb...";
    header("Refresh:2; list.php");
  } else {
    echo "Invalid Username or Password.<br><br>Please try again.";
    header("Refresh:2; login.php");
  }

} else { header("Location: login.php"); }

?>
</div>

</html>
