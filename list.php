<!DOCTYPE html>
<html lang="en">
<?php
include 'includer.php';
include 'session_checker.php';
?>

<?php
$currentID = $_SESSION['sessionID'];
?>

<title>SMDb - Database</title>

<head></head>

<body>

<br>

<div class="container">

<div class="col-lg-1 col-md-1 col-sm-1 col-xs-0.0"></div>

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 whitebg">

  <div class="title">
      <h1>SMDb</h1>
      <br>
      <h2>Sam's Movie Database</h2>
  </div>

<div class="div-padding"><span class="bolda">Database > All Movies</span><br><br></div>

<form action="search.php">
<input class="cleanButton" type="submit" value="Search"><br><br>
</form>

<form action="addmovie.php">
<input class="yesButton" type="submit" value="Add New Movie"><br><br><br>
</form>

<?php

// List all movies from the database.
$sql    = "SELECT id, name, year, addedBy FROM movie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { // Repeat this x Amount of movies.
        // Print movie name and year.
        echo "<div class='movie-box'>";
        echo "<div class='padding'><span class='movie-title'>" . $row["name"] . " (" . $row["year"] . ")</span></div>";
        echo "<span class='movie-info'><div class='padding'>Genre: ";
        // Use movieID (mid) foreign key to find the genres.
        $sql2    = "SELECT mid, gid FROM link WHERE mid = $row[id]";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) { // Find all rows from the Link table that relate to this movieID (mid).
                // Print genres.
                $sql3    = "SELECT name FROM genre WHERE id = $row2[gid]";
                $result3 = $conn->query($sql3);
                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        echo " [" . $row3['name'] . "] ";
                    }
                }
            }
        }
        echo "</div><div class='padding'>Added by: " . $row["addedBy"] . "</div>"; // Print the account name that added this movie to the database.
        echo "</span>";

        $queryAdmin   = "SELECT admin FROM account WHERE id=$currentID";
        $resultsAdmin = $conn->query($queryAdmin);
        $admin        = mysqli_fetch_row($resultsAdmin);

        $creator        = $row["addedBy"];
        $queryCreator   = "SELECT id FROM account WHERE username='$creator'";
        $resultsCreator = $conn->query($queryCreator);
        $creatorID      = mysqli_fetch_row($resultsCreator);
        if ($creatorID[0] == $currentID || $admin[0] == true) { // The user has to be the creator or admin in order to delete movies from SMDb.
            $rowid = $row['id'];
            echo "<form action='remove_process.php' method='post'>"; // For deleting movies.
            echo "<input type='hidden' value='$rowid' name='id'>"; // To delete this movie.
            echo "<input class='movie-remove' type='submit' value='Remove from SMDb'></form>";
        }

        echo "</div><br>";

    }
} else { // Just in case there are no movies in the database.
    echo "<br><div class='noButton'><br>No movies found. Add one!<br><br></div>";
}

$conn->close();
?>


<div class="div-padding">
  <br><br>
  <a href="logout_process.php">Log out</a>
  <br><br>
</div>

</div>

<div class="col-lg-1 col-md-1 col-sm-1 col-xs-0.0"></div>

</div>
<br>

<script src="js/main.js"></script>
</body>

</html>
