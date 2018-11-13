<?php
  include("db/connection.php");
  include("code/allchapters.php");

    function renderTableHeaderPart($columnDetails, $orderBy, $order){
      echo "<tr>";
      echo "<th><input type='checkbox' id='checkall' /></th>";
      echo "<th>S.No</th>";

      foreach ($columnDetails as $key => $value) {
        ?>
        <th>
          <a href="?order-by=<?php echo $key; ?>&order=<?php echo $order == 'desc'?'asc':'desc'; ?>"><?php echo $value; ?>
            <?php 
              if( $orderBy == $key){ ?>
               <i class="fa fa-sort-amount-<?php echo $order; ?>"></i> 
             <?php }
            ?>
          </a>
        </th>
        <?php
      }
      echo "<th>Edit</th>";
      echo "<th>Delete</th>";
      echo "</tr>"; 
    }

  $tableColumns = [
    "chapterTitle"                => "Title",
    "chapterDescription"          => "Description",
    "chapterNumber_assigned"      => "Total No.",
    "chapterSubject"              => "Subject",
    "chapterCreated_on"           => "Created On",
    "chapterUpdated_on"           => "Updated On"
  ];
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Chapter Data        
        <small><a href="addchapter.php">Add New Chapter</a></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="allchapters.php">All Chapters</a></li>
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
                  <td><?php echo $row['chapterTitle']; ?></td>
                  <td>
                    <?php
                      //Used for truncate the words to 20 only
                      echo mb_strimwidth($row['chapterDescription'], 0, 20, ".....");
                      // echo $row['chapterDescription']; # Used to show the description data
                    ?>                        
                  </td>
                  <td><?php echo $row['chapterNumber_assigned']; ?></td>
                  <td>
                    <?php                    
                      $query = "SELECT * FROM `subject` WHERE `id` = ".$row['chapterSubject'];
                      $subQuery = $dbh->query($query);
                      $fetch = $subQuery->fetch();

                      echo ( $row['chapterSubject'] == $fetch['id'] ) ? $fetch['subjectTitle'] : $row['chapterSubject'] ; 
                    ?>
                  </td>
                  <td><?php echo $row['chapterCreated_on']; ?></td>
                  <td><?php echo $row['chapterUpdated_on']; ?></td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="editchapter.php?id=<?php echo $row['id']; ?>">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                  </td>
                  <td>
                    <a 
                      href = "code/deletechapter.php?id=<?php echo $row['id']?>" 
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