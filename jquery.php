<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">

    $(document).raedy(function(){

      // Name required validations

      ("#inputfname").val();

      var fnamevalidation = function(){

        ('#fnm').html("");



        // Message

        $(this).removeClass('is-invalid');
        $(this).addClass("is-valid");

        //Label
        $("#label-fname").removeClass('text-danger');
        $("#label-fname").addClass("text-success");        

        if( $(this).val() == ""){

          $('#fnm').html(" **Name is required");

          $(this).removeClass('is-valid');
          $(this).addClass("is-invalid");

          $("#label-fname").removeClass('text-success');
          $("#label-fname").addClass("text-danger"); 
          return; 

        }       

        if( $(this).val().length < 6){

          $('#fnm').html(" **Minimum 6 characters are required");

          $(this).removeClass('is-valid');
          $(this).addClass("is-invalid");

          $("#label-fname").removeClass('text-success');
          $("#label-fname").addClass("text-danger");
          return;  

        }        

        if( $(this).val().length > 12){

          $('#fnm').html(" **Maximum 12 characters are allowed");

          $(this).removeClass('is-valid');
          $(this).addClass("is-invalid");

          $("#label-fname").removeClass('text-success');
          $("#label-fname").addClass("text-danger");
          return;  


        }


       var Characters = "~!@#$%^&*()_+{}:|<>?";

       for(var i= 0 ; i < $(this).val().length; i++){

       console.log("var");

      //if(Characters.indexOf(val[i] == -1){
      if(Characters.indexOf($(this).val()[i]) == -1){
        console.log("here we are");

          $('#fnm').html(" **Only characters are allowed");

          $(this).removeClass('is-valid');
          $(this).addClass("is-invalid");

          $("#label-fname").removeClass('text-success');
          $("#label-fname").addClass("text-danger");
          return; 
      }
    }
  }


      $('#inputfname').change(fnamevalidation);

      $('#inputfname').blur(fnamevalidation);

      $('#inputfname').keyup(fnamevalidation);

    });
  </script>
  <style type="text/css">
    body{
      background-image: url(images/register.jpg);
    }
  </style>
</head>
<body>
	<div class="container">
      <div class="col-md-6" id="form">
        <h2 class="text-center"><b>Registration Form</b></h2>
        <form action="" method="POST">
          <div class="form-group">
            <label for="inputfname" id="label-fname" class="col-sm-3 col-form-label">First Name:</label>
            <input type="text" name="fname" id="inputfname" class="form-control is-valid" placeholder="Enter Your First Name Here..."
             value="">
          </div>
          <div class="col-md-7">
            <small id="fnm" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="inputlname" id="label-lname" class="col-sm-3 col-form-label">Last Name:</label>
            <input type="text" name="lname" id="inputlname" class="form-control is-valid" placeholder="Enter Your Last Name Here..." value="">
          </div>
          <div class="col-md-7">
            <small id="lnm" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="inputEmail" id="label-mail" class="col-sm-3 col-form-label">Email:</label>
            <input type="text" name="email" id="inputEmail" class="form-control is-valid" placeholder="Enter Your Email Here..." value="">
          </div>
          <div class="col-md-7">
            <small id="mail" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="inputpass" id="label-pass"  class="col-sm-3 col-form-label">Password:</label>
            <input type="text" name="pass" id="inputpass" class="form-control is-valid" placeholder="Enter Your Password Here..." value="">
          </div>
          <div class="col-md-7">
            <small id="Password" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="inputcpass" id="label-cpass" class="col-sm-4 col-form-label">Confirm Password:</label>
            <input type="text" name="cpass" id="inputcpass" class="form-control is-valid" placeholder="Re-enter Your Password Here..." value="">
          </div>
          <div class="col-md-7">
            <small id="conpass" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="inputmob" id="label-mob" class="col-sm-3 col-form-label">Mobile:</label>
            <input type="text" name="mobile" id="inputmob" class="form-control is-valid" placeholder="Enter Your Mobile Number Here..." value="">
          </div>
          <div class="col-md-7">
            <small id="Mob" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="inputdob" id="label-dob" class="col-sm-3 col-form-label">Date Of Birth:</label>
            <input type="Date" name="date" id="inputdob"  class="form-control is-valid" placeholder="" value="">
          </div>
          <div class="col-md-7">
            <small id="dob" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="inputgen" id="label-gen" class="col-sm-2 col-form-label">Gender:</label>
             <input type="radio" id="inputgen" name="gender" value="Male"/><i class="gen">&nbsp;Male</b>&nbsp;
             <input type="radio" id="inputgen" name="gender" value="Female"/><i class="gen">&nbsp;Female</i>&nbsp;
             <input type="radio" id="inputgen" name="gender" value="Others"/><i class="gen">&nbsp;Others</i>
          </div>
          <div class="col-md-7">
            <small id="gend" class="text-danger"></small>
          </div>
          <div class="form-group">
            <input type="Submit" name="Submit" value="Submit" class="btn btn-primary">
            <input type="Reset" name="Reset" value="Reset" class="btn btn-danger">
          </div>&nbsp;&nbsp;
        </form>        
      </div> 
	</div>
</body>
</html>