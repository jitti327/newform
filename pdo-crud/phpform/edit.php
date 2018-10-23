<?php
include("connection.php");
include("header.php");

  $row = [
    'id' => $_GET['id'],
  ];
  
 try{
  if(isset($_POST['Update'])){
    $data = [
      'id'     => $_GET['id'],
      'fname'  => $_POST['firstname'],
      'lname'  => $_POST['lastname'],
      'uname'  => $_POST['username'],
      'mail'   => $_POST['email'],
    ];

    $sql = "
      UPDATE 
        `sign-up` 
          SET 
           `firstname`= :fname,
           `lastname`= :lname,
           `displayname`= :uname,
           `email`= :mail
      WHERE 
        `id` =:id";
  
    $stmt= $dbh->prepare($sql);
    $status= $stmt->execute($data);

  if($status !== false){
    echo "Update sucessfully";
  }
  else{
    echo "Not Updated";
  }
  }




  $edit = $dbh->prepare( "SELECT * FROM `sign-up` WHERE id= :id");
  $edit-> execute($row);
  $show = $edit->fetch(); 

}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
} 

?>
<!DOCTYPE html>
<html>
<body> 

  <div class="container">

  <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form role="form" method="POST">
        <h2 align="center">Update Your Details</h2>
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" name="firstname" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" value="<?php echo $show['firstname']; ?>">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="lastname" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" value="<?php echo $show['lastname']; ?>">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>User Name</label>
          <input type="text" name="username" id="display_name" class="form-control input-lg" placeholder="User Name" tabindex="3" value="<?php echo $show['displayname']; ?>">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" value="<?php echo $show['email']; ?>">
        </div>
        
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-md-6"><input type="submit" name="Update" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
          <div class="col-xs-12 col-md-6"><a href="record.php" class="btn btn-success btn-block btn-lg">Records</a></div>
        </div>
      </form>
    </div>
  </div>
  </div>
</body>
</html>