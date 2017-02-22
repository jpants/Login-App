<?php 
include 'header.php';
?>
  <!-- container -->
  <div class="container">

    <h1>Sign up here! :)</h1><br />

    <?php 
      /* Get url */
      $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

      /* Makes and echoes message */
      function msgSpanF($msg) {
        $msgSpan = "<h2>" . $msg . "</h2>";
        echo $msgSpan;   
      }

      /* Conditionals to determine message */
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
    ?>

    <!-- sign up form -->
    <form id='signUpForm' action='includes/signup-inc.php' method='POST'>
      <input class='inputs' type='text' name='first' placeholder='First' /><br />
      <input class='inputs' type='text' name='last' placeholder='Last' /><br />
      <input class='inputs' type='text' name='uid' placeholder='Username' /><br />
      <input class='inputs' type='password' name='pwd' placeholder='Password' /><br />
      <input class='inputs' type='password' name='pwd2' placeholder='Retype Password' /><br />
      <button class='inputs subBtn' type='submit'>SIGN UP</button>
    </form><!-- /sign up form -->
  </div><!-- /container -->
</body>
</html>