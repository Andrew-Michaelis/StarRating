<?php
session_start();
$message = array(); //initialize messsage as an array
include ("db.php"); //we need our database for operations in this file
// $_SESSION["votes"]=17; //uncomment and save,click a star,comment,save to refresh session vote value

if(isset($_POST["image"])){ //if there is an image loaded
  if($_SESSION["votes"]>1){ //if you have votes left
    $postId = cleanup($_POST["image"]); //pull image id from url
    $postVote = cleanup($_POST["vote"]); //pull star rating value from url

    $fetch_query = "SELECT * FROM ratings WHERE id = $postId LIMIT 1"; //set query to find correct image
    $result = mysqli_query($connection, $fetch_query); //pull image information from database
    confirm($result); //check for failure
    $row = mysqli_fetch_assoc($result); //pull information as an array and store in variable

    $rating = $row["rated"]; //pull rating value from array
    $votes = $row["votes"]; //pull vote count from array

    $rating = $rating + $postVote; //add user rating to current rating value
    $votes++; //increment vote count

    $send_query = "UPDATE ratings SET rated = $rating, votes = $votes WHERE id = $postId"; //set query to update database
    $result = mysqli_query($connection, $send_query); //update image in database to match changes
    confirm($result); //check for failure

    $message["type"]="Votes Left: ".($_SESSION["votes"]-2); //set remaining votes display
    $message["average"]=round($rating/$votes,2); //calculate and set average
    $_SESSION["votes"]--; //remove vote from vote total
  }else{ //failed to find votes
    $message["type"]="You have run out of votes"; //you have no votes left
  }
}else{ //image failed to load
  $message["type"]="Image failed to load"; //error message displays
}

header('Content-type: application/json');
echo json_encode($message); //make data in message variable available
?>