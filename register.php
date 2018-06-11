<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      //color: #f5f6f7;
      background-color: #E3F2FD; /* Green */
  	}
  	p {font-size: 16px;}
  	.margin {margin-bottom: 45px;}
  	.bg-1 { 
      //background-color: #1abc9c; /* Green */
      background-color: #E3F2FD; /* Green */
      color: #000000
      height:310px;
    }
    .bg-2 { 
      background-color: #E3F2FD; /* Green */
      color: #000000
      height: 350px;
    }
    .center{
      margin: auto;
      width: 50px;
      padding: 10px;
    }
    .needsfilled{
      border:3px solid #ff0000 !important;
    }
</style>
<body>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <form class="form-horizontal" action="#" method="post" name="reg_form" id="reg_form" onsubmit="return(validateForm());" style="max-width: 440px; margin: 20px auto; border: 1px solid #000; padding: 15px; border-radius: 3px;">
      <div class="form-group">
        <label class="control-label col-sm-3" for="fname">Name:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="fname" placeholder="Enter name" name="fname">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="lname">Surname:</label>
        <div class="col-sm-9">          
          <input type="text" class="form-control" id="lname" placeholder="Enter surname" name="lname">
        </div>
      </div>
      <div class="form-group">        
        <div class=" col-sm-3 col-sm-offset-9">
          <button type="submit" id="reg_submit" name="reg_submit" class="btn btn-success">Submit</button>
        </div>
      </div>
  </form>
</div>
<div class="container-fluid bg-2 text-center">
      <div class="container result">
      </div>
</div>


</body>
</html>

<script>
  $(document).ready(function(){
    required = ["fname","lname"];
    emptyerror = "REQUIRED";
  });

  function validateForm(){
    for(i=0;i<required.length;i++){
      var input = $("#"+required[i]);
      if((input.val()=="")||(input.val()==emptyerror)){
          input.addClass("needsfilled");
          input.val();
          input.attr('placeholder',emptyerror)
      }else{
        input.removeClass("needsfilled");
      }
    }
    
    if($(":input").hasClass("needsfilled")){
      return false;
    }else{
      $.ajax({
        url:'<?=base_url();?>home/register',
        type:'post',
        data:$('#reg_form').serialize(),
        success:function(data){
          //console.log(data);
          $("#fname").val('');
          $("#lname").val('');
          $('.result').html(data);
        }
      });
      return false;
    }
  }
</script>