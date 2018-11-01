<?php
  include("code/register.php");
?>
<head>
  <title>Project1 | Registration Page</title>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>User</b>Registration</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="firstname" class="form-control" placeholder="First name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <div class="Message">
          <?php echo $firstnameError; ?>
        </div>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="lastname" class="form-control" placeholder="Last name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <div class="Message">
          <?php echo $lastnameError; ?>
        </div>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="User name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <div class="Message">
          <?php echo $usernameError; ?>
        </div>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <div class="Message">
          <?php echo $emailError; ?>
        </div>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <div class="Message">
          <?php echo $passError; ?>
        </div>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="conpassword" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <div class="Message">
          <?php echo $cpassError; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="https://www.facebook.com/" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="https://gmail.com" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="login.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
<?php
  include("include/userfooter.php");
?>