<?php
  include("db/connection.php");
  include("code/function.php");
  include("code/allcities.php");
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        City Data        
        <small><a href="addcity.php">Add New City</a></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="allcities.php">All Cities</a></li>
      </ol>
    </section>

  <form method="get">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
                <div class="col-sm-4">
                  <div id="dataTables_length" class="example1_length">
                    <?php
                      $addField = ['deleted' => 'Delete'];
                      bulkAction('multiAction' , $addField);
                    ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="dataTables_length" id="example1_length">
                    <?php
                      $optionFieldValue = [
                        '10'  => '10',
                        '25'  => '25',
                        '50'  => '50',
                        '100' => '100'
                      ];
                      showEnteriesField('showEntries' , $optionFieldValue , $postPerPage);
                    ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div id="example1_filter" class="dataTables_filter">
                    <?php searchField('search'); ?>
                  </div>
                </div>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <?php 

                  // These are comming from the above function.php file

                  $tableColumns = [
                    "name"                => "Name",
                    "description"         => "Description",
                    "cName"               => "Country",
                    "sName"               => "State",
                    "dName"               => "District"
                  ];
                ?>                
                <thead><?php renderTableHeaderPart($tableColumns, $order , $currentPage); ?></thead>
                <tbody>
                  <?php
                    if(!empty($search)){
                      if($response == "0"){
                        $message = "No matching records found";                           
                  ?>
                  <tr class="odd">
                    <td class="dataTables_empty text-center" colspan="9" valign="top">
                      <?php echo $message; ?>
                    </td>
                  </tr>
                  <?php 
                      }
                    }   
                  ?>
                  <?php 
                    foreach( $result as $row ){
                  ?>
                <tr>
                  <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="userDlt[]" class="checkthis" /></td>
                  <td><?php echo ++$offset; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo mb_strimwidth($row['description'], 0, 20, "....."); ?></td>
                  <td><?php echo $row['cName']; ?></td>
                  <td><?php echo $row['sName']; ?></td>
                  <td><?php echo $row['dName']; ?></td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="editcity.php?id=<?php echo $row['id']; ?>">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                  </td>
                  <td>
                    <a 
                      href = "code/deletecity.php?id=<?php echo $row['id']?>" 
                      class="btn btn-danger btn-sm"
                      data-toggle="tooltip" 
                      title="Delete" 
                      name="DeleteID"
                    >
                    <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </td>
                </tr>
                <?php 
                  } 
                ?>
              </tbody>
                <tfoot><?php renderTableHeaderPart($tableColumns, $order , $currentPage); ?></tfoot>
            </table>

              <div class="row">
                <?php pagination($currentPage , $postPerPage , $search , $response , $totalpages); ?>
              </div>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</form>
  </div>
  <!-- /.content-wrapper -->
<?php
  include("include/footer.php");
?>