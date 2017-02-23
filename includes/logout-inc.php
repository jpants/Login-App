<?php 

// end session and go to index.php 
session_start();
session_destroy();
header("Location: ../");

?>