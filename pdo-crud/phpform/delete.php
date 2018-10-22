<?php
include("connection.php");

try{

  $row = [
    'id' => $_GET['id']
  ];

  $del = $dbh->prepare("DELETE FROM `sign-up` WHERE id= ':id'");
  $del = execute($row);

}

catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
} 
?>