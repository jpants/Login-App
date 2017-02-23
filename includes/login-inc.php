<?php 
session_start();

include '../dbh.php';
include '../functions.php';

// Input variables 
$uid = trim(mysqli_real_escape_string($conn, $_POST['uid']));
$pwd = trim(mysqli_real_escape_string($conn, $_POST['pwd']));

// Save session input values in case of error 
$_SESSION['uid'] = $uid;
$_SESSION['pwd'] = $pwd;

// Check to see if inputs have header injections
if (has_header_injection($uid) || has_header_injection($pwd)) {
   die(); // if true, kill the script
}

// input validation 
// check if empty 
if (empty($uid)) {
  header("Location: ../index.php?error=empty-uid");
  exit();
}
else if (empty($pwd)) {
  header("Location: ../index.php?error=empty-pwd");
  exit();
}
// check to see if username is in database 
else {
  $sql = "SELECT uid FROM user WHERE uid='$uid'";
  $result = mysqli_query($conn, $sql);
  $uidcheck = mysqli_num_rows($result);

  if ($uidcheck === 0) {
    header("Location: ../index.php?error=noUn");
    exit();
  } 
  // check to see if password belongs to username 
  else {
    $sql2 = "SELECT pwd FROM user WHERE uid='$uid'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

    if ($pwd !== $row2['pwd']) {
      header("Location: ../index.php?error=wrPwd");
      $_SESSION['pwd'] = "";
      exit();
    }
    // success! get id and username from database and set them to session values and go to index.php 
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