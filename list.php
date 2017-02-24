<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>



<?php
$currentID = $_SESSION['sessionID'];

 function movieName($db, $id) {
   $query = "SELECT name from movie where id='$id'";
   $result = mysqli_query($db,$query);
   $movie = $result->fetch_assoc();
   echo $movie["name"];
 }

 function movieDesc($db, $id){
   $query = "SELECT description from movie where id='$id'";
   $result = mysqli_query($db,$query);
   $movie = $result->fetch_assoc();
   echo $movie["description"];
 }

 function movieReward($db, $id){
   $query = "SELECT reward from movie where id='$id'";
   $result = mysqli_query($db,$query);
   $movie = $result->fetch_assoc();
   echo $movie["reward"];
 }

 ?>

<title>SMDb - Database</title>

<head>
</head>

<body>
<br>
<div class="container">

<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
</div>

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 whitebg">

<div class="title">
      <h1>SMDb</h1>
      <br>
      <h2>Sam's Movie Database</h2>
</div>

<div class="div-padding">
  <span class="bolda">List of All Movies</span>
</div>
<div class="div-padding">

</div>
<form action="search.php" method="post">
<input class="cleanButton" type="submit" value="Search">
</form>
<br><br>

<?php

$sql = "SELECT id, name, year, trailer FROM movie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<div class='movie-box'>";
         echo "<span class='movie-title'>" . $row["name"] . " (" . $row["year"] . ")</span>" ;
         echo "<br><br>";
         echo "<span class='movie-info'>Genre: ";
         $sql2 = "SELECT mid, gid FROM link WHERE mid = $row[id]";
         $result2 = $conn->query($sql2);
         if ($result2->num_rows > 0){
           while($row2 = $result2->fetch_assoc()){
              $sql3 = "SELECT name FROM genre WHERE id = $row2[gid]";
              $result3 = $conn->query($sql3);
              if ($result3->num_rows > 0){
                while($row3 = $result3->fetch_assoc()){
                  echo " [" . $row3['name'] . "] ";
                }
              }
           }
         }
         echo "</span>";
         echo "<br><br>";
         if (strlen($row["trailer"]) > 10){
           $height = 315;
         } else { $height = 0; }
         echo "<span class='movie-info'><iframe width='100%' height='$height' src='";
         echo $row["trailer"];
         echo "' frameborder='0' allowfullscreen></iframe></span>";
         $rowid = $row['id'];
         echo "<form action='remove_process.php' method='post'>";
         echo "<input type='hidden' value='$rowid' name='id'>";
         echo "<input class='movie-complete' type='submit' value='Remove from SMDb'></form>";
         echo "</div><br>";
     }
} else {
     echo "<br><div class='noButton'><br>No movies found. Add one!<br><br></div>";
}

$conn->close();

?>

<br><br><br>
<form action="addmovie.php" method="post">
<input class="yesButton" type="submit" value="Add New Movie">
</form>

<div class="div-padding">
  <br><br>
  <a href="login.php">Log out</a>
  <br><br>
</div>

</div>

<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
</div>

</div>
<br>

<script src="js/main.js"></script>
</body>

</html>
