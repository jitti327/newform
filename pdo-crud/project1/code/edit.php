<?php 
  
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

  if(isset($_POST['update'])){
    
    #Validation Starts Here

    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $username  = $_POST['username'];
    $email     = $_POST['email'];

    # This method is used for block any user by admin 

    $status    = (isset($_POST['block'])) ? "Blocked" : "Unblocked";

    
    // if(isset($_POST['block'])){      
    //   echo "On";
    //   $status = "On";
    // }else{
    //   $status = "Off";
    //   echo "Hi";
    // }



    // $status = $_POST['block'];
      // echo '<pre>';
      //   print_r($_POST);
      // echo '</pre>';

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
        `pdo` 
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
        'email'  => $email,
        'block'  => $status
      ];

      $sql = "
        UPDATE 
          `pdo` 
        SET 
          `firstname`= :fname,
          `lastname`= :lname,
          `username`= :uname,
          `email`= :email,
          `status`= :block
        WHERE 
          `id` =:id";
    
      $stmt   = $dbh->prepare($sql);
      $status = $stmt->execute($data);

      if($status !== false){
        $message = '<span style="color: rgb(0,255,0);">Update sucessfully</span>';
      }
      else{
        $message = '<span style="color: rgb(255,0,0);">** Not Updated</span>';
      }      
    }
  }

  $row = [
    'id' => $editId
  ];

  $edit = $dbh->prepare( "SELECT * FROM `pdo` WHERE id= :id");
  $edit-> execute($row);
  $show = $edit->fetch();
}
catch (pdoException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  header("Location: 500.php");
  die();
} 


  include("include/header.php");
  include("include/sidebar.php");