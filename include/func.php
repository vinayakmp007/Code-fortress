<?php
require_once ("include/mysq.php");                   //TODO Needs more functions here
function test_input($data) {                             
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function getteamname($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}






?>
