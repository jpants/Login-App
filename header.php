<?php 

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Login App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>

<header>
  <nav>
    <ul>
      <li><a href="index.php">HOME</a></li>
      <?php 
        if (isset($_SESSION['id'])) {
          echo "<form action='includes/logout-inc.php'>
            <button>LOG OUT</button>
          </form>";
        } else {
          echo "<form action='includes/login-inc.php' method='POST'>
            <input type='text' name='uid' placeholder='Username' />
            <input type='password' name='pwd' placeholder='Password' />
            <button type='submit'>LOGIN</button>
          </form>";
        }
      ?>

      <?php 

        $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        if (isset($_SESSION['id']) === false && strpos($url, 'signup.php') === false) { 

      ?>

      <li><a href="signup.php">SIGN UP</a></li>

      <?php 

        }

      ?>

    </ul>
  </nav>
</header>