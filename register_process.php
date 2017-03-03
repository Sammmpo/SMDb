<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php


$insertedUsername = $_POST['input_username'];
$length = strlen($insertedUsername);
if ($length < 4){ // Preventing extremely short usernames.
	echo "Username has to be at least 4 characters long. <br>";
	header("Refresh:3; register.php");
} else { // If enough characters, continue.

	// Ends the action if the username already exists.
		$query = "SELECT username from account where username='$insertedUsername'";
		$result = mysqli_query($db,$query);
		if (mysqli_num_rows($result) > 0 ) {
				$row = mysqli_fetch_assoc($result);
				$username = $row["username"];
				echo "<br> Username: ''" . $username . "''  is already taken. Try another one.<br>";
				header("Refresh:4; register.php");
		} else // If the username is not taken, continue.

// Making sure the "password" and "confirm password" match each other.
if ( $_POST['input_password'] === $_POST['input_passwordagain'] ) { // If true, account is ready to be created.
				$sql = "INSERT INTO account (username, password) VALUES ('$_POST[input_username]', '$_POST[input_password]')";
				if ($conn->query($sql) === TRUE) {
					echo "Your account was created successfully. Please log in.";
					header("Refresh:3; login.php");
				} else { // If unexpected error happens, go safely back to the Register page.
					echo "Error: " . $sql . "<br>" . $conn->error;
					header("Refresh:4; register.php");
				}
	} else {
				echo  "<br> Your passwords do not match. Please try again.";
				header("Refresh:3; register.php");
	}}

?>
</div>

</html>
