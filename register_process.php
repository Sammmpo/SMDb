<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php


$insertedUsername = $_POST['input_username'];
$unlength = strlen($insertedUsername);
if ($unlength < 4 || $unlength > 12){ // Preventing extremely short usernames.
	echo "Username needs 4-12 characters long.";
	header("Refresh:3; register.php");
} else { // If enough characters, continue.

$insertedPassword = $_POST['input_password'];
$cryptedPassword = crypt($insertedPassword, "abc");
$pwlength = strlen($insertedPassword);
if ($pwlength < 4 || $pwlength > 15){ // Preventing extremely short passwords.
	echo "Password needs to be 4-15 characters long.";
	header("Refresh:3; register.php");
} else { // If enough characters, continue.

// Ends the action if the username already exists.
	$query = "SELECT username from account where username='$insertedUsername'";
	$result = mysqli_query($db,$query);
	if (mysqli_num_rows($result) > 0 ) {
			$row = mysqli_fetch_assoc($result);
			$username = $row["username"];
			echo "<br> Username: ''" . $username . "''  is already taken.<br><br>Try another one.<br>";
			header("Refresh:4; register.php");
	} else // If the username is not taken, continue.

// Making sure the "password" and "confirm password" match each other.
if ( $_POST['input_password'] === $_POST['input_passwordagain']) { // If true, account is ready to be created.

	if ($stmtRegister->execute()) { // Prepared Statement
	  echo "Your account was created successfully.<br><br>Please log in.";
		header("Refresh:3; login.php");
	} else {
	  echo "Something went wrong.";
		header("Refresh:4; register.php");
	}

				/*$sql = "INSERT INTO account (username, password) VALUES ('$insertedUsername', '$cryptedPassword')";
				if ($conn->query($sql) === TRUE) {
					echo "Your account was created successfully.<br><br>Please log in.";
					header("Refresh:3; login.php");
				} else { // If unexpected error happens, returns back to the Register page.
					echo "<br>Error: " . $sql . "<br>" . $conn->error;
					header("Refresh:4; register.php");
				}*/
	} else {
				echo  "<br> Your passwords do not match.<br><br>Please try again.";
				header("Refresh:3; register.php");
	}}}

?>
</div>

</html>
