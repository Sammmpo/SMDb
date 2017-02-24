<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>


<title>SMDb - Search</title>

<head>

</head>


<body>

<div class="container">


<div class="col-lg-4.5 col-md-3.5 col-sm-3 col-xs-1">
</div>

<div class="col-lg-3 col-md-5 col-sm-6 col-xs-10 whitebg focus">

  <div class="title">
      <h1>SMDb</h1>
      <br>
      <h2>Sam's Movie Database</h2>
</div>

  <span class="text">Select Genre</span><br>
    <form action="searchresults.php" method="POST">

      <div class="form-group" style="text-align: left">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <input type="radio" name="genre" value=1 checked> Action<br>
        <input type="radio" name="genre" value=2> Adventure<br>
        <input type="radio" name="genre" value=3> Biography<br>
        <input type="radio" name="genre" value=4> Comedy<br>
        <input type="radio" name="genre" value=5> Crime<br>
        <input type="radio" name="genre" value=6> Document<br>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <input type="radio" name="genre" value=7> Drama<br>
        <input type="radio" name="genre" value=8> Family<br>
        <input type="radio" name="genre" value=9> Fantasy<br>
        <input type="radio" name="genre" value=10> History<br>
        <input type="radio" name="genre" value=11> Horror<br>
        <input type="radio" name="genre" value=12> Mystery<br>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <input type="radio" name="genre" value=13> Romance<br>
        <input type="radio" name="genre" value=14> Sci-Fi<br>
        <input type="radio" name="genre" value=15> Thriller<br>
        <input type="radio" name="genre" value=16> War<br>
        <input type="radio" name="genre" value=17> Western<br>
        <br><br>
        </div>

      </div>

      <input type="submit" class="cleanButton" value="Search">
      </form>
      <br>
      <form action="list.php" method="post">
      <input class="noButton" type="submit" value="Cancel">
      </form>
    <br><br><br>
    <a href="login.php">Log out</a>
      <br><br><br>



</div>

<div class="col-lg-4.5 col-md-3.5 col-sm-3 col-xs-1">
</div>


</div>

</body>


</html>
