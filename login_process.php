<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php

// Storing the Login form data to variables
$myusername = $_POST['login_username'];
$mypassword = $_POST['login_password'];

// Checking if an account with this username-password combination exists
$query = "SELECT id from account where username='$myusername' AND password='$mypassword'";
$result = mysqli_query($db,$query);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $currentID = $row["id"];
        $_SESSION['sessionID'] = $currentID; // Session now knows the account ID
        echo "Logged in successfully. You will be sent to your page.";
        header("Refresh:3; list.php");
    }
} else { // There is no account with this username-password combination
    echo "Invalid Username or Password. Try again.";
    header("Refresh:2; login.php");
}

?>
</div>

</html>
