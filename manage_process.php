<?php
/* This is ran when trying to delete a movie. */
?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'includer.php';
include 'session_checker.php';
include 'admin_checker.php'; // This prevents non-admins from running this script.
?>

<div class="error">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $currentID = $_SESSION['sessionID'];
    $userToBePromoted     = $_POST['id'];

    if ($stmtPromote->execute()) { // Promoting the account to an admin.
        echo "The User ID:".$userToBePromoted." is now an admin.";
    } else {
        echo "Something went wrong.";
    }

    mysqli_close($conn);
    header("Refresh:3; manage.php");

} else {
    header("Location: login.php");
}
?>
</div>
</html>
