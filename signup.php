<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/bootstrap.min.js"></script>
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
            <label>First Name:</label>
            <input type="text" name="fname" class="form-control text" placeholder="Enter Your First Name Here..." value="">
            <span id="fnm"></span>
          </div>
          <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lname" class="form-control text" placeholder="Enter Your Last Name Here..." value="">
            <span id="lnm"></span>
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" class="form-control text" placeholder="Enter Your Email Here..." value="">
            <span id="mail"></span>
          </div>
          <div class="form-group">
            <label>Password:</label>
            <input type="text" name="pass" class="form-control text" placeholder="Enter Your Password Here..." value="">
            <span id="Password"></span>
          </div>
          <div class="form-group">
            <label>Confirm Password:</label>
            <input type="text" name="cpass" class="form-control text" placeholder="Re-enter Your Password Here..." value="">
            <span id="conpass"></span>
          </div>
          <div class="form-group">
            <label>Mobile:</label>
            <input type="text" name="mob" class="form-control text" placeholder="Enter Your Mobile Number Here..." value="">
            <span id="mobile"></span>
          </div>
          <div class="form-group">
            <label>Date Of Birth:</label>
            <input type="Date" name="date" class="form-control text" placeholder="" value="">
            <span id="dob"></span>
          </div>
          <div class="form-group">
            <label>Gender:</label>&nbsp;
             <input type="radio" id="input-first" name="gender" value="Male"/><i class="gen">&nbsp;Male</b>&nbsp;
             <input type="radio" id="input-first" name="gender" value="Female"/><i class="gen">&nbsp;Female</i>&nbsp;
             <input type="radio" id="input-first" name="gender" value="Others"/><i class="gen">&nbsp;Others</i>
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