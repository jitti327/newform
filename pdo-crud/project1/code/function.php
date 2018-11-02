<?php
  
  #
  # Parameter : id - id of the user
  # Return    : True  - in case user exists
  #           : False - in case user don't exist

  function userExist($id){

    global $dbh;

    $stmt = $dbh->prepare( "SELECT * FROM `pdo` WHERE id= :id LIMIT 1");
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

    $stmt = $dbh->prepare( "SELECT * FROM `pdo` WHERE email= :email LIMIT 1");
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