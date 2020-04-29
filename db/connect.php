<?php
$mysqli = new mysqli("mwgmw3rs78pvwk4e.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","z66acxpeqb2unca5","lyej77dqj5bnwjpo","t95ih95l23muqm4u");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>