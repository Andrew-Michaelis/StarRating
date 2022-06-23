<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    var newLoad = true;
    var randImage = 0

    $("#newimage").click(function(){ //when button id="newimage" is clicked, execute function
      loadImage();
    });

    $(".rating").on("mouseenter","span",function(){ //when hovering a span
      if(newLoad){ //if we haven't already clicked on it
        $(this).toggleClass("blank"); //highlight hovered
        $(this).prevAll().toggleClass("blank"); //highlight previous
      }
    });
    $(".rating").on("mouseleave","span",function(){ //when leaving a span
      if(newLoad){ //if we haven't already clicked on it
        $(this).toggleClass("blank"); //remove highlight on hovered
        $(this).prevAll().toggleClass("blank"); //remove highlight on previous
      }
    });

    $(".rating").on("click","span",function(){ //when clicking a span (star)
      if(newLoad){ //if we haven't already clicked on it
        var index = $(this).index()+1; //we rated it 'x' stars out of 5
        var dataString = "image="+randImage+"&vote="+index; //info sent through url
        $(this).css("color","red"); //visual change to span clicked on
        $(this).prevAll().css("color","red"); //visual change to span(s) prior
        $(this).nextAll().css("color","grey"); //visual change to span(s) after
        $.ajax({ //send out info to add.php
          type: "POST",
          url: "add.php",
          data: dataString,
          datatype: "json",
          success: function(data){ //after resolution
            newLoad = false; //we have clicked the button, lock things up.
            $(".rating").append(" "+data["type"]); //display remaining votes
          }
        })
      }
    });

    function loadImage(){
      $(".rating").html(""); //empty the rating div
      $(".rating").append("<span></span><span></span><span></span><span></span><span></span>"); //create 5 spans, containing a star image each
      newLoad = true; //we have not yet interacted with any other functions
      $.ajax({ //send info to server.php
        type: "POST",
        url: "server.php",
        datatype: "json",
        success: function(data){ //after resolution
          randImage = data["id"]; //update image id
          $("#img").attr("src",data["image"]); //display image
          $("#preview").html("Total Votes: "+data["votes"]+" Average: "+data["average"]); //display vote info
        }
      })
    }
  });
</script>