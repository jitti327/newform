<?php
  include("db/connection.php");

  $record1 = $dbh1->prepare( "SELECT * FROM `customers`");
  $record1-> execute();
  $result1 = $record1->fetchAll();
  foreach( $result1 as $row1 ){
    $row = [
      'firstname' => $row1['contactFirstName'],
      'lastname'  => $row1['contactLastName'],
      'username'  => $row1['customerName'],
      'email'     => $row1['contactFirstName'].'@'.$row1['contactLastName'].'gmail.com',
      'pass'      => md5( $row1['contactFirstName'] )
    ];

  $sql = "
    INSERT 
     INTO `pdo`
      (`firstname`, `lastname`, `username`, `email`, `password`)
    VALUES 
    (:firstname , :lastname , :username , :email , :pass )";
        
  $statement = $dbh->prepare($sql);
  $status    = $statement->execute($row);

  }
    // echo "<pre>";
    //   print_r( $row1 );
    // echo "</pre>";

  die();
?>