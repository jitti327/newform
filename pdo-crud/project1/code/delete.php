<?php
  include("../db/connection.php");

  try{
    $row = [
    'id' => $_GET['id']
    ];

    $stm = $dbh->prepare("DELETE FROM `pdo` WHERE id= :id");
    $del = $stm->execute($row);
    
    header("Location:../data.php");
  }
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  } 
?>