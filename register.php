<!DOCTYPE html>
<html lang="en">
<?php include 'includer.php';?>


<title>SMDb - Register</title>

<head></head>

<body>

<div class="container">

<div class="col-lg-4.5 col-md-3.5 col-sm-3 col-xs-1">
</div>

<div class="col-lg-3 col-md-5 col-sm-6 col-xs-11 whitebg focus">

  <a class="nounderline" href="list.php">
    <div class="title">
        <h1>SMDb</h1>
        <br>
        <h2>Sam's Movie Database</h2>
    </div>
  </a>

    <form action="register_process.php" method="POST">
      <div class="form-group">
        <input type="username" class="form-control" id="username" name="input_username" value="<?php if (isset($_SESSION['input_username'])) { echo $_SESSION['input_username']; } ?>" placeholder="Username">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="pwd" name="input_password" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="pwd" name="input_passwordagain" placeholder="Confirm Password">
      </div>
      <input type="submit" class="cleanButton" value="Sign up">
      </form>
      <br><br>
    <span class="text">Already have an account?</span><br><br><a href="login.php">Log in here</a>
      <br><br><br>

</div>

<div class="col-lg-4.5 col-md-3.5 col-sm-3 col-xs-1"></div>

</div>

</body>

</html>
