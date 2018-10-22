<?php

ini_set('display_startup_errors', 1);
ini_set('display_error', 1);
error_reporting(-1); // showing all errors

// Making connection with database ('registration')

$dsn      = 'mysql:dbname=registration;host=127.0.0.1';  // $dsn = data source name

$user     = 'root';
$password = 'root';

try{
  $dbh = new PDO($dsn, $user, $password );

  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}