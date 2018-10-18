<?php

$servername = 'localhost';
$username   = 'root';
$password   = 'root';
$database   = 'Student-form';

$sql = mysqli_connect($servername, $username, $password, $database);

if($sql){
  echo "";
}
else{
  die("Not connected because " .mysqli_connect_error());
}
?>