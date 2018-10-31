<?php
  include("connection.php");

  try{
    $row = [
    'id' => $_GET['id']
    ];

    $stm = $dbh->prepare("DELETE FROM `sign-up` WHERE id= :id");
    //$stm = $dbh->prepare("DELETE FROM `sign-up` WHERE id= ".$_GET['id']);
    $del = $stm->execute($row);  
  }
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  } 
?>