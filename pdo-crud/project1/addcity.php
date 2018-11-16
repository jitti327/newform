<?php
  include("db/connection.php");
  include("code/addcity.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small> Add City</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add City</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Create New City :</h3>
                <?php echo $message; ?>
            </div>
              <form role="form" method="POST">
                <div class="box-body">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="name">Name :</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter City Name Here ..." value="">
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
                    <div class="form-group">
                      <label for="state">State :</label>                    
                      <select  name="state" aria-controls="example1" class="form-control input-sm">
                        <option value="">Select</option>
                        <?php 
                          $state = (empty($state)) ? '' : $state;
                          $selectQuery = $dbh->query("SELECT * FROM `state`");
                            while($fetch = $selectQuery->fetch() ){
                        ?>
                        <option value="<?php echo $fetch['id']; ?>"<?php echo ($fetch['id'] == $state) ? " selected='selected' " : ''; ?>><?php echo $fetch['name']; ?></option>
                      <?php } ?>
                      </select>
                      <div class="Message">
                        <?php echo $stateError; ?>
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