<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php
$inputName = $_POST['input_moviename'];
$inputYear = $_POST['input_movieyear'];
$inputTrailer = $_POST['input_movietrailer'];

$genres = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

for ($i=0; $i<=16; $i++){
$genres[$i] = $_POST['input_moviegenre'.$i];
}

$nameLength = strlen($inputName);
if ($nameLength < 3){
	echo "Movie Name has to be at least 3 characters long. <br>";
	header("Refresh:2; url=http://localhost:8080/SMDb/addmovie.php");
} else if ($inputYear < 1000) {
	echo "Release year must be later than 1000. <br>";
	header("Refresh:2; url=http://localhost:8080/SMDb/addmovie.php");
} else {


			$sql = "INSERT INTO movie (name, year, trailer) VALUES ('$inputName', $inputYear, '$inputTrailer')";
			if ($conn->query($sql) === TRUE) {
				echo "Adding Movie...";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$sql = "SELECT id FROM movie WHERE id = (SELECT MAX(id) FROM movie)";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        $newestID = $row["id"];
					}
			}

for ($i=0; $i<=16; $i++) {
if ($genres[$i] == 1) {
			$sql = "INSERT INTO link (mID, gID) VALUES ($newestID, $i+1)";
			if ($conn->query($sql) === TRUE) {
				// echo "Adding Genres... ";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
}

			header("Refresh:1; url=http://localhost:8080/SMDb/list.php");

}
?>
</div>
