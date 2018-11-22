<?php
  include("db/connection.php");
  include("code/addcountry.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small> Add Country</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Country</li>
        <li><a href="allcountries.php">Back To Listing</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Create New Country :</h3>
                <?php echo $message; ?>
            </div>
              <form role="form" method="POST">
                <div class="box-body">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="title">Title :</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter Country Name Here ..." value="">
                      <div class="Message">
                        <?php echo $nameError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control" name="description" value="" rows="3" placeholder="Enter Description Here ..."></textarea>
                      <div class="Message">
                        <?php echo $descriptionError; ?>
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