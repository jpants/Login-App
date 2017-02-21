<?php 

session_start();

include '../dbh.php';

$first = $_POST['first'];
$last  = $_POST['last'];
$uid   = $_POST['uid'];
$pwd   = $_POST['pwd'];
$pwd2  = $_POST['pwd2'];

if (empty($first)) {
  header("Location: ../signup.php?error=empty-first");
  exit();
}
else if (empty($last)) {
  header("Location: ../signup.php?error=empty-last");
  exit();
}
else if (empty($uid)) {
  header("Location: ../signup.php?error=empty-uid");
  exit();
}
else if (empty($pwd)) {
  header("Location: ../signup.php?error=empty-pwd1");
  exit();
}
else if (empty($pwd2)) {
  header("Location: ../signup.php?error=empty-pwd2");
  exit();
}
else {
  $sql = "SELECT uid FROM user WHERE uid='$uid'";
  $result = mysqli_query($conn, $sql);
  $uidcheck = mysqli_num_rows($result);

  if ($uidcheck > 0) {
    header("Location: ../signup.php?error=username");
    exit();
  } 
  else {
    if ($pwd !== $pwd2) {
      header("Location: ../signup.php?error=match-pwd");
      exit();
    }
    else {
      $sql = "INSERT INTO user (first, last, uid, pwd) 
              VALUES ('$first', '$last', '$uid', '$pwd')";
      $result = mysqli_query($conn, $sql);

      header("Location: ../signup.php?success=sign-up");
    }
  }
}



// header("Location: ../index.php");

 ?>