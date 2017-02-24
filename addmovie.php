<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>


<title>SMDb - Add Movie</title>

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

  <span class="text">Movie Details</span><br><br>
    <form action="addmovie_process.php" method="POST">
      <div class="form-group">
        <input type="text" class="form-control" id="username" name="input_moviename" placeholder="Movie Name">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="pwd" name="input_movieyear" placeholder="Release Year">
      </div>

      <div class="form-group" style="text-align: left">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <input type="checkbox" name="input_moviegenre0" value=1> Action<br>
        <input type="checkbox" name="input_moviegenre1" value=1> Adventure<br>
        <input type="checkbox" name="input_moviegenre2" value=1> Biography<br>
        <input type="checkbox" name="input_moviegenre3" value=1> Comedy<br>
        <input type="checkbox" name="input_moviegenre4" value=1> Crime<br>
        <input type="checkbox" name="input_moviegenre5" value=1> Document<br>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <input type="checkbox" name="input_moviegenre6" value=1> Drama<br>
        <input type="checkbox" name="input_moviegenre7" value=1> Family<br>
        <input type="checkbox" name="input_moviegenre8" value=1> Fantasy<br>
        <input type="checkbox" name="input_moviegenre9" value=1> History<br>
        <input type="checkbox" name="input_moviegenre10" value=1> Horror<br>
        <input type="checkbox" name="input_moviegenre11" value=1> Mystery<br>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <input type="checkbox" name="input_moviegenre12" value=1> Romance<br>
        <input type="checkbox" name="input_moviegenre13" value=1> Sci-Fi<br>
        <input type="checkbox" name="input_moviegenre14" value=1> Thriller<br>
        <input type="checkbox" name="input_moviegenre15" value=1> War<br>
        <input type="checkbox" name="input_moviegenre16" value=1> Western<br>
        <br><br>
        </div>

      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="pwd" name="input_movietrailer" placeholder="Trailer (https://www.youtube.com/embed/YoHD9XEInc0)">
      </div>
      <input type="submit" class="yesButton" value="Add">
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
