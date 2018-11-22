<?php
  include("db/connection.php");
  include("code/function.php");
  include("code/editchapter.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edit Chapter Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="allchapters.php">Chapter</a></li>
        <li><a href="editchapter.php">Edit Chapter Data</a></li>
      </ol>
    </section>   

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Edit Chapter :</h3>
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
                      <textarea class="form-control" name="description"><?php echo $show['description']; ?></textarea>
                      <div class="Message">
                        <?php echo $descriptionError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="number_assigned">Chapter Number assigned :</label>
                      <input type="text" name="number_assigned" class="form-control" value="<?php echo $show['number_assigned']; ?>">
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