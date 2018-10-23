<?php
include("connection.php");

  
  
  # Does this ID exists ??
  # If not through 404 page error

  if(empty( $_GET['id'] ) || !userExist($_GET['id']) ){
    // We need to go to 404 page
    header("Location: 404.php");
    die();
  }

  $editId = $_GET['id'];

  $usernameError = "";


  
 try{

  if(isset($_POST['Update'])){

    
    #Validation Starts Here
    $username  = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];

    $error = false;

    # Username is required

    if(empty($username)){
      $usernameError = 'Username is required';
      $error = true;
    }

    if(empty($firstname)){
      echo 'firstname is required';
      $error = true;
    }


    if(empty($lastname)){
      echo 'lastname is required';
      $error = true;
    }

    if(empty($email)){
      echo 'email is required';
      $error = true;
    }



    # Finding if the email is not taken by other
    $stmt = $dbh->prepare( "
      SELECT 
        * 
      FROM
        `sign-up` 
      WHERE 
        email= :email 
        && 
        id <> :id
      LIMIT 1");

    $stmt->execute([ 
      'email' => $email,
      'id'    => $editId
    ]);

    if($stmt->rowCount() != 0){
      echo 'Email is already taken';
      $error = true;
    }



    # There is no error in the validation and data
    # Hence saving the data
    if(!$error){

      $data = [
        'id'     => $editId,
        'fname'  => $firstname,
        'lname'  => $lastname,
        'uname'  => $username,
        'mail'   => $email,
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
    
      $stmt   = $dbh->prepare($sql);
      $status = $stmt->execute($data);

      if($status !== false){
        echo "Update sucessfully";
      }
      else{
        echo "Not Updated";
      }      
    }


  }

  $row = [
    'id' => $editId
  ];

  $edit = $dbh->prepare( "SELECT * FROM `sign-up` WHERE id= :id");
  $edit-> execute($row);
  $show = $edit->fetch(); 


}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  header("Location: 500.php");
  die();

} 

include("header.php");

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
              <input type="text" name="firstname" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" value="<?php echo $show['firstname']; ?>" autocomplete="off">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="lastname" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" value="<?php echo $show['lastname']; ?>" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>User Name</label>
          <input type="text" name="username" id="display_name" class="form-control input-lg" placeholder="User Name" tabindex="3" value="<?php echo $show['displayname']; ?>" autocomplete="off">
          <?php echo $usernameError; ?>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" value="<?php echo $show['email']; ?>" autocomplete="off">
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