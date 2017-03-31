<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php

if (isset($_COOKIE['sessionID'])){
	$_SESSION['sessionID'] = $_COOKIE['sessionID'];
}
if (isset($_SESSION['sessionID'])) {
	$temp = $_SESSION['sessionID'];
	setcookie('sessionID', $temp, time() + (60 * 60 * 24 * 30)); // Refreshing the cookie.
	echo "Continuing Session...<br><br>Entering SMDb...";
	header("Refresh:2; list.php");
} else { // If there are no cookies or sessions.

?>
</div>

<!DOCTYPE html>
<html lang="en">

<title>SMDb - Login</title>
<head></head>

<body>

<div class="container">

<div class="col-lg-4.5 col-md-3.5 col-sm-3 col-xs-1"></div>

<div class="col-lg-3 col-md-5 col-sm-6 col-xs-11 whitebg focus">

  <div class="title">
      <h1>SMDb</h1>
      <br>
      <h2>Sam's Movie Database</h2>
  </div>

  <form action="login_process.php" method="post">
    <div class="form-group">
      <input type="username" class="form-control" id="username" name="login_username" placeholder="Username">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pwd" name="login_password" placeholder="Password">
    </div>
    <input type="submit" class="cleanButton" value="Login">
    </form>
    <br><br>
  <span class="text">Not a member?</span><br><br><a href="register.php">Register now</a>
    <br><br><br>

</div>

<div class="col-lg-4.5 col-md-3.5 col-sm-3 col-xs-1">
</div>

</div>

</body>

</html>

<?php } /* This is to close the else-statement */ ?>
