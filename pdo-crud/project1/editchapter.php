<?php
  include("db/connection.php");
  include("code/function.php");
  include("code/editchapter.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edit Subject Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="allchapters.php">Subject</a></li>
        <li><a href="editchapter.php">Edit Subject Data</a></li>
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
                      <label for="chapterTitle">Title :</label>
                      <input type="text" name="chapterTitle" class="form-control" value="<?php echo $show['chapterTitle']; ?>">
                      <div class="Message">
                        <?php echo $chapterTitleError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control" name="chapterDescription"><?php echo $show['chapterDescription']; ?></textarea>
                      <div class="Message">
                        <?php echo $chapterDescriptionError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="chapternum">Chapter Number assigned :</label>
                      <input type="text" name="chapternum" class="form-control" value="<?php echo $show['chapterNumber_assigned']; ?>">
                      <div class="Message">
                        <?php echo $chapternumError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="class">Class :</label>                    
                      <select  name="class" aria-controls="example1" class="form-control input-sm">
                        <option value="">Select</option>
                        <?php 
                          $class = (empty($class)) ? '' : $class;
                          $selectQuery = $dbh->query("SELECT * FROM `subject`");
                          while($fetch = $selectQuery->fetch() ){
                        ?>
                        <option value="<?php echo $fetch['id']; ?>"<?php echo ($fetch['id'] == $show['chapterSubject']) ? " selected='selected' " : ''; ?>><?php echo $fetch['subjectTitle']; ?></option>
                      <?php } ?>
                      </select>
                      <div class="Message">
                        <?php echo $SubjectError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="chapterupdated">Chapter Update Date :</label>
                      <input type="Date" name="chapterupdated" class="form-control" value="<?php echo $show['chapterUpdated_on']; ?>">
                      <div class="Message">
                        <?php echo $chapterupdatedError; ?>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="updatechapter" class="btn btn-primary">Update</button>
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