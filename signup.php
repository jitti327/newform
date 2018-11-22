<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    /*
    * Function name : firstname
    * Parameter     : Input, errorId.
    * input         : Input field on which validation is to be called
    * errorId       : ID of HTML element where we need to show the validation
    * retun         : void 
    */
    function firstname(input, errorId){
      var first = document.getElementById(errorId);
      first.innerHTML = "";

      if(input.value === ""){
        first.innerHTML = "** This field is required";
        return;
      }

      // Only Numbers are not allowed

      if(!isNaN(input.value)){
        first.innerHTML = "** Only characters are allowed";
        return;
      }

      // If length of Input value smaller then 3 letters

      if((input.value.length <  3)){
        first.innerHTML = "** At least 3 characters";
        return;
      }

      // If length of input value larger then 12 letters

      if((input.value.length >  12)){
        first.innerHTML = "** Maximum 12 characters are allowed";
        return;
      }
    } 


    /*
    * Function name : Mail
    * Parameters    : input,errorId
    * First character is not "@","."
    * Last character is not "@","."
    * "." is followed by "@"
    * "." is not immediately before "@"
    * "." is not immediately followed by "@"
    * Both "@" && "." are present
    * return        : void
    */
    function Mail(input, errorId){

      var eMail = document.getElementById(errorId);
      var allowedCharacter = ["@","."];

      eMail.innerHTML = "";
      
      if(input.value === ""){
        eMail.innerHTML = "** This field is required";
        return;
      }

      // First character is not "@","."

      if(allowedCharacter.indexOf(input.value[0]) !== -1 ){
        eMail.innerHTML = "** First letter must be a character";
        return;
      }


      // Last character is not "@","."

      if(allowedCharacter.indexOf(input.value[input.value.length -1 ]) !== -1){
        eMail.innerHTML = "** last letter must be a character";
        return;
      }


      // "." is followed by "@"

     if(input.value.indexOf("@") == input.value.indexOf(".")){
        eMail.innerHTML = "** Undefined possition of (@)";
        return;
    }

      // "." is not immediately before "@"

      if(input.value.indexOf(".") == input.value.indexOf("@")- 1){
        eMail.innerHTML = "** Undefined possition of (.)";
        return;
      }


      // "." is not immediately followed by "@"

      if(input.value.indexOf(".") == input.value.indexOf("@")+ 1){
        eMail.innerHTML = "** Undefined possition of (.)";
        return;
      } 
    
      // Both "@" && "." are present

      if(input.value.indexOf(".") == -1 || input.value.indexOf("@") == -1){
        eMail.innerHTML = "** Invalid Email";
        return;
      }
    }


    /*
    * Function name : security
    * Parameters    : input,errorId
    * return        : void
    */
    function security(input, errorId){

      var pattern = document.getElementById(errorId);
      var allowedCharacter = ["@","."];

      pattern.innerHTML = "";
      
      if(input.value === ""){
        pattern.innerHTML = "** This field is required";
        return;
      }
    }


    /*
    * Function name : csecurity
    * Parameters    : input,errorId
    * return        : void
    */
    function csecurity(input, errorId){

      var cpattern = document.getElementById(errorId);
      var allowedCharacter = ["@","."];

      cpattern.innerHTML = "";
      
      if(input.value === ""){
        cpattern.innerHTML = "** This field is required";
        return;
      }
    }



    /*
    * Function name : number
    * Parameter     : Input, errorId.
    * input         : Input field on which validation is to be called
    * errorId       : ID of HTML element where we need to show the validation
    * retun         : void 
    */
    function number(input, errorId){
      var Mnum = document.getElementById(errorId);
      Mnum.innerHTML = "";

      if(input.value === ""){
        Mnum.innerHTML = "** This field is required";
        return;
      }

      // If input value is not a number

      if(isNaN(input.value)){
        Mnum.innerHTML = "** Only Numbers are allowed";
        return;
      }

      // If input value is not equals to 10 digits

      if(input.value.length !== 10){
        Mnum.innerHTML = "** Enter a valid mobile number";
        return;
      }
    }
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
          <div class="form-group">
            <label for="inputfname" id="label-fname" class="col-form-label">First Name:</label>
            <input type="text" name="fname" id="label-fname" 
            onkeyup ="firstname(this, 'fnm');"  
            onchange="firstname(this, 'fnm');" 
            onblur ="firstname(this, 'fnm');" 
            class="form-control text" 
            placeholder="Enter Your First Name Here..."
             value="">
          </div>
          <div class="col-md-7">
            <span id="fnm" class="text-danger"></span>
          </div>
          <div class="form-group">
            <label for="inputlname" id="label-lname" class="col-form-label">Last Name:</label>
            <input type="text" name="lname" id="label-lname" 
            onkeyup ="firstname(this, 'lnm');"  
            onchange="firstname(this, 'lnm');" 
            onblur ="firstname(this, 'lnm');"  
            class="form-control text" 
            placeholder="Enter Your Last Name Here..." 
            value="">
          </div>
          <div class="col-md-7">
            <span id="lnm" class="text-danger"></span>
          </div>
          <div class="form-group">
            <label for="inputEmail" id="label-mail" class="col-form-label">Email:</label>
            <input type="text" name="email" id="label-mail" 
            onkeyup ="Mail(this, 'mail');"  
            onchange="Mail(this, 'mail');" 
            onblur ="Mail(this, 'mail');"  
            class="form-control text" 
            placeholder="Enter Your Email Here..." 
            value="">
          </div>
          <div class="col-md-7">
            <span id="mail" class="text-danger"></span>
          </div>
          <div class="form-group">
            <label for="inputpass" id="label-pass"  class="col-form-label">Password:</label>
            <input type="text" name="pass" id="label-pass" 
            onkeyup ="security(this, 'Password');"  
            onchange="security(this, 'Password');" 
            onblur ="security(this, 'Password');"
            class="form-control text"
            placeholder="Enter Your Password Here..." 
            value="">
          </div>
          <div class="col-md-7">
            <span id="Password" class="text-danger"></span>
          </div>
          <div class="form-group">
            <label for="inputcpass" id="label-cpass" class="col-form-label">Confirm Password:</label>
            <input type="text" name="cpass" id="label-cpass" 
            onkeyup ="csecurity(this, 'conpass');"  
            onchange="csecurity(this, 'conpass');" 
            onblur ="csecurity(this, 'conpass');" 
            class="form-control text" 
            placeholder="Re-enter Your Password Here..." 
            value="">
          </div>
          <div class="col-md-7">
            <span id="conpass" class="text-danger"></span>
          </div>
          <div class="form-group">
            <label for="inputmob" id="label-mob" class="col-form-label">Mobile:</label>
            <input type="text" name="mobile" id="label-mob" 
            onkeyup ="number(this, 'Mob');"  
            onchange="number(this, 'Mob');" 
            onblur ="number(this, 'Mob');" 
            class="form-control text" 
            placeholder="Enter Your Mobile Number Here..." 
            value="">
          </div>
          <div class="col-md-7">
            <span id="Mob" class="text-danger"></span>
          </div>
          <div class="form-group">
            <label for="inputdob" id="label-dob" class="col-form-label">Date Of Birth:</label>
            <input type="Date" name="date" id="label-dob"  class="form-control text" placeholder="" value="">
          </div>
          <div class="col-md-7">
            <span id="dob" class="text-danger"></span>
          </div>
          <div class="form-group">
            <label for="inputgen" id="label-gen" class="col-form-label">Gender:</label>
             <input type="radio" id="input-gen" name="gender" value="Male"/><i class="gen">&nbsp;Male</b>&nbsp;
             <input type="radio" id="input-gen" name="gender" value="Female"/><i class="gen">&nbsp;Female</i>&nbsp;
             <input type="radio" id="input-gen" name="gender" value="Others"/><i class="gen">&nbsp;Others</i>
          </div>
          <div class="col-md-7">
            <span id="gend" class="text-danger"></span>
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