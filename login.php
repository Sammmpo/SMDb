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
	$query = "SELECT id FROM account WHERE id='$temp'";
	$result = mysqli_query($db,$query);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			setcookie('sessionID', $row['id'], time() + (60 * 60 * 24 * 30)); // Setting up the cookie.
			echo "Continuing Session...<br><br>Entering SMDb...";
			header("Refresh:2; list.php");
		}
		} else { // There is no account with this username-password combination
			echo "Something went wrong.<br><br>Logged out.";
      // If the user is logged in, delete the session data and destroy the session
      if (isset($_SESSION['sessionID'])) {

        // Delete the session data by clearing the $_SESSION array
        $_SESSION = array();

        // Delete the session cookie by setting its expiration to an hour ago (3600)
        if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600);
        }

        // Destroy the session
        session_destroy();
      }

      // Delete the cookie by setting its expiration to an hour ago (3600 secs)
      setcookie('sessionID', '', time() - 3600);

      // Redirect to the home page
			header("Refresh:2; login.php");
		}
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

<?php } // This is to close the else-statement
 ?>
