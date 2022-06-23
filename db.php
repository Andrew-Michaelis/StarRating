<?php
$DBServer = "127.0.0.1"; //port is localhost
$DBUser = "root"; //user is default
$DBPass = ""; //password is empty
$DBName = "starform"; //database is named here, if you have a different database name, change this value to represent such

$connection = mysqli_connect($DBServer, $DBUser, $DBPass, $DBName); //establish connection to database
if(!$connection){ //check for failure
  die("Connection Error: ".mysqli_error(mysqli_connect($DBServer, $DBUser, $DBPass, $DBName))); //report failure
}

function cleanup($data){ //basic function, cleans input to prevent SQL injection
  global $connection; //we need to know connection
  return mysqli_real_escape_string($connection, $data); //return submitted info, but cleaned
}
function confirm($result){ //basic function, reports failure to query database
  global $connection; //we need to know connection
  if(!$result){ //if query failed
    die("QUERY FAILED. ".mysqli_error($connection)); //kill, report error
  }
}
?>