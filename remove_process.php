<?php
/* This is ran when trying to delete a movie. */
?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'includer.php';
include 'session_checker.php';
?>

<div class="error">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $currentID = $_SESSION['sessionID'];
    $rowid     = $_POST['id'];

    if ($stmtDelete->execute()) { // Deleting data from the movie table.
        echo "The movie has been removed from SMDb.";
    } else {
        echo "Something went wrong.";
    }

    if ($stmtDeleteLink->execute()) { // Deleting data from the link table.
        echo "<br><br>Cleaning up the database...";
    } else {
        echo "Something went wrong.";
    }

    mysqli_close($conn);
    header("Refresh:2; list.php");

} else {
    header("Location: login.php");
}
?>
</div>
</html>
