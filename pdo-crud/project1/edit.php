<?php
  include("db/connection.php");
  include("code/function.php");
  include("code/edit.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edit User Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="data.php">Tables</a></li>
        <li><a href="data.php">Edit User Data</a></li>
      </ol>
      </section>
      
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
      <!-- /.section -->
  </div>
  <!-- /.content-wrapper -->
<?php
  include("include/footer.php");
?>