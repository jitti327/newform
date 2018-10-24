<?php
  include("connection.php");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4>Database Records</h4>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead>
            <tr>
              <th><input type="checkbox" id="checkall" /></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
        <!----Query Running for fetching data from database--->
        <?php
          $record = $dbh->prepare( "SELECT * FROM `sign-up`");
          $record-> execute();

          #ref link:-- http://php.net/manual/en/pdostatement.fetchall.php

          #echo "<pre>";
          
          #print("Fetch all of the remaining rows in the result set:\n");

          $result = $record->fetchAll();
          #print_r($result);
          
          // Foreach loop for getting all data seprately

          foreach($result as $row){
            #print_r($row);
    
          include("header.php");
            ?>

          <tbody>
            <tr>
              <td><input type="checkbox" class="checkthis" /></td>
              <td><?php echo $row['firstname']; ?></td>
              <td><?php echo $row['lastname']; ?></td>
              <td><?php echo $row['displayname']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><a href="edit.php?id=<?php echo $row['id']?>"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
              <td><a href="delete.php?id=<?php echo $row['id']?>"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></a></td>
            </tr>
          </tbody>
          <?php
            }
          ?>
        </table>

      <div class="clearfix"></div>
        <ul class="pagination pull-right">
          <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
      <div class="modal-body">
      <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
    </div>
  <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>