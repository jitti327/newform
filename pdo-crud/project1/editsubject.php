<?php
  include("db/connection.php");
  include("code/function.php");
  include("code/editsubject.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edit Subject Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="allsubject.php">Subject</a></li>
        <li><a href="editsubject.php">Edit Subject Data</a></li>
      </ol>
    </section>   

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Update Subject :</h3>
                <?php echo $message; ?>
            </div>
              <form role="form" method="POST">
                <div class="box-body">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="title">Title :</label>
                      <input type="text" name="title" class="form-control" value="<?php echo $show['title']; ?>">
                      <div class="Message">
                        <?php echo $titleError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control" name="description" ><?php echo $show['description']; ?></textarea>
                      <div class="Message">
                        <?php echo $descriptionError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="practical_number">Subject Practical Number :</label>
                      <input type="text" name="practical_number" class="form-control"  value="<?php echo $show['practical_number']; ?>">
                      <div class="Message">
                        <?php echo $practical_numberError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="theoretical_number">Subject Theoretical Number :</label>
                      <input type="text" name="theoretical_number" class="form-control" value="<?php echo $show['theoretical_number']; ?>">
                      <div class="Message">
                        <?php echo $theoretical_numberError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="duration">Subject Examination Time :</label>
                      <input type="text" name="duration" class="form-control" value="<?php echo $show['duration']; ?>">
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
                        <option value="<?php echo $fetch['id']; ?>"<?php echo ($fetch['id'] == $show['class_id']) ? " selected='selected' " : ''; ?>><?php echo $fetch['title']; ?></option>
                      <?php } ?>
                      </select>
                      <div class="Message">
                        <?php echo $class_idError; ?>
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
<?php
  include("include/footer.php");
?>