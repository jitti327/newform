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
        <li><a href="allsubjects.php">Subject</a></li>
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
                      <input type="text" name="subjectTitle" class="form-control" value="<?php echo $show['subjectTitle']; ?>">
                      <div class="Message">
                        <?php echo $subjectTitleError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control" name="subjectDescription" value="<?php echo $show['subjectDescription']; ?>"></textarea>
                      <div class="Message">
                        <?php echo $subjectDescriptionError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="subjectpractical">Subject Practical Number :</label>
                      <input type="text" name="subjectpracticalnum" class="form-control"  value="<?php echo $show['subjectPracticalnumber']; ?>">
                      <div class="Message">
                        <?php echo $subjectpracticalnumError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="subjectnum">Subject Theoretical Number :</label>
                      <input type="text" name="subjectnum" class="form-control" value="<?php echo $show['subjectTheoreticalnumber']; ?>">
                      <div class="Message">
                        <?php echo $subjectnumError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="subjecttime">Subject Examination Time :</label>
                      <input type="text" name="subjecttime" class="form-control" value="<?php echo $show['subjectExaminationTime']; ?>">
                      <div class="Message">
                        <?php echo $subjecttimeError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="class">Class :</label>                    
                      <select  name="class" aria-controls="example1" class="form-control input-sm">
                        <option value="">Select</option>
                        <option value="">B.tech</option>
                        <option value="">B.sc</option>
                        <option value="">BCA</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="subjectupdated">Subject Created Date :</label>
                      <input type="Date" name="subjectupdated" class="form-control" value="<?php echo $show['subjectUpdated_on']; ?>">
                      <div class="Message">
                        <?php echo $subjectupdatedError; ?>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="updatesubject" class="btn btn-primary">Update</button>
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