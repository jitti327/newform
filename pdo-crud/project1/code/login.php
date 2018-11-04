<?php

  $message = "";
  
  try{

    if(isset($_POST['submit'])){

      $email      = $_POST['email'];  
      $password   = $_POST['password'];


    # Email and Password Only For Admin Login

      if($email == "jatin@gmail.com" && $password == "jatin"){
        header('Location:Admin.php');
      }

    # Finding Wheather email and password matched with databse

      $stmt = $dbh->prepare( "
        SELECT 
          * 
        FROM
          `pdo` 
        WHERE 
          email= :email 
        and 
          password= :password
        LIMIT 1");

      $stmt->execute([
        'email'    => $email,
        'password' => md5($password)
      ]);
      $row = $stmt->fetch();
      $rowCount = $stmt->rowCount();
      if($rowCount > 0){
        // $message = "<span style='color: rgba(0,255,0,0.8);'>Wellcome</span>";
        header("Location:wellcome.php");
      }else{
        $message = "<span style='color: rgb(255,0,0);'>** Email and Password Doesn't Matched</span>";
      }
    }
  }
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
  include("include/userheader.php");
?>