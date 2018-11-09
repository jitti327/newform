<?php
  include("db/connection.php");
  include("code/data.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="data.php">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

  <form method="get">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
                <div class="col-sm-4">
                  <div class="dataTables_length" id="example1_length">
                    <label>Show 
                      <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select> entries
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div id="dataTables_length" class="example1_length">                    
                    <select  name="multiDelete"" aria-controls="example1" class="form-control input-sm">
                      <option value="">Choose</option>
                      <option value="deleted">Delete</option>
                      <option value="blocked">Block</option>
                      <option value="unblocked">UnBlock</option>
                    </select>
                    <button class="btn btn-sm btn-primary btn-create" id="actionButton" name="action">Action
                    </button>
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
                <thead>
                <tr>
                  <th><input type="checkbox" id="checkall" /></th>
                  <th>S.No.</th>
                  <th>
                    <a href="?order-by=firstname&order=<?php echo $order == 'desc'?'asc':'desc'; ?>">Full Name
                      <!-- <?php
                      // $order = '($order == "desc")' ? '<i class="fa fa-sort-amount-desc"></i>' : '<i class="fa fa-sort-amount-asc"></i>';
                      // if($order == 'desc'){
                      //     echo "<i class='fa fa-sort-amount-desc'></i>";
                      //   }
                      //   else{
                      //     echo "<i class='fa fa-sort-amount-asc'></i>";
                      //   }
                        ?> -->
                      <i class="fa fa-sort-amount-<?php echo $order; ?>"></i>
                    </a>
                  </th>
                  <th>
                    <a href="?order-by=username&order=<?php echo $order == 'desc'?'asc':'desc'; ?>">User Name
                      <i class="fa fa-sort-amount-<?php echo $order; ?>"></i>
                    </a>
                  </th>
                  <th>
                    <a href="?order-by=email&order=<?php echo $order == 'desc'?'asc':'desc'; ?>">Email
                      <i class="fa fa-sort-amount-<?php echo $order; ?>"></i>
                    </a>
                  </th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Status</th>
                </tr>
                </thead>
              <?php
                foreach($result as $row){
              ?>
                <tbody>
                <tr>
                  <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="userDlt[]" class="checkthis" /></td>
                  <td><?php echo ++$offset; ?></td>
                  <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $row['id']; ?>">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                  </td>
                  <td>
                    <a 
                      href = "code/delete.php?id=<?php echo $row['id']?>" 
                      class="btn btn-danger btn-sm"
                      data-toggle="tooltip" 
                      title="Delete" 
                      name="DeleteID"
                    >
                    <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </td>
                  <td><?php echo $row['status']; ?></td>
                </tr> 
                </tbody>
              <?php 
                } 
              ?>
                <tfoot>
                <tr>
                  <th><input type="checkbox" id="checkall" /></th>
                  <th>S.No.</th>
                  <th>Full Name</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>

              <div class="row">
                <div class="col-sm-5">
                  <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of <?php echo $response; ?> entries
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
                          $next = $currentPage+1; 
                          $class  = ($currentPage == $totalpages)? 'disabled' : '';
                          $href = ($currentPage == $totalpages)? '#' : '&page=';
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