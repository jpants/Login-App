<?php 
include 'header.php';
include 'functions.php';
?>

<!-- container -->
<div class="container">
  <!-- headline -->
  <h1>Sign up here! :)</h1>

  <br />

  <?php 
  // Get url 
  $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

  // Conditionals to determine message 
  if (strpos($url, 'error=empty-first') !== false) {
    $msg = "Please fill in your first name!";
    msgMach($msg);
  }
  else if (strpos($url, 'error=empty-last') !== false) {
    $msg = "Please fill in your last name!";
    msgMach($msg);
  }
  else if (strpos($url, 'error=empty-uid') !== false) {
    $msg = "Please fill in your username!";
    msgMach($msg);
  }
  else if (strpos($url, 'error=empty-pwd1') !== false) {
    $msg = "Please fill in your Password!";
    msgMach($msg);
  }
  else if (strpos($url, 'error=empty-pwd2') !== false) {
    $msg = "Please fill in the Retype Password field!";
    msgMach($msg);
  }
  else if (strpos($url, 'error=username') !== false) {
    $msg = "That username already exists!";
    msgMach($msg);
  }
  else if (strpos($url, 'error=match-pwd') !== false) {
    $msg = "Your passwords didn't match!";
    msgMach($msg);
    $_SESSION['pwd'] = "";
    $_SESSION['pwd2'] = "";
  }
  // clear session variables if no passed url value,
  // so no session variables when home link clicked on sign up page 
  else {
    $_SESSION['first'] = "";
    $_SESSION['last'] = "";
    $_SESSION['uid'] = "";
    $_SESSION['pwd'] = "";
    $_SESSION['pwd2'] = "";
  } ?>

  <!-- sign up form -->
  <form id='signUpForm' action='includes/signup-inc.php' method='POST'>
    <!-- first name -->
    <input class='inputs' type='text' name='first' placeholder='First' value="<?php echo $_SESSION['first']; ?>" autofocus /><br />

    <!-- last name -->
    <input class='inputs' type='text' name='last' placeholder='Last' value="<?php echo $_SESSION['last']; ?>" /><br />

    <!-- username -->
    <input class='inputs' type='text' name='uid' placeholder='Username' value="<?php echo $_SESSION['uid']; ?>" /><br />

    <!-- password -->
    <input class='inputs' type='password' name='pwd' placeholder='Password' value="<?php echo $_SESSION['pwd']; ?>" /><br />

    <!-- retype password -->
    <input class='inputs' type='password' name='pwd2' placeholder='Retype Password' value="<?php echo $_SESSION['pwd2']; ?>" /><br />

    <!-- sign up button -->
    <button class='inputs subBtn' type='submit'>SIGN UP</button>
  </form><!-- /sign up form -->
</div><!-- /container -->

</body>
</html>