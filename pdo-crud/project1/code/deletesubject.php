<?php
  include("../db/connection.php");

  try{
    $row = [
    'id' => $_GET['id']
    ];

    $stm = $dbh->prepare("DELETE FROM `subject` WHERE id= :id");
    $del = $stm->execute($row);
    
    header("Location:../allsubjects.php");
  }
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  } 
?>