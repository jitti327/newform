<?php
  include("../db/connection.php");

  try{
    $row = [
    'id' => $_GET['id']
    ];

    $stm = $dbh->prepare("DELETE FROM `class` WHERE id= :id");
    $del = $stm->execute($row);
    
    header("Location:../allclasses.php");
  }
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  } 
?>