<?php
  include("db/connection.php");
  include("code/function.php");
  include("code/edit.php");
  include("include/header.php");
  include("include/sidebar.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">User Data</h3>
        </div>
        <!-- /.box-header -->            

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Update User Data</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST">
                  <?php echo $message; ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="firstname">First Name</label>
                      <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $show['firstname']; ?>">
                      <div class="Message">
                        <?php echo $firstnameError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="lastname">Last Name</label>
                      <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $show['lastname']; ?>">
                      <div class="Message">
                        <?php echo $lastnameError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="username">User Name</label>
                      <input type="text" name="username" class="form-control" id="username" value="<?php echo $show['username']; ?>">
                      <div class="Message">
                        <?php echo $usernameError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $show['email']; ?>">
                      <div class="Message">
                        <?php echo $emailError; ?>
                      </div>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" 
                        <?php 
                          if($show['status'] == "Blocked"){
                            echo "checked";
                          } 
                        ?>
                        name="block"> Check for Block user
                      </label>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
              <!-- /.box -->
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </section>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
  include("include/footer.php");
?>