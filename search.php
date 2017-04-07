<!DOCTYPE html>
<html lang="en">
<?php
include 'includer.php';
include 'session_checker.php';
?>

<title>SMDb - Search</title>

<head></head>

<body>

<div class="container">

<div class="col-lg-3 col-md-2 col-sm-1 col-xs-0.5"></div>

<div class="col-lg-6 col-md-8 col-sm-10 col-xs-11 whitebg focus">

  <a class="nounderline" href="list.php">
    <div class="title">
        <h1>SMDb</h1>
        <br>
        <h2>Sam's Movie Database</h2>
    </div>
  </a>

  <span class="text">Select Genre</span><br>
    <form action="searchresults.php" method="POST">

      <div class="form-group" style="text-align: left; font-size: calc(0.75em + 0.75vmin);">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <input type="radio" name="genre" value=1 checked> Action<br>
        <input type="radio" name="genre" value=2> Adventure<br>
        <input type="radio" name="genre" value=3> Biography<br>
        <input type="radio" name="genre" value=4> Comedy<br>
        <input type="radio" name="genre" value=5> Crime<br>
        <input type="radio" name="genre" value=6> Documentary<br>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <input type="radio" name="genre" value=7> Drama<br>
        <input type="radio" name="genre" value=8> Family<br>
        <input type="radio" name="genre" value=9> Fantasy<br>
        <input type="radio" name="genre" value=10> History<br>
        <input type="radio" name="genre" value=11> Horror<br>
        <input type="radio" name="genre" value=12> Mystery<br>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <input type="radio" name="genre" value=13> Romance<br>
        <input type="radio" name="genre" value=14> Sci-Fi<br>
        <input type="radio" name="genre" value=15> Thriller<br>
        <input type="radio" name="genre" value=16> War<br>
        <input type="radio" name="genre" value=17> Western<br>
        <br><br><br>
        </div>

      </div>

      <input type="submit" class="cleanButton" value="Search">
      </form>
      <br>
      <form action="list.php" method="post">
      <input class="noButton" type="submit" value="Cancel">
      </form>
    <br><br><br>
    <a href="logout_process.php">Log out</a>
      <br><br><br>

</div>

<div class="col-lg-3 col-md-2 col-sm-1 col-xs-0.5"></div>

</div>

</body>

</html>
