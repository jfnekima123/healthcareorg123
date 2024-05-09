<?php 
include "../../translate.php";
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Blog</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
<style>
body, html {
    height: 100%;
    font-family: "Inconsolata", sans-serif;

    
}
.bgimg {
    background-position: center;
    background-repeat:no-repeat;
    background-image: url("../pic/3.jpg");
    min-height:50%;
  
}    footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color:#000000;
  }  .container-fluid {
      padding: 60px 50px;
  }

.menu {
    display: none;
}
</style>
<body>


<!-- Header with image -->

<header class="bgimg w3-display-container  w3-grayscale-min" id="myPage" >
</header>


<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
    <h2 class="w3-center w3-padding-64 "><span class="w3-tag w3-wide ">Integrated emergency, critical and operative care </span></h2>
    <p>Emergency, critical and operative care (ECO) represent a people-centred continuum. Integrated people-centred service delivery requires ECO services that are linked to communities through primary care by communication, transportation, referral and counter-referral mechanisms.</p>
<br>Operative care is understood to span both anaesthesia and surgery services in theatres and ambulatory centres, while surgeons and anaesthesia professionals may deliver emergency, critical and operative care, including obstetric care, as part of comprehensive peri-operative care and beyond. Emergency and critical care may be delivered in an ambulance or in an emergency unit, an intensive care unit or a theatre by technicians, nurses or specialist doctors. Nurses deliver as much emergency care around the world as doctors, and both may be trained as specialists of the first hours of care.
   <br>This resolution, co-sponsored by over 80 Member States, represents a powerful call for near-term action to strengthen health systems for delivery of high-quality emergency, critical and operative care. It builds on, expands and reactivates the mandates of previous resolutions, including WHA60.22 on Health Systems: emergency care systems, WHA68.15 on strengthening emergency and essential surgical care and anaesthesia as a component of universal health coverage and WHA72.16 on Emergency care systems for universal health coverage: ensuring timely care for the acutely ill and injured. <br> </p>

   <div class="w3-panel w3-leftbar w3-light-grey">
</div>


  </div>
</div>
</div>
<!-- End page content -->
</div>


  <div class="container">
   <form method="POST" id="comment_form">
    <div class="form-group">
     <input type="email" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Your Email/Gmail Address" />
    </div>
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="submit" class="btn btn-info bg-primary" value="Submit" />
    </div>
   </form>
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>
  <div class="container ">
<ul class="pager font-weight-bold text-monospace">
  <li class="previous "><a href="blog_1.php">Previous Page</a></li>
  <li class="center"><a href="../../index.php">Back to home page</a></li>
  <li class="next "><a href="blog_3.php">Next Page</a></li>
</ul></div><!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large container-fluid text-center">  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Copyright@ <a href="https://www.credihealth.com" title="credihealth.com" target="_blank" class="w3-hover-text-green">credihealth.com</a></p>
</footer>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>
