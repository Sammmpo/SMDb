<?php
if (!isset($_SESSION['sessionID'])){  // If there is no session, go to login page.
header("Location: login.php");
}

else {  // If there is a session, making sure it belongs to an active account.
    $id = $_SESSION['sessionID'];
    $query = "select id from account where id='$id'";
    $result = mysqli_query($db,$query);
    if (mysqli_num_rows($result) == 0 ) {
      header("Location: logout_process.php"); // If it doesn't, log out.
    }
}
?>
