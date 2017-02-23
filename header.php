<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Login App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/cssreset.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>

<header>
  <!-- nav bar -->
  <nav>
    <ul>
      <!-- home button -->
      <li><a href="index.php">HOME</a></li>

      <!-- show log out button if logged in -->
      <?php 
      if (isset($_SESSION['id'])) { ?>

        <form id='logOutForm' action='includes/logout-inc.php'>
          <button>LOG OUT</button>
        </form>

      <?php }

      // don't show sign up button if logged in or on sign up page
      // get url
      $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

      if (isset($_SESSION['id']) === false && strpos($url, 'signup.php') === false) { ?>

        <li><a href="signup.php">SIGN UP</a></li>

      <?php } ?>

    </ul>
  </nav><!-- /nav bar -->
</header>