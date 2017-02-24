<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>

<div class="error">
<?php
$currentID = $_SESSION['sessionID'];

$rowid = $_POST['id'];



$sql = "DELETE FROM movie WHERE id = $rowid";
if (mysqli_query($conn, $sql)) {
    echo "Success.";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

$sql = "DELETE FROM link WHERE mid = $rowid";
if (mysqli_query($conn, $sql)) {
    // echo "Success.";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

        header("Refresh:1; url=http://localhost:8080/SMDB/list.php");
?>
</div>
</html>
