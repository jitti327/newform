<?php
  include("../db/connection.php");

  try{
    $row = [
    'id' => $_REQUEST['id']
    ];

    $stm = $dbh->prepare("DELETE FROM `country` WHERE id= :id");
    $del = $stm->execute($row);
    
    header("Location:../allcountries.php");
  }
  catch (PDOException $e) {
    echo 'Sorry Your Delete Query Doesnot Run Because Of : ' . $e->getMessage();
  } 
?>