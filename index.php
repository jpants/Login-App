<?php 
include 'functions.php';
include 'header.php';
?>

<!-- container -->
<div class="container">

  <!-- show congrats when logged in -->
  <?php
  if (isset($_SESSION['id'])) {
    // save username to variable 
    $uid = $_SESSION['uid']; ?>

    <h1>Welcome <?php echo $uid; ?>!</h1>
    <h2>Way to go!</h2>
    <h2>You're logged in!</h2>

  <?php } 
  // else show message and login form 
  else {  
    // Get url 
    $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    // conditionals to determine messages 
    if (strpos($url, 'success=sign-up') !== false) {
      $msg = "You successfully signed up! Now you can log in to your account :)";
      msgMach($msg);
    } 
    else if (strpos($url, 'error=unOrPwd') !== false) {
      $msg = "Your username or password is incorrect!";
      msgMach($msg);
    } 
    else if (strpos($url, 'error=empty-uid') !== false) {
      $msg = "The username field was empty!";
      msgMach($msg);
    }
    else if (strpos($url, 'error=empty-pwd') !== false) {
      $msg = "The password field was empty!";
      msgMach($msg);
    }
    else if (strpos($url, 'error=noUn') !== false) {
      $msg = "We don't have that username :(";
      msgMach($msg);
    }
    else if (strpos($url, 'error=wrPwd') !== false) {
      $msg = "Password incorrect :(";
      msgMach($msg);
    }
    // clear session variables if no passed url value, 
    // so no session variables when home link clicked on sign up page 
    else {
      $_SESSION['uid'] = "";
      $_SESSION['pwd'] = "";
      $msg = "Please log in, or click above to sign up! :)";
      msgMach($msg);
    } ?>

    <!-- loginForm -->
    <form id="loginForm" action='includes/login-inc.php' method='POST'>
      <!-- username -->
      <input class='inputs' type='text' name='uid' placeholder='Username' value="<?php echo $_SESSION['uid'] ?>" autofocus /><br />

      <!-- password -->
      <input class='inputs' type='password' name='pwd' placeholder='Password' value="<?php echo $_SESSION['pwd'] ?>" /><br />

      <!-- log in button-->
      <button class='inputs subBtn' type='submit'>LOG IN</button>
    </form><!-- /loginForm -->

  <?php } ?>

</div><!-- /container -->

</body>
</html>