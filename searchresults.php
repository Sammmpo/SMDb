<!DOCTYPE html>
<html lang="en">
<?php
include 'includer.php';
include 'session_checker.php';
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $currentID = $_SESSION['sessionID']; // Just in case we need to know who we are.
  $search = $_POST['genre']; // Value of 1-17, aka genre ID.
  $results = array("Action", "Adventure", "Biography", "Comedy", "Crime", "Documentary", "Drama", "Family", "Fantasy", "History", "Horror", "Mystery", "Romance", "Sci-Fi", "Thriller", "War", "Western");
  $match = $results[($search-1)]; // Matching the 1-17 genres with the 0-16 array.
} else { header("Location: login.php"); }
?>

<title>SMDb - Search Results</title>

<head></head>

<body>
<br>
<div class="container">

<div class="col-lg-1 col-md-1 col-sm-1 col-xs-0"></div>

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 whitebg">

  <a class="nounderline" href="list.php">
    <div class="title">
        <h1>SMDb</h1>
        <br>
        <h2>Sam's Movie Database</h2>
    </div>
  </a>





<div class="div-padding">
  <span class="bolda">Database > "<?php echo $match; ?>" Movies</span>
</div><br>

<?php
// The following spaghetti lists all search results (movies).

    $sqlp2 = "SELECT mid FROM link  WHERE gid = $search"; // Using genreID to find the right movieIDs.
    $resultp2 = $conn->query($sqlp2);
    if ($resultp2->num_rows > 0){
      while ($rowp2 = $resultp2->fetch_assoc()){

        $sql = "SELECT id, name, year, trailer, addedBy FROM movie WHERE id = $rowp2[mid]"; // Using movieIDs to find the movie details.
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) { // Printing all movies with the searched genre.
                 echo "<div class='movie-box'>";
                 echo "<div class='padding'><span class='movie-title'>" . $row["name"] . " (" . $row["year"] . ")</span></div>" ;


                 echo "<div class='padding'><span class='movie-info'>Genre: "; // Finding out what other genres match this movie.
                 $sql2 = "SELECT mid, gid FROM link WHERE mid = $row[id]";
                 $result2 = $conn->query($sql2);
                 if ($result2->num_rows > 0){
                   while($row2 = $result2->fetch_assoc()){
                      $sql3 = "SELECT name FROM genre WHERE id = $row2[gid]";
                      $result3 = $conn->query($sql3);
                      if ($result3->num_rows > 0){
                        while($row3 = $result3->fetch_assoc()){ // Printing all matching genres.
                          echo " [" . $row3['name'] . "] ";
                        }
                      }
                   }
                 }
                 $inputId = $row["addedBy"];
                 $stmtFindUsername->execute();
                 $stmtFindUsername->bind_result($resultName);
                 $stmtFindUsername->store_result();
                 $stmtFindUsername->fetch();
                 if ($stmtFindUsername->num_rows > 0) {
                     $addedBy = $resultName;
                 } else { $addedBy = "Default"; }
                 echo "</div><div class='padding movie-info'>Added by: " . $addedBy . "</div>"; // Print the account name that added this movie to the database.



                 echo "<span class='movie-info'>";
                 if (strlen($row["trailer"]) > 10){
                   echo "<center><iframe style='height:19.25vmax; width:35vmax;' class='img-responsive' src='https://www.youtube.com/embed/";
                   echo $row["trailer"];
                   echo "' frameborder='0' allowfullscreen></iframe></center>";
                 } else { echo "Trailer not available.<br><br>"; }
                 echo "</span></div><br>";
             }
        }
      }
    } else { echo "<div class='noButton'><br>No movies found.<br><br></div>"; } // If there are no movies of the searched Genre.

$conn->close();
?>

<br>
  <form action="list.php" method="post">
  <input class="noButton" type="submit" value="Back">
</form>

<div class="div-padding">
  <br><br>
  <a href="logout_process.php">Log out</a>
  <br><br>
</div>

</div>

<div class="col-lg-1 col-md-1 col-sm-1 col-xs-0"></div>

</div>
<br>

<script src="js/main.js"></script>
</body>

</html>
