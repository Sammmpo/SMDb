<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php


$insertedUsername = $_POST['input_username'];

$length = strlen($insertedUsername);
if ($length < 4){
	echo "Username has to be at least 4 characters long. <br>";
	header("Refresh:3; url=http://localhost:8080/SMDb/register.php");
} else {

		$query = "SELECT username from account where username='$insertedUsername'";
		$result = mysqli_query($db,$query);

		if (mysqli_num_rows($result) > 0 ) {
			// while($row = mysqli_fetch_assoc($result)) {
				$row = mysqli_fetch_assoc($result);
				$username = $row["username"];
				echo "<br> Username: ''" . $username . "''  is already taken. Try another one.<br>";
				header("Refresh:4; url=http://localhost:8080/SMDb/register.php");
			// }
		} else

if ( $_POST['input_password'] === $_POST['input_passwordagain'] ) {

				$sql = "INSERT INTO account (username, password, points) VALUES ('$_POST[input_username]', '$_POST[input_password]', 0)";

				if ($conn->query($sql) === TRUE) {
					echo "Your account was created successfully. Please log in.";
					header("Refresh:3; url=http://localhost:8080/SMDb/login.php");
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
					header("Refresh:4; url=http://localhost:8080/SMDb/register.php");
				}

	} else {
				echo  "<br> Your passwords do not match. Please try again.";
				header("Refresh:3; url=http://localhost:8080/SMDb/register.php");
	}}




?>
</div>
</html>
