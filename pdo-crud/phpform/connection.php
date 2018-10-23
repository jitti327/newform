<?php

// ini_set('display_startup_errors', 1);
// ini_set('display_error', 1);
// error_reporting(-1); // showing all errors


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


# Move to functions.php file

#
# Parameter : id - id of the user
# Return    : True  - in case user exists
#           : False - in case user don't exist

function userExist($id){

  global $dbh;

  $stmt = $dbh->prepare( "SELECT * FROM `sign-up` WHERE id= :id LIMIT 1");
  $stmt->execute([ 'id' => $id ]);

  # debug($stmt->rowCount());

  return $stmt->rowCount() == 0 ? false : true;
  return ($stmt->fetch(PDO::FETCH_ASSOC) === false) ? false: true;

}


#
# Parameter : email - email of the user
# Return    : True  - in case user exists
#           : False - in case user don't exist

function emailExist($email){

  global $dbh;

  $stmt = $dbh->prepare( "SELECT * FROM `sign-up` WHERE email= :email LIMIT 1");
  $stmt->execute([ 'email' => $email ]);

  # debug($stmt->rowCount());

  return $stmt->rowCount() == 0 ? false : true;
  return ($stmt->fetch(PDO::FETCH_ASSOC) === false) ? false: true;

}



function debug($var){
  echo '<pre>';
  print_r($var);
  var_dump($var);
  echo '</pre>';
}