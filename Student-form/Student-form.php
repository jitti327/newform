<?php 
include("connection.php")
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

  /* Function name : first */

  // Name required validations

    $("#inputfname").val();

    var first = function(){

    $('#fnm').html("");



      // Message

      $(this).removeClass('is-invalid');
      $(this).addClass("is-valid");

      //Label

      $("#label-fname").removeClass('text-danger');
      $("#label-fname").addClass("text-success");        

      if( $(this).val() == ""){

        $('#fnm').html(" ** First Name is required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-fname").removeClass('text-success');
        $("#label-fname").addClass("text-danger"); 
        return;
    }  

      if(!isNaN($(this).val())){

        $('#fnm').html(" ** Only characters are required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-fname").removeClass('text-success');
        $("#label-fname").addClass("text-danger");
        return;  

      }

      if($(this).val().length < 3){

        $('#fnm').html(" ** At least 3 characters are required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-fname").removeClass('text-success');
        $("#label-fname").addClass("text-danger");
        return;  

      }

      if($(this).val().length > 12 ){

        $('#fnm').html(" ** Maximum 12 characters are allowed");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-fname").removeClass('text-success');
        $("#label-fname").addClass("text-danger");
        return;  

      }   

  }

    $('#inputfname').change(first);

    $('#inputfname').blur(first);

    $('#inputfname').keyup(first);


    /* Function name : lastname */

    // last Name required validations

    $("#inputlname").val();

    var last = function(){

    $('#lnm').html("");



    // Message

    $(this).removeClass('is-invalid');
    $(this).addClass("is-valid");

    //Label

    $("#label-lname").removeClass('text-danger');
    $("#label-lname").addClass("text-success");        

      if( $(this).val() == ""){

        $('#lnm').html(" ** Last Name is required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-lname").removeClass('text-success');
        $("#label-lname").addClass("text-danger"); 
        return;
    }  

      if(!isNaN($(this).val())){

        $('#lnm').html(" ** Only characters are required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-lname").removeClass('text-success');
        $("#label-lname").addClass("text-danger");
        return;  

      }

      if($(this).val().length < 3){

        $('#lnm').html(" ** At least 3 characters are required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-lname").removeClass('text-success');
        $("#label-lname").addClass("text-danger");
        return;  

      }

      if($(this).val().length > 12 ){

        $('#lnm').html(" ** Maximum 12 characters are allowed");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-lname").removeClass('text-success');
        $("#label-lname").addClass("text-danger");
        return;  

      }   

  }

    $('#inputlname').change(last);

    $('#inputlname').blur(last);

    $('#inputlname').keyup(last);




    /* Function name : Email */

    // Email required validations

    $("#inputEmail").val();

    var Email = function(){

    var char = ["@","."];

    $('#mail').html("");



    // Message

    $(this).removeClass('is-invalid');
    $(this).addClass("is-valid");

    //Label

    $("#label-mail").removeClass('text-danger');
    $("#label-mail").addClass("text-success");        

      if( $(this).val() == ""){

        $('#mail').html(" ** Email is required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-mail").removeClass('text-success');
        $("#label-mail").addClass("text-danger"); 
        return;
    }

    // First letter must be a character

    if($(this).val()[0].indexOf("@") !== -1 || $(this).val()[0].indexOf(".") !== -1){

      $('#mail').html(" ** First letter must be a character");

      $(this).removeClass('is-valid');
      $(this).addClass("is-invalid");

      $("#label-mail").removeClass('text-success');
      $("#label-mail").addClass("text-danger");
      return; 

    }
    // last letter must be a character

    if(char.indexOf($(this).val()[$(this).val().length -1]) !== -1){

      $('#mail').html(" ** Last letter must be a character");

      $(this).removeClass('is-valid');
      $(this).addClass("is-invalid");

      $("#label-mail").removeClass('text-success');
      $("#label-mail").addClass("text-danger");
      return; 
      }

    // Checking if there is both @ and . is present

    if($(this).val().indexOf("@") == -1 || $(this).val().indexOf(".") == -1){

      $('#mail').html(" ** @ and . must be required");

      $(this).removeClass('is-valid');
      $(this).addClass("is-invalid");

      $("#label-mail").removeClass('text-success');
      $("#label-mail").addClass("text-danger");
      return;
    }


    // "." is followed by "@"

    if($(this).val().indexOf("@") == $(this).val().indexOf(".")){

      $('#mail').html(" ** Undefined Possition of @");

      $(this).removeClass('is-valid');
      $(this).addClass("is-invalid");

      $("#label-mail").removeClass('text-success');
      $("#label-mail").addClass("text-danger");
      return;
    }

  // "." is not immediately before "@"

  if($(this).val().indexOf(".") == $(this).val().indexOf("@")- 1){

      $('#mail').html(" ** Undefined Possition of .");

      $(this).removeClass('is-valid');
      $(this).addClass("is-invalid");

      $("#label-mail").removeClass('text-success');
      $("#label-mail").addClass("text-danger");
      return;
  }


  // "." is not immediately followed by "@"

  if($(this).val().indexOf(".") == $(this).val().indexOf("@")+ 1){

      $('#mail').html(" ** Undefined Possition of @ and .");

      $(this).removeClass('is-valid');
      $(this).addClass("is-invalid");

      $("#label-mail").removeClass('text-success');
      $("#label-mail").addClass("text-danger");
      return;
  }
  }

    $('#inputEmail').change(Email);

    $('#inputEmail').blur(Email);

    $('#inputEmail').keyup(Email);




  /* Function name password */

  // Password required validations

    $("#inputpass").val();

    var last = function(){

    $('#Password').html("");



  // Message

    $(this).removeClass('is-invalid');
    $(this).addClass("is-valid");

    //Label

    $("#label-pass").removeClass('text-danger');
    $("#label-pass").addClass("text-success");        

      if( $(this).val() == ""){

        $('#Password').html(" ** Password is required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-pass").removeClass('text-success');
        $("#label-pass").addClass("text-danger"); 
        return;
    }    

    // Confirm Password Validation

      if(cPasswordTouched == true){
        conpass();
      } 

      if($(this).val().length < 8){

        $('#Password').html(" ** Minimum 8 characters are required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-pass").removeClass('text-success');
        $("#label-pass").addClass("text-danger");
        return;  

      }

      if($(this).val().length > 18 ){

        $('#Password').html(" ** Maximum 18 characters are allowed");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-pass").removeClass('text-success');
        $("#label-pass").addClass("text-danger");
        return;  

      }   

  }

    $('#inputpass').change(last);

    $('#inputpass').blur(last);

    $('#inputpass').keyup(last);




    /* Function name Cpassword */

    // Confirm Password required validations

    $("#inputcpass").val();

    var Cpassword = function(){

      cPasswordTouched = true;
      
      var errorElement = $('#cpass');
      var password     = $("#inputpass");
      var cPassword    = $("#inputcpass");

      $('#conpass').html("");



    // Message

    $(this).removeClass('is-invalid');
    $(this).addClass("is-valid");

    //Label

    $("#label-cpass").removeClass('text-danger');
    $("#label-cpass").addClass("text-success");        

      if( $(this).val() == ""){

        $('#conpass').html(" ** Confirm Password is required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-cpass").removeClass('text-success');
        $("#label-cpass").addClass("text-danger"); 
        return;
    }

      if(password.val() != cPassword.val())
      {
       
        $('#conpass').html(" ** Password Not matched");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-cpass").removeClass('text-success');
        $("#label-cpass").addClass("text-danger"); 
        return;
      }
  }

    $('#inputcpass').change(Cpassword);

    $('#inputcpass').blur(Cpassword);

    $('#inputcpass').keyup(Cpassword);


    /* Function name : Mobi */

    // Number required validations

    $("#inputmob").val();

    var Mobi = function(){

    $('#Mob').html("");



    // Message

    $(this).removeClass('is-invalid');
    $(this).addClass("is-valid");

    //Label

    $("#label-mob").removeClass('text-danger');
    $("#label-mob").addClass("text-success");        

      if( $(this).val() == ""){

        $('#Mob').html(" ** Mobile Number is required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-mob").removeClass('text-success');
        $("#label-mob").addClass("text-danger"); 
        return;
    }  

      if(isNaN($(this).val())){

        $('#Mob').html(" ** Only Numbers are allowed");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-mob").removeClass('text-success');
        $("#label-mob").addClass("text-danger");
        return;  

      }

      if($(this).val().length !== 10){

        $('#Mob').html(" ** Only 10 digits are allowed");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-mob").removeClass('text-success');
        $("#label-mob").addClass("text-danger");
        return;  

      }    

  }

    $('#inputmob').change(Mobi);

    $('#inputmob').blur(Mobi);

    $('#inputmob').keyup(Mobi);



    /* Function name : dob */

    // Date of Birth required validations

    $("#inputdob").val();

    var dob = function(){

    $('#dob').html("");



    // Message

    $(this).removeClass('is-invalid');
    $(this).addClass("is-valid");

    //Label

    $("#label-dob").removeClass('text-danger');
    $("#label-dob").addClass("text-success");        

      if( $(this).val() == ""){

        $('#dob').html(" ** Date of Birth is required");

        $(this).removeClass('is-valid');
        $(this).addClass("is-invalid");

        $("#label-dob").removeClass('text-success');
        $("#label-dob").addClass("text-danger"); 
        return;
    }     

  }

    $('#inputdob').change(dob);

    $('#inputdob').blur(dob);

    $('#inputdob').keyup(dob);

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
      <div class="col-md-9" id="form">
        <h2 class="text-center"><b>Registration Form</b></h2>
        <form action="" method="POST">
          <div class="form-group row">
          <div class="col-sm-6">
            <label for="inputfname" id="label-fname" class="col-form-label">First Name:</label>
            <input type="text" name="fname" id="inputfname" class="form-control is-valid" placeholder="Enter Your First Name Here..."
             value="">
            <small id="fnm" class="text-danger"></small>
          </div>
          <div class="col-sm-6">
            <label for="inputlname" id="label-lname" class="col-form-label">Last Name:</label>
            <input type="text" name="lname" id="inputlname" class="form-control is-valid" placeholder="Enter Your Last Name Here..." value="">
            <small id="lnm" class="text-danger"></small>
          </div>
          </div>
          <div class="form-group">
            <label for="inputEmail" id="label-mail" class="col-sm-3 col-form-label">Email:</label>
            <input type="text" name="email" id="inputEmail" class="form-control is-valid" placeholder="Enter Your Email Here..." value="">
            <small id="mail" class="text-danger"></small>
          </div>
          <div class="form-group row">
          <div class="col-sm-6">
            <label for="inputpass" id="label-pass"  class="col-form-label">Password:</label>
            <input type="text" name="pass" id="inputpass" class="form-control is-valid" placeholder="Enter Your Password Here..." value="">
            <small id="Password" class="text-danger"></small>
          </div>
          <div class="col-sm-6">
            <label for="inputcpass" id="label-cpass" class="col-form-label">Confirm Password:</label>
            <input type="text" name="cpass" id="inputcpass" class="form-control is-valid" placeholder="Re-enter Your Password Here..." value="">
            <small id="conpass" class="text-danger"></small>
          </div>
          </div>
          <div class="form-group">
            <label for="inputmob" id="label-mob" class="col-sm-3 col-form-label">Mobile:</label>
            <input type="text" name="mobile" id="inputmob" class="form-control is-valid" placeholder="Enter Your Mobile Number Here..." value="">
            <small id="Mob" class="text-danger"></small>
          </div>
          <div class="form-group">
            <label for="inputdob" id="label-dob" class="col-form-label">Date Of Birth:</label>
            <input type="Date" name="date" id="inputdob"  class="form-control is-valid" placeholder="" value="">
            <small id="dob" class="text-danger"></small>
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

<?php

if($_POST['Submit']){


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mail = $_POST['email'];
$password = $_POST['pass'];
$cpassword = $_POST['cpass'];
$phone = $_POST['mobile'];
$db = $_POST['date'];

$query = "INSERT INTO 'User-table'('firstname', 'lastname', 'email', 'password', 'confirmpassword', 'mobile', 'Dob') VALUES ($fname, $lname, $mail, $password, $cpassword, $phone, $db)";

$data = mysqli_query($sql, $query);

if($data){
  echo "** Data Inserted Successfully";
}
else{
  echo "Not Inserted";
} 
}
?>