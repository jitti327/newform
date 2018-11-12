<?php
  include("db/connection.php");
  include("code/addclass.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small> Add Class</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Class</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Create New Class :</h3>
                <?php echo $message; ?>
            </div>
              <form role="form" method="POST">
                <div class="box-body">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="title">Title :</label>
                      <input type="text" name="classTitle" class="form-control" placeholder="Enter Class Title Here ..." value="">
                      <div class="Message">
                        <?php echo $classTitleError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control" name="classDescription" value="" rows="3" placeholder="Enter Description Here ..."></textarea>
                      <div class="Message">
                        <?php echo $classDescriptionError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="classDuration">Class Duration :</label>
                      <input type="text" name="classDuration" class="form-control" placeholder="Enter Duration Here ..." value="">
                      <div class="Message">
                        <?php echo $classDurationError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="classcreated">Class Created Date :</label>
                      <input type="Date" name="classcreated" class="form-control" placeholder="Enter Class Creation Date Here ..." value="">
                      <div class="Message">
                        <?php echo $classcreatedError; ?>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="addclass" class="btn btn-primary">Submit</button>
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