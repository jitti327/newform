<?php
include("connection.php");
include("function.php");

  
  
  # Does this ID exists ??
  # If not through 404 page error

  if(empty( $_GET['id'] ) || !userExist($_GET['id']) ){
    // We need to go to 404 page
    header("Location: 404.php");
    die();
  }

  $editId = $_GET['id'];

  $message = "";

  $firstnameError = "";

  $lastnameError = "";

  $usernameError = "";

  $emailError = "";


  
 try{

  if(isset($_POST['Update'])){
    
    #Validation Starts Here
    $username  = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];

    $error = false;

    # Firstname is required

    if(empty($firstname)){
      $firstnameError = '<span style="color: rgb(255,0,0);">** Firstname is required</span>';
      $error = true;
    }

    # Lastname is required

    if(empty($lastname)){
      $lastnameError = '<span style="color: rgb(255,0,0);">** Lastname is required</span>';
      $error = true;
    }

    # Username is required

    if(empty($username)){
      $usernameError = '<span style="color: rgb(255,0,0);">** Username is required</span>';
      $error = true;
    }

    # Email is required

    if(empty($email)){
      $emailError = '<span style="color: rgb(255,0,0);">** Email is required</span>';
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
      $emailError = '<span style="color: rgb(255,0,0);">** Email is already taken</span>';
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
        $message = '<span style="color: rgb(255,0,0);">Update sucessfully</span>';
      }
      else{
        $message = '<span style="color: rgb(255,0,0);">** Not Updated</span>';
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
  <div class="container">
  <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form role="form" method="POST">
        <h2 align="center">
          <img src="images/jp.png" width="60px" height="60px" />
          Update Your Details
        </h2>
        <hr class="colorgraph">
        <?php echo $message; ?>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" name="firstname" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" value="<?php echo $show['firstname']; ?>" autocomplete="off">
            <div class="Message">
              <?php echo $firstnameError; ?>
            </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="lastname" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" value="<?php echo $show['lastname']; ?>" autocomplete="off">
            <div class="Message">
              <?php echo $lastnameError; ?>
            </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>User Name</label>
          <input type="text" name="username" id="display_name" class="form-control input-lg" placeholder="User Name" tabindex="3" value="<?php echo $show['displayname']; ?>" autocomplete="off">
        <div class="Message">
          <?php echo $usernameError; ?>
        </div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" value="<?php echo $show['email']; ?>" autocomplete="off">
        </div>
        <div class="Message">
          <?php echo $emailError; ?>
        </div>
        
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-md-6"><input type="submit" name="Update" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
          <div class="col-xs-12 col-md-6"><a href="list.php" class="btn btn-success btn-block btn-lg">Records</a></div>
        </div>
      </form>
    </div>
  </div>
  </div>
<?php
  include("footer.php");
 ?>