<?php
  include("db/connection.php");
  include("code/addsubject.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small> Add Subject</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Subject</li>
        <li><a href="allsubjects.php">Back To Listing</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Create New Subject :</h3>
                <?php echo $message; ?>
            </div>
              <form role="form" method="POST">
                <div class="box-body">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="title">Title :</label>
                      <input type="text" name="title" class="form-control" placeholder="Enter Subject Title Here ..." value="">
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
                      <label for="practical_number">Subject Practical Number :</label>
                      <input type="text" name="practical_number" class="form-control" placeholder="Enter Practical Number Here ..." value="">
                      <div class="Message">
                        <?php echo $practical_numberError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="theoretical_number">Subject Theoretical Number :</label>
                      <input type="text" name="theoretical_number" class="form-control" placeholder="Enter Theoretical Number Here ..." value="">
                      <div class="Message">
                        <?php echo $theoretical_numberError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="duration">Subject Examination Time :</label>
                      <input type="text" name="duration" class="form-control" placeholder="Enter Examination Time Here ..." value="">
                      <div class="Message">
                        <?php echo $durationError; ?>
                      </div>
                    </div>     
                    <div class="form-group">
                      <label for="class_id">Class :</label>                    
                      <select  name="class_id" aria-controls="example1" class="form-control input-sm">
                        <option value="">Select</option>
                        <?php 
                          $class_id = (empty($class_id)) ? '' : $class_id;
                          $selectQuery = $dbh->query("SELECT * FROM `class`");
                            while($fetch = $selectQuery->fetch() ){
                        ?>
                        <option value="<?php echo $fetch['id']; ?>"<?php echo ($fetch['id'] == $class_id) ? " selected='selected' " : ''; ?>><?php echo $fetch['title']; ?></option>
                      <?php } ?>
                      </select>
                      <div class="Message">
                        <?php echo $class_idError; ?>
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