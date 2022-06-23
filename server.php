<?php
session_start();
$message = array(); //initialize messsage as an array
include("db.php"); //we need our database for operations in this file

$query = "SELECT * FROM ratings ORDER BY RAND() LIMIT 1"; //set query to pull a random image from database
$result = mysqli_query($connection, $query); //query database with request to pull random entry
confirm($result); //check for failure
$row = mysqli_fetch_assoc($result); //pull information as an array and store in variable

$message["image"] = $row["image"]; //pull image from array
$message["id"] = $row["id"]; //pull id from array

if($row["votes"]>0){ //if data has been voted on before
  $message["average"] = round($row["rated"]/$row["votes"],2); //calculate average value of vote
  $message["votes"] = $row["votes"]; //store vote count
}else{ //if data is untouched
  $message["average"] = 0; //set average to zero
  $message["votes"] = 0; //set vote count to zero
}

if(empty($_SESSION["votes"])){ //if session records no votes
  $_SESSION["votes"] = 17; //set session vote count to 17 (15 effective votes)
  $message["votesLeft"] = $_SESSION["votes"]; //set vote remainder to current value
}else{
  $message["votesLeft"] = $_SESSION["votes"]; //set vote remainder to current value
}

header('Content-type: application/json');
echo json_encode($message); //make data in message variable available
?>