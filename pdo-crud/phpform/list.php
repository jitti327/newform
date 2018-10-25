<?php
  include("connection.php");

#Query Running for fetching data from database

  if(isset($_POST['locate'])){

    $search = $_POST['search'];

    $row = [
      'search' => $search
    ];
    
    $record = $dbh->prepare( "
      SELECT 
        *
      FROM 
        `sign-up` 
      WHERE
        `firstname` LIKE :search
      OR
        `displayname`  LIKE :search
    ");
    $record-> execute($row);


    #ref link:-- http://php.net/manual/en/pdostatement.fetchall.php

    #echo "<pre>";
    
    #print("Fetch all of the remaining rows in the result set:\n");

    $result = $record;
    #print_r($result);

  }
  else{  

    # Pagination coding Start here..

    if(empty($_GET['page'])){
      $currentPage = 1;
    }else{
      $currentPage = intval($_GET['page']);
    }
    

    if($currentPage <= 0 ){
      $currentPage = 1;
    }


    // $currentPage = empty($_GET['page']) ? 1 : intval( $_GET['page'] );
    // $currentPage = max($currentPage, 1);


    $page = $currentPage -1 ; 


    $postPerPage = 3;

    $offset = $page * $postPerPage;

    // LIMIT 10 OFFSET 25;

    // LIMIT 25, 10;

    // LIMIT $offset, $page;

    $record = $dbh->prepare("
      SELECT
       *
      FROM
       `sign-up`
      LIMIT :offset , :postPerPage 
    ");

    // I have used this because
    // PDO was converting the value into string
    $record->bindValue(':offset', $offset, PDO::PARAM_INT);
    $record->bindValue(':postPerPage', $postPerPage, PDO::PARAM_INT);
    $record-> execute();

    #ref link:-- http://php.net/manual/en/pdostatement.fetchall.php

    #echo "<pre>";
    
    #print("Fetch all of the remaining rows in the result set:\n");

    $result = $record->fetchAll();
    #print_r($result);
  }

  include("header.php");
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 align="center"><b color= rgb(0,0,255)>Database Records</b></h2>
      <div class="searched">
        <form method="post">
          <input type="text" name="search" class="search" id="searching" placeholder="What you looking for?">
          <button type="submit" class="btn btn-primary btn-sm" name="locate"><span class="glyphicon glyphicon-search"></span></button>
        </form>     
      </div>
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
        <?php

          // Foreach loop for getting all data seprately

          foreach($result as $row){
            #print_r($row);
    
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
        </table><a href="index.php" class="return-btn"><i class="glyphicon glyphicon-home"></i>&nbsp;Back To Home</a>

      <div class="clearfix"></div>
        <ul class="pagination pull-right">
          <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="?page=2">2</a></li>
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