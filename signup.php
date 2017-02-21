<?php 
include 'header.php';
?>

<span>Sign up below :)</span>

<br /><br /><br />

<?php 

  $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

  function msgSpanF($msg) {
    $msgSpan = "<span>" . $msg . "</span><br /><br /><br />";
    echo $msgSpan;   
  }

  if (strpos($url, 'error=empty-first') !== false) {
    $msg = "Please fill in your first name!";
    msgSpanF($msg);
  }
  else if (strpos($url, 'error=empty-last') !== false) {
    $msg = "Please fill in your last name!";
    msgSpanF($msg);
  }
  else if (strpos($url, 'error=empty-uid') !== false) {
    $msg = "Please fill in your username!";
    msgSpanF($msg);
  }
  else if (strpos($url, 'error=empty-pwd1') !== false) {
    $msg = "Please fill in your Password!";
    msgSpanF($msg);
  }
  else if (strpos($url, 'error=empty-pwd2') !== false) {
    $msg = "Please fill in the Retype Password field!";
    msgSpanF($msg);
  }
  else if (strpos($url, 'error=username') !== false) {
    $msg = "That username already exists!";
    msgSpanF($msg);
  }
  else if (strpos($url, 'error=match-pwd') !== false) {
    $msg = "Your passwords didn't match!";
    msgSpanF($msg);
  }
  else if (strpos($url, 'success=sign-up') !== false) {
    $msg = "You successfully signed up! Now you can log in to your account :)";
    msgSpanF($msg);
  }

?>

<?php 

if (isset($_SESSION['id'])) {
  echo "You are already logged in!";
} else {
  echo "<form action='includes/signup-inc.php' method='POST'>
    <input type='text' name='first' placeholder='First' /><br />
    <input type='text' name='last' placeholder='Last' /><br />
    <input type='text' name='uid' placeholder='Username' /><br />
    <input type='password' name='pwd' placeholder='Password' /><br />
    <input type='password' name='pwd2' placeholder='Retype Password' /><br />
    <button type='submit'>SIGN UP</button>
  </form>";
}

?>



</body>
</html>