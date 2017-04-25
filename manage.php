<!DOCTYPE html>
<html lang="en">
<?php
include 'includer.php';
include 'session_checker.php';
include 'admin_checker.php'; // This prevents non-admins from running this script.
?>

<?php
$currentID = $_SESSION['sessionID'];
?>

<title>SMDb - Users</title>

<head></head>

<body>

<br>

<div class="container">

<div class="col-lg-1 col-md-1 col-sm-1 col-xs-0.0"></div>

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 whitebg">

<a class="nounderline" href="list.php">
  <div class="title">
      <h1>SMDb</h1>
      <br>
      <h2>Sam's Movie Database</h2>
  </div>
</a>

<?php
$inputId = $currentID;
$stmtFindUsername->execute();
$stmtFindUsername->bind_result($result);
$stmtFindUsername->store_result();
$stmtFindUsername->fetch();
if ($stmtFindUsername->num_rows > 0) {
    $name = $result;
}

?>



<div class="div-padding"><span class="bolda">Database > All Users</span><br><br></div>

<table>
  <tr>
  <th>ID</th>
  <th>Username</th>
  <th>Admin</th>
  </tr>

  <?php
  // List all accounts from the database.

  $sql    = "SELECT id, username, admin FROM account";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { // Repeat this x Amount of accounts.
          echo "<tr>";
          echo "<td>".$row['id']."</td>";
          echo "<td>".$row['username']."</td>";
          echo "<td>";
            if ($row['admin'] == 1){
              echo "Yes";
            } else {
              echo "No";
              echo "<form style='display: inline;' action='manage_process.php' method='post'>
              <input type='hidden' name='id' value=".$row['id'].">
              <input type='submit' value='Promote'>
              </form>";
            }
            echo "</td>";
          echo "</tr>";
        }
  }

  $conn->close();
  ?>

</table>

<br>

<br>
<form action="list.php" method="post">
<input class="noButton" type="submit" value="Cancel">
</form>


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
