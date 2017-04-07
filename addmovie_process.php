<?php
/* This is ran when trying to add a movie. */
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

    $inputName    = $_POST['input_moviename'];
    $inputYear    = $_POST['input_movieyear'];
    $inputTrailer = $_POST['input_movietrailer'];
    $inputId      = $_SESSION['sessionID'];

    $_SESSION['input_moviename'] = $_POST['input_moviename'];
    $_SESSION['input_movieyear'] = $_POST['input_movieyear'];
    $_SESSION['input_movietrailer'] = $_POST['input_movietrailer'];


    $stmtFindUsername->execute();
    $stmtFindUsername->bind_result($result);
    $stmtFindUsername->store_result();
    $stmtFindUsername->fetch();
    if ($stmtFindUsername->num_rows > 0) {
        $addedBy = $result;
    }

    $convertedTrailer = substr($inputTrailer, 32, 11);

    $genres = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    for ($i = 0; $i < sizeof($genres); $i++) {
        $genres[$i] = $_POST['input_moviegenre' . $i];
    }

    $nameLength = strlen($inputName);
    if ($nameLength < 3) {
        echo "Movie Name has to be at least 3 characters long. <br>";
        header("Refresh:2; addmovie.php");
    } else if ($inputYear < 1890) {
        echo "Release Year must be later than 1890. <br>";
        header("Refresh:2; addmovie.php");
    } else {

        $stmtMovieCount->execute();
        $stmtMovieCount->bind_result($result);
        $stmtMovieCount->store_result();
        $stmtMovieCount->fetch();
        $movieCount = 0;
        if ($stmtMovieCount->num_rows > 0) {
            $movieCount = $result;
        }

        if ($movieCount >= 50) { // Limit to avoid database crash.
            echo "The database is full.<br>";
            header("Refresh:2; addmovie.php");
        } else { // If requirements are satisfied, continue.

            if ($stmtAddMovie->execute()) { // Prepared Statement
                echo "Adding Movie...";
            } else {
                echo "Something went wrong.";
            }

            $stmtNewestMID->execute();
            $stmtNewestMID->bind_result($result);
            $stmtNewestMID->store_result();
            $stmtNewestMID->fetch();
            if ($stmtNewestMID->num_rows > 0) {
                $newestMID = $result;
            }

            for ($i = 0; $i < 17; $i++) {
                if ($genres[$i] == 1) {
                    $newestGID = $i + 1;
                    if ($stmtAddLink->execute()) { // Prepared Statement
                    } else {
                        echo "Error: Failed to add genres.";
                    }
                }
            }
            $_SESSION['input_moviename'] = "";
            $_SESSION['input_movieyear'] = "";
            $_SESSION['input_movietrailer'] = "";
            header("Refresh:1; list.php");
        }
    }

} else {
    header("Location: login.php");
}
?>
</div>
