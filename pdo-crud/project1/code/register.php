<?php

  $editId = "";

  $firstnameError = "";

  $lastnameError = "";

  $usernameError = "";

  $emailError = "";

  $passError = "";

  $cpassError = "";
  try{
    if(isset($_POST['submit'])){
      
      #Validation Starts Here

      $firstname  = $_POST['firstname'];
      $lastname   = $_POST['lastname'];
      $username   = $_POST['username'];
      $email      = $_POST['email'];  
      $pass       = $_POST['password'];
      $cpass      = $_POST['conpassword'];

      $error = false;

      # First Name is required

      if(empty($firstname)){
        $firstnameError = '<span style="color: rgb(255,0,0);">**First Name is required</span>';
        $error = true;
      }

      # Last Name is required

      if(empty($lastname)){
        $lastnameError = '<span style="color: rgb(255,0,0);">**First Name is required</span>';
        $error = true;
      }

      # User Name is required

      if(empty($username)){
        $usernameError = '<span style="color: rgb(255,0,0);">**First Name is required</span>';
        $error = true;
      }

      # Email is required

      if(empty($email)){
        $emailError  = '<span style="color: rgb(255,0,0);">** Email is required</span>';
        $error = true;
      }

      # Password is required

      if(empty($pass)){
        $passError = '<span style="color: rgb(255,0,0);">** Password is required</span>';
        $error = true;
      }

      # Confirm Password is required

      if(empty($cpass)){   $cpassError = '<span style="color: rgb(255,0,0);">** Confirm Password is required</span>';
      $error = true; }



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
      $emailError  ='<span style="color: rgb(255,0,0);">** Sorry Email is already taken<span>';
      $error = true;
    }

      # There is no error in the validation and data
      # Hence saving the data
      if(!$error){

      $row = [
        'firstname' => $firstname,
        'lastname'  => $lastname,
        'username'  => $username,
        'email'     => $email,
        'pass'      => md5($pass),
      ];

      $sql = "
        INSERT 
         INTO `pdo`
          (`firstname`, `lastname`, `username`, `email`, `password`)
        VALUES 
        (:firstname , :lastname , :username , :email , :pass)";
        
      $statement = $dbh->prepare($sql);
      $status    = $statement->execute($row);
      header("Location:login.php");
    }
  }
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
include("include/userheader.php");
?>