<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>
<?php include 'session_checker.php';?>

<div class="error">
<?php
$currentID = $_SESSION['sessionID'];

$rowid = $_POST['id'];

$sql = "DELETE FROM movie WHERE id = $rowid"; // Deleting the movie.
if (mysqli_query($conn, $sql)) {
    echo "The movie has been removed from SMDb.";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

$sql = "DELETE FROM link WHERE mid = $rowid"; // Freeing up space from the link table.
if (mysqli_query($conn, $sql)) {
    echo "<br><br>Cleaning up the database...";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

header("Refresh:2; list.php");
?>
</div>
</html>
