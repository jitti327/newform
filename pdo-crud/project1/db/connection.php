<?php
  $dsn      = 'mysql:dbname=project1;host=localhost; charset=utf8';
  // $dsn1     = 'mysql:dbname=classicmodels;host=localhost';
  $user     = 'root';
  $password = '';

  try{
    $dbh  = new PDO($dsn, $user, $password);
    // $dbh1 = new PDO($dsn1, $user, $password);
    $dbh-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $dbh1-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){
    echo 'Connection Failed Because Of: ' . $e->getMessage();
  }


  // $dbConfig = array(
  //   'user'     => 'root',
  //   'password' => 'root'
  // );

  // $dbConfig['user']  
  define('URL','http://localhost/git-projects/newform/pdo-crud/project1/');
?>