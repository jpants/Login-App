<?php 
session_start();

include '../dbh.php';
include '../functions.php';

// input variables 
$first = trim(mysqli_real_escape_string($conn, $_POST['first']));
$last  = trim(mysqli_real_escape_string($conn, $_POST['last']));
$uid   = trim(mysqli_real_escape_string($conn, $_POST['uid']));
$pwd   = trim(mysqli_real_escape_string($conn, $_POST['pwd']));
$pwd2  = trim(mysqli_real_escape_string($conn, $_POST['pwd2']));

// Save session input values in case of error 
$_SESSION['first'] = $first;
$_SESSION['last'] = $last;
$_SESSION['uid'] = $uid;
$_SESSION['pwd'] = $pwd;
$_SESSION['pwd2'] = $pwd2;

// Check to see if inputs have header injections
if (has_header_injection($first) || has_header_injection($last) || has_header_injection($uid) || has_header_injection($pwd) || has_header_injection($pwd2)) {
  die(); // if true, kill the script
}

// input validation 
// check if empty 
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
// check if username already exists 
else {
  $sql = "SELECT uid FROM user WHERE uid='$uid'";
  $result = mysqli_query($conn, $sql);
  $uidcheck = mysqli_num_rows($result);

  if ($uidcheck > 0) {
    header("Location: ../signup.php?error=username");
    exit();
  } 
  // check if passwords match 
  else {
    if ($pwd !== $pwd2) {
      header("Location: ../signup.php?error=match-pwd");
      exit();
    }
    // success! they are signed up, session values are reset, 
    // and they are sent to index.php with congrats message 
    else {
      $sql = "INSERT INTO user (first, last, uid, pwd) 
              VALUES ('$first', '$last', '$uid', '$pwd')";
      $result = mysqli_query($conn, $sql);

      $_SESSION['first'] = "";
      $_SESSION['last'] = "";
      $_SESSION['uid'] = "";
      $_SESSION['pwd'] = "";
      $_SESSION['pwd2'] = "";      

      header("Location: ../?success=sign-up");
    }
  }
}

?>