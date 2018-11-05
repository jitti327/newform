<?php
  include("db/connection.php");
  include("code/data.php");

  // $record = $dbh->prepare( "SELECT * FROM `pdo`");
  // $record-> execute();
  // $result = $record->fetchAll();
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
              <div class="row">
                <div class="col-sm-6">
                  <div class="dataTables_length" id="example1_length">
                    <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select> entries</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div id="example1_filter" class="dataTables_filter">
                    <label>Search:
                      <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                    </label>
                  </div>
                </div>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
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
                </thead>
              <?php
                foreach($result as $row){
              ?>
                <tbody>
                <tr>
                  <td><input type="checkbox" class="checkthis" /></td>
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
                  <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries
                  </div>
                </div>
                <div class="col-sm-7">
                  <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    <ul class="pagination">
                      <li class="paginate_button previous disabled" id="example1_previous">
                        <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a>
                      </li>
                      <li class="paginate_button active">
                        <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
                      </li>
                      <li class="paginate_button ">
                        <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a>
                      </li>
                      <li class="paginate_button ">
                        <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a>
                      </li>
                      <li class="paginate_button ">
                        <a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a>
                      </li>
                      <li class="paginate_button ">
                        <a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a>
                      </li>
                      <li class="paginate_button ">
                        <a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a>
                      </li>
                      <li class="paginate_button next" id="example1_next">
                        <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a>
                      </li>
                    </ul>
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
  </div>
  <!-- /.content-wrapper -->
<?php
  include("include/footer.php");
?>