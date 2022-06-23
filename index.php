<?php include ("includes/header.php");?>

<!-- sll the html in my page -->
<div>
  <img src="" id="img"> <!-- an image, does not show anything until the src is altered -->
  <div id="preview"></div> <!-- contains total and average votes, displays nothing until img generated -->
</div>
<div class="rating"></div> <!-- contains 5 star shaped ascii characters -->
<button id="newimage" class="btn">New Image</button> <!-- generates new image -->

<?php include("includes/code.php"); ?>

<?php include("includes/footer.php"); ?>