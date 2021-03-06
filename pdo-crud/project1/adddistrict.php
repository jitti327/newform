<?php
  include("db/connection.php");
  include("code/function.php");
  include("code/adddistrict.php");
  include("include/header.php");
  include("include/sidebar.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small> Add District</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add District</li>
        <li><a href="alldistricts.php">Back To Listing</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Create New District :</h3>
                <?php echo $message; ?>
            </div>
              <form role="form" method="POST">
                <div class="box-body">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="name">Name :</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter District Name Here ..." value="">
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
                      <label for="country">Country :</label>
                      <select id="country"  name="country" aria-controls="example1" class="form-control input-sm">
                        <option value="">-Select Country-</option>
                        <?php 
                          $country = (empty($country)) ? '' : $country;
                          $selectQuery = $dbh->query("SELECT * FROM `country`");
                            while($fetch = $selectQuery->fetch() ){
                        ?>
                        <option value="<?php echo $fetch['id']; ?>"<?php echo ($fetch['id'] == $country) ? " selected='selected' " : ''; ?>><?php echo $fetch['name']; ?></option>
                      <?php } ?>
                      </select>                        
                      <div class="Message">
                        <?php echo $countryError; ?>
                      </div>
                    </div>     
                    <div class="form-group">
                      <label for="state">State :</label>                    
                      <select  name="state" id="state" aria-controls="example1" class="form-control input-sm">
                        <option>-Select Country First-</option>
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
?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#country').on('change',function(){
        $country = $(this).val();
          if($country){
            $.ajax({
              type:'POST',
              url:'ajaxData.php',
              data:{CountryId:$country},
              success:function(html){
                $('#state').html(html);
              }
            }); 
          }
          else{
            $('#state').html('<option value="">-Select State-</option>'); 
          }
      });
    });
  </script>