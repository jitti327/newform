<?php
  include("db/connection.php");
  include("code/allsubjects.php");
  include("code/config/afunction.php");

  $tableColumns = [
    "Class"                       => "Class",
    "subjectTitle"                => "Title",
    "subjectDescription"          => "Description",
    "subjectTheoreticalnumber"    => "Theoretical No.",
    "subjectPracticalnumber"      => "Practical No.",
    "subjectExaminationTime"      => "Duration",
    "subjectCreated_on"           => "Created On",
    "subjectUpdated_on"           => "Updated On"
  ];
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Subject Data        
        <small><a href="addsubject.php">Add New Subject</a></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="allsubjects.php">AllSubjects</a></li>
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
                    <select  name="multiDelete" aria-controls="example1" class="form-control input-sm">
                      <option value="">Choose</option>
                      <option value="deleted">Delete</option>
                    </select>
                    <button class="btn btn-sm btn-primary btn-create" id="actionButton" name="action">Action
                    </button>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="dataTables_length" id="example1_length">
                    <label>Show 
                      <select name="listing" aria-controls="example1" class="form-control input-sm">
                        <option value="10" <?php echo ($postPerPage == '10') ? "selected='selected'" : "" ; ?>>10</option>
                        <option value="25" <?php echo ($postPerPage == '25') ? "selected='selected'" : "" ; ?>>25</option>
                        <option value="50" <?php echo ($postPerPage == '50') ? "selected='selected'" : "" ; ?>>50</option>
                        <option value="100" <?php echo ($postPerPage == '100') ? "selected='selected'" : "" ; ?>>100</option>
                      </select> entries
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div id="example1_filter" class="dataTables_filter">
                    <label>Search:
                      <input type="search" name="search" id="searching" value="<?php echo $search; ?>" class="form-control input-sm" placeholder="What you looking for?" aria-controls="example1">
                      <button type="submit" class="btn btn-primary btn-sm" name="locate">
                        <span class="glyphicon glyphicon-search"></span>
                      </button>
                    </label>
                  </div>
                </div>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                
                <thead><?php renderTableHeaderPart($tableColumns, $orderBy, $order); ?></thead>
              <?php
                foreach($result as $row){
              ?>
                <tbody>
                <tr>
                  <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="userDlt[]" class="checkthis" /></td>
                  <td><?php echo ++$offset; ?></td>
                  <td>
                    <?php                    
                      $query = "SELECT * FROM `class` WHERE `id` = ".$row['Class'];
                      $subQuery = $dbh->query($query);
                      $fetch = $subQuery->fetch();

                      echo ( $row['Class'] == $fetch['id'] ) ? $fetch['classTitle'] : $row['Class'] ; 
                    ?>                        
                  </td>
                  <td><?php echo $row['subjectTitle']; ?></td>
                  <td>
                    <?php 
                      // $string = $row['subjectDescription'];
                      echo mb_strimwidth($row['subjectDescription'], 0, 20, ".....");
                    ?>
                    <!-- <?php echo $row['subjectDescription']; ?>                       -->
                  </td>
                  <td><?php echo $row['subjectTheoreticalnumber']; ?></td>
                  <td><?php echo $row['subjectPracticalnumber']; ?></td>
                  <td><?php echo $row['subjectExaminationTime']; ?></td>
                  <td><?php echo $row['subjectCreated_on']; ?></td>
                  <td><?php echo $row['subjectUpdated_on']; ?></td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="editsubject.php?id=<?php echo $row['id']; ?>">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                  </td>
                  <td>
                    <a 
                      href = "code/deletesubject.php?id=<?php echo $row['id']?>" 
                      class="btn btn-danger btn-sm"
                      data-toggle="tooltip" 
                      title="Delete" 
                      name="DeleteID"
                    >
                    <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </td>
                </tr>
                </tbody>
              <?php 
                } 
              ?>

            <!-- This Is used for Display the message While No data Found -->
              <?php
              if($response == 0){
              ?>   
              <tr class="odd">
                <td valign="top" colspan="9" class="dataTables_empty text-center">
                  <?php echo "No Result Were Found"; ?>
                </td>
              </tr>
              <?php
                }
              ?>
                
                <tfoot><?php renderTableHeaderPart($tableColumns, $orderBy, $order); ?></tfoot>
              </table>

              <div class="row">
                <div class="col-sm-5">
                  <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to <?php echo $postPerPage; ?> of <?php echo $response; ?> entries
                  </div>
                </div>
                <div class="col-sm-7">
                  <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    <ul class="pagination">
                      <?php
                      if( $currentPage ){ 
                        $previous = $currentPage-1;
                        $class    = ($currentPage == 1)? 'disabled' : '';
                        $href     = ($currentPage == 1)? '#' : '&page=';
                      ?>
                      <li class="<?php echo $class; ?>">
                        <a href="?search=<?php echo $search; ?><?php echo $href . $previous; ?>">Previous</a>
                      </li>
                     <?php } ?>
                     <?php
                        for($i =1; $i <= $totalpages; $i++){ 
                          $class = ($i == $currentPage) ? "active" : "";
                          $href  = ($i == $currentPage) ? "#"      : "&page={$i}";
                       ?>
                      <li class="<?php echo $class; ?>">
                        <a href="?search=<?php echo $search; ?><?php echo $href; ?>">
                          <?php echo $i; ?>
                        </a>
                      </li>
                      <?php } ?>
                      <?php  
                        if( $currentPage ){
                          $next  = $currentPage+1; 
                          $class = ($currentPage == $totalpages)? 'disabled' : '';
                          $href  = ($currentPage == $totalpages)? '#' : '&page=';
                          ?>
                      <li class="<?php echo $class; ?>" >
                        <a href="?search=<?php echo $search; ?><?php echo $href . $next; ?>">Next</a>
                      </li>
                       <?php }  ?>
                    </ul>
                  </div>
                </div>
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