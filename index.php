<?php 
include 'header.php';
?>
  <!-- container -->
  <div class="container">

    <!-- show congrats when logged in -->
    <?php
      if (isset($_SESSION['id'])) {
        $uid = $_SESSION['uid']; ?>

        <h1>Welcome <?php echo $uid; ?>!</h1>
        <h2>Way to go!</h2>
        <h2>You're logged in!</h2>

      <?php } 
      else { ?><!-- else show log in form -->

        <?php 

          /* Get url */
          $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

          /* Makes and echoes message */
          function msgSpanF($msg) {
            $msgSpan = "<h2>" . $msg . "</h2>";
            echo $msgSpan;   
          }

          if (strpos($url, 'success=sign-up') !== false) {
            $msg = "You successfully signed up! Now you can log in to your account :)";
            msgSpanF($msg);
          } 
          else if (strpos($url, 'error=unOrPwd') !== false) {
            $msg = "Your username or password is incorrect!";
            msgSpanF($msg);
          } 
          else if (strpos($url, 'error=empty-uid') !== false) {
            $msg = "The username field was empty!";
            msgSpanF($msg);
          }
          else if (strpos($url, 'error=empty-pwd') !== false) {
            $msg = "The password field was empty!";
            msgSpanF($msg);
          }
          else if (strpos($url, 'error=noUn') !== false) {
            $msg = "We don't have that username :(";
            msgSpanF($msg);
          }
          else if (strpos($url, 'error=wrPwd') !== false) {
            $msg = "Password incorrect :(";
            msgSpanF($msg);
          }
          else {
            $_SESSION['uid'] = "";
            $_SESSION['pwd'] = "";
            $msg = "Please log in, or click above to sign up! :)";
            msgSpanF($msg);
          }

        ?>

        <!-- loginForm -->
        <form id="loginForm" action='includes/login-inc.php' method='POST'>
          <input class='inputs' type='text' name='uid' placeholder='Username' value="<?php echo $_SESSION['uid'] ?>" /><br />
          <input class='inputs' type='password' name='pwd' placeholder='Password' value="<?php echo $_SESSION['pwd'] ?>" /><br />
          <button class='inputs subBtn' type='submit'>LOG IN</button>
        </form><!-- /loginForm -->
      <?php } 
    ?>

  </div><!-- /container -->
</body>
</html>