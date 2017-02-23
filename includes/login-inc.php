<?php 
session_start();
$_SESSION['uid'] = trim($_POST['uid']);
$_SESSION['pwd'] = trim($_POST['pwd']);

include '../dbh.php';

$uid = trim($_POST['uid']);
$pwd = trim($_POST['pwd']);

if (empty($uid)) {
  header("Location: ../index.php?error=empty-uid");
  exit();
}
else if (empty($pwd)) {
  header("Location: ../index.php?error=empty-pwd");
  exit();
}
else {
  $sql = "SELECT uid FROM user WHERE uid='$uid'";
  $result = mysqli_query($conn, $sql);
  $uidcheck = mysqli_num_rows($result);

  if ($uidcheck === 0) {
    header("Location: ../index.php?error=noUn");
    exit();
  } 
  else {
    $sql2 = "SELECT pwd FROM user WHERE uid='$uid'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

    if ($pwd !== $row2['pwd']) {
      header("Location: ../index.php?error=wrPwd");
      exit();
    }
    else {
      $sql3 = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
      $result3 = mysqli_query($conn, $sql3);
      $row3 = mysqli_fetch_assoc($result3);

      $_SESSION['id'] = $row3['id'];
      $_SESSION['uid'] = $row3['uid'];
      header("Location: ../index.php");
    }
  }
}

?>