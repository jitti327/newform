<?php
  include("db/connection.php");
  include("code/addchapter.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small> Add Chapter</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Chapter</li>
        <li><a href="allchapters.php">Back To Listing</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Create New Chapter :</h3>
                <?php echo $message; ?>
            </div>
              <form role="form" method="POST">
                <div class="box-body">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="title">Title :</label>
                      <input type="text" name="title" class="form-control" placeholder="Enter Chapter Title Here ..." value="">
                      <div class="Message">
                        <?php echo $titleError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control" name="description" value="" placeholder="Enter Description Here ..."></textarea>
                      <div class="Message">
                        <?php echo $descriptionError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="number_assigned">Chapter Number assigned :</label>
                      <input type="text" name="number_assigned" class="form-control" placeholder="Enter Number assigned Here ..." value="">
                      <div class="Message">
                        <?php echo $number_assignedError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="subject_id">Subject :</label>
                      <select  name="subject_id" aria-controls="example1" subject="form-control input-sm">
                        <option value="">Select</option>
                        <?php 
                          $subject = (empty($subject)) ? '' : $subject;
                          $selectQuery = $dbh->query("SELECT * FROM `subject`");
                            while($fetch = $selectQuery->fetch() ){
                        ?>
                        <option value="<?php echo $fetch['id']; ?>"<?php echo ($fetch['id'] == $subject) ? " selected='selected' " : ''; ?>><?php echo $fetch['title']; ?></option>
                      <?php } ?>
                      </select>
                      <div class="Message">
                        <?php echo $subject_idError; ?>
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