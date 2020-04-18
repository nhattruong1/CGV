<?php
$mysqli = new mysqli("i2cpbxbi4neiupid.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","fwn76oocoovtotwl","owx541k4ia15n5f8","txxvtu25s5m7n55h");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>