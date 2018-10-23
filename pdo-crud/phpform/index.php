<?php
  include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Php Data Object</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body> 

  <div class="container">

  <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form role="form" method="POST">
        <h2 align="center">Registration Form</h2>
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" name="firstname" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" autocomplete="off">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="lastname" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>User Name</label>
          <input type="text" name="username" id="display_name" class="form-control input-lg" placeholder="User Name" tabindex="3" autocomplete="off">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" autocomplete="off">
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5" autocomplete="off">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <label>Confirm password</label>
              <input type="password" name="confpassword" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4 col-sm-3 col-md-3">
            <span class="button-checkbox">
              <button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
              <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1" >
            </span>
          </div>
          <div class="col-xs-8 col-sm-9 col-md-9">
             By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.&nbsp;&nbsp;<a href="record.php">Records</a>
          </div>
        </div>
        
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-md-6"><input type="submit" name="Submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
          <div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>
        </div>
      </form>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>
</body>
</html>

<?php

#TODO : Move to header

try{
  if(isset($_POST['Submit'])){

    # Check if email exists in database or not.

    $row = [
      'fname'  => $_POST['firstname'],
      'lname'  => $_POST['lastname'],
      'uname'  => $_POST['username'],
      'mail'   => $_POST['email'],
      'pass'   => $_POST['password'],
      'cpass'  => $_POST['confpassword'],
    ];
    $sql = "
      INSERT 
       INTO `sign-up`
        (`firstname`, `lastname`, `displayname`, `email`, `password`, `confirmpassword`) 
      VALUES 
      (:fname , :lname , :uname , :mail , :pass , :cpass)";
      
    $statement = $dbh->prepare($sql);
    $status    = $statement->execute($row);
  }
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}  
?>