<?php
  include("db/connection.php");
  include("code/function.php");
  include("code/editcity.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edit City Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="allcities.php">City</a></li>
        <li><a href="editcity.php">Edit City Data</a></li>
      </ol>
    </section>   

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Update City :</h3>
                <?php echo $message; ?>
            </div>
              <form role="form" method="POST">
                <div class="box-body">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="title">name :</label>
                      <input type="text" name="name" class="form-control" value="<?php echo $show['name']; ?>">
                      <div class="Message">
                        <?php echo $nameError; ?>
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
                      <label for="state">State :</label>                    
                      <select  name="state" aria-controls="example1" class="form-control input-sm">
                        <option value="">Select</option>
                        <?php 
                          $state = (empty($state)) ? '' : $state;
                          $selectQuery = $dbh->query("SELECT * FROM `state`");
                            while($fetch = $selectQuery->fetch() ){
                        ?>
                        <option value="<?php echo $fetch['id']; ?>"<?php echo ($fetch['id'] == $show['state_id']) ? " selected='selected' " : ''; ?>><?php echo $fetch['name']; ?></option>
                      <?php } ?>
                      </select>
                      <div class="Message">
                        <?php echo $stateError; ?>
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