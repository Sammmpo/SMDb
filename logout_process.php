<?php
/* This is ran when the Logout-button is pressed. */
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php

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
    echo "Logged out.";
    header("Refresh:2; login.php");

?>
</div>

</html>
