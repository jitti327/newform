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
                      <input type="text" name="subjectTitle" class="form-control" placeholder="Enter Subject Title Here ..." value="">
                      <div class="Message">
                        <?php echo $subectTitleError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control" name="subjectDescription" value="" rows="3" placeholder="Enter Description Here ..."></textarea>
                      <div class="Message">
                        <?php echo $subjectDescriptionError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="subjectpractical">Subject Practical Number :</label>
                      <input type="text" name="subjectpracticalnum" class="form-control" placeholder="Enter Practical Number Here ..." value="">
                      <div class="Message">
                        <?php echo $subjectpracticalnumError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="subjectnum">Subject Theoretical Number :</label>
                      <input type="text" name="subjectnum" class="form-control" placeholder="Enter Theoretical Number Here ..." value="">
                      <div class="Message">
                        <?php echo $subjectnumError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="subjecttime">Subject Examination Time :</label>
                      <input type="text" name="subjecttime" class="form-control" placeholder="Enter Examination Time Here ..." value="">
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
                      <label for="subjectcreated">Subject Created Date :</label>
                      <input type="Date" name="subjectcreated" class="form-control" placeholder="Enter Subject Created Date Here ..." value="">
                      <div class="Message">
                        <?php echo $subjectcreatedError; ?>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="addsubject" class="btn btn-primary">Submit</button>
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