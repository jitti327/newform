<?php
  include("db/connection.php");
  include("code/function.php");
  include("code/editstate.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edit State Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="allstates.php">State</a></li>
        <li><a href="editstate.php">Edit State Data</a></li>
      </ol>
    </section>   

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Update State :</h3>
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
                      <label for="country">State :</label>                    
                      <select  name="country" aria-controls="example1" class="form-control input-sm">
                        <option value="">Select</option>
                        <?php 
                          $country = (empty($country)) ? '' : $country;
                          $selectQuery = $dbh->query("SELECT * FROM `country`");
                            while($fetch = $selectQuery->fetch() ){
                        ?>
                        <option value="<?php echo $fetch['id']; ?>"<?php echo ($fetch['id'] == $show['country_id']) ? " selected='selected' " : ''; ?>><?php echo $fetch['name']; ?></option>
                      <?php } ?>
                      </select>
                      <div class="Message">
                        <?php echo $countryError; ?>
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