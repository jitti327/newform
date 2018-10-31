<?php
  include("connection.php");

  try{
    $row = [
    'id' => $_GET['id']
    ];

    $stm = $dbh->prepare("DELETE FROM `sign-up` WHERE id= :id");
    //$stm = $dbh->prepare("DELETE FROM `sign-up` WHERE id= ".$_GET['id']);
    $del = $stm->execute($row);

    if($del !== false){
      echo "<p class='alert alert-success'>Deleted sucessfully</p>";
      header("location:list.php?id=delete&page=".$_GET['page']);
    }
    else{
      echo "<p class='alert alert-danger'>Record not deleted</p>";
    }   
  }
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  } 
?>