<?php 
include 'header.php';

if (isset($_SESSION['id'])) {
  $uid = $_SESSION['uid'];
  $welcomeMsg = "Welcome " . $uid . "!<br />Way to go!<br />You are logged in!";
  echo $welcomeMsg;
} else {
  echo "You are not logged in!";
}

?>

</body>
</html>