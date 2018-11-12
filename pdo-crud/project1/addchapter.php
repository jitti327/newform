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
                      <label for="chapterTitle">Title :</label>
                      <input type="text" name="chapterTitle" class="form-control" placeholder="Enter Chapter Title Here ..." value="">
                      <div class="Message">
                        <?php echo $chapterTitleError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control" name="chapterDescription" value="" placeholder="Enter Description Here ..."></textarea>
                      <div class="Message">
                        <?php echo $chapterDescriptionError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="chapternum">Chapter Number assigned :</label>
                      <input type="text" name="chapternum" class="form-control" placeholder="Enter Number assigned Here ..." value="">
                      <div class="Message">
                        <?php echo $chapternumError; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="subject">subject :</label>                    
                      <select  name="class" aria-controls="example1" class="form-control input-sm">
                        <option value="">Select</option>
                        <?php 
                          $selectQuery = $dbh->query("SELECT * FROM `subject`");
                            while($fetch = $selectQuery->fetch() ){
                        ?>
                        <option value="<?php echo $fetch['id']; ?>"><?php echo $fetch['subjectTitle']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="chaptercreated">Chapter Created Date :</label>
                      <input type="Date" name="chaptercreated" class="form-control" placeholder="Enter Chapter Created Date Here ..." value="">
                      <div class="Message">
                        <?php echo $chaptercreatedError; ?>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="addchapter" class="btn btn-primary">Submit</button>
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