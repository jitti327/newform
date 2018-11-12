<?php
  include("db/connection.php");
  include("code/function.php");
  include("code/editclass.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edit Class Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="allclasses.php">Class</a></li>
        <li><a href="classedit.php">Edit Class Data</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Update Class :</h3>
                <?php echo $message; ?>
            </div>
              <form role="form" method="POST">
                <div class="box-body">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="title">Title :</label>
                      <input type="text" name="classTitle" class="form-control" value="<?php echo $show['classTitle']; ?>">
                      <div class="Message">
                        <?php echo $classTitleError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control" name="classDescription" value="<?php echo $show['classDescription']; ?>"></textarea>
                      <div class="Message">
                        <?php echo $classDescriptionError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="classDuration">Class Duration :</label>
                      <input type="text" name="classDuration" class="form-control" value="<?php echo $show['classDuration']; ?>">
                      <div class="Message">
                        <?php echo $classDurationError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="classupdated">Class Updated Date :</label>
                      <input type="Date" name="classupdated" class="form-control" value="<?php echo $show['classUpdated_on']; ?>">
                      <div class="Message">
                        <?php echo $classupdatedError; ?>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
<?php
  include("include/footer.php");