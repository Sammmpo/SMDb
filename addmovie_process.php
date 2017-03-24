<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>
<?php include 'session_checker.php';?>

<div class="error">
<?php
$inputName = $_POST['input_moviename'];
$inputYear = $_POST['input_movieyear'];
$inputTrailer = $_POST['input_movietrailer'];
$inputId = $_SESSION['sessionID'];

$sql = "SELECT username FROM account WHERE id=$inputId";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
				$inputUser = $row["username"];
		}
}

$convertedTrailer = substr($inputTrailer, 32, 11);

$genres = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

for ($i=0; $i<=16; $i++){
$genres[$i] = $_POST['input_moviegenre'.$i];
}

$nameLength = strlen($inputName);
if ($nameLength < 3){
	echo "Movie Name has to be at least 3 characters long. <br>";
	header("Refresh:2; addmovie.php");
} else if ($inputYear < 1000) {
	echo "Release Year must be later than 1000. <br>";
	header("Refresh:2; addmovie.php");
} else {

$sql = "SELECT id FROM movie WHERE id = (SELECT MAX(id) FROM movie)";
$result = $conn->query($sql);
$idAmount = 0;
if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
				$idAmount = $row["id"];
		}
}
if ($idAmount >= 50) { // Limit to avoid database crash.
	echo "The database is full.<br>";
	header("Refresh:2; addmovie.php");
} else { // If requirements are satisfied, continue.

			if ($stmtAddMovie->execute()) { // Prepared Statement
			  echo "Adding Movie...";
			} else {
			  echo "Something went wrong.";
			}

			/*$sql = "INSERT INTO movie (name, year, trailer, addedBy) VALUES ('$inputName', $inputYear, '$convertedTrailer', '$inputUser')";
			if ($conn->query($sql) === TRUE) {
				echo "Adding Movie...";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}*/

			$sql = "SELECT id FROM movie WHERE id = (SELECT MAX(id) FROM movie)";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        $newestID = $row["id"];
					}
			}

for ($i=0; $i<=16; $i++) {
if ($genres[$i] == 1) {
		$temp = $i + 1;
		if ($stmtAddLink->execute()) { // Prepared Statement
			// echo "<br><br>Adding Genres... ";
		} else {
			echo "Something went wrong.";
		}
			/*$sql = "INSERT INTO link (mID, gID) VALUES ($newestID, $i+1)";
			if ($conn->query($sql) === TRUE) {
				// echo "Adding Genres... ";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}*/
		}
}

			header("Refresh:1; list.php");
}
}
?>
</div>
