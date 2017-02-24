<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>


<title>SMDb - Login</title>

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

    <form action="login_process.php" method="post">
      <div class="form-group">
        <input type="username" class="form-control" id="username" name="login_username" placeholder="Username">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="pwd" name="login_password" placeholder="Password">
      </div>
      <input type="submit" class="cleanButton" value="Login">
      <!-- <button type="login" class="btn btn-block">Login</button> -->
      </form>
      <br><br>
    <span class="text">Not a member?</span><br><br><a href="register.php">Register now</a>
      <br><br><br>



</div>

<div class="col-lg-4.5 col-md-3.5 col-sm-3 col-xs-1">
</div>



</div>

</body>


</html>
