<?php 

// Check for header injections
function has_header_injection($str) {
  return preg_match( "/[\r\n]", $str );
}

// Makes and echoes message 
function msgMach($msg) {
  $instMsg = "<h2>" . $msg . "</h2>";
  echo $instMsg;   
}

?>