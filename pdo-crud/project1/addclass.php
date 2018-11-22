<?php
  include("db/connection.php");
  include("code/addclass.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1><small> Add Class</small></h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Class</li>
        <li><a href="allclasses.php">Back To Listing</a></li>
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
                      <input type="text" name="title" class="form-control" placeholder="Enter Class Title Here ..." value="">
                      <div class="Message">
                        <?php echo $titleError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control" name="description" value="" rows="3" placeholder="Enter Description Here ..."></textarea>
                      <div class="Message">
                        <?php echo $descriptionError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="duration">Class Duration :</label>
                      <input type="text" name="duration" class="form-control" placeholder="Enter Duration Here ..." value="">
                      <div class="Message">
                        <?php echo $durationError; ?>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="add" class="btn btn-primary">Submit</button>
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