<?php
  $message = "";

  $editId = "";

  $nameError = "";

  $descriptionError = "";

  $stateError = "";

  try{
    if(isset($_POST['add'])){
      
      #Validation Starts Here

      $name         = $_POST['name'];
      $description  = $_POST['description'];
      $state        = $_POST['state'];

      $error = false;

      if(empty($name)){
        $nameError = '<span style="color: rgb(255,0,0);">** City Name is required</span>';
        $error = true;
      }

      if(empty($description)){
        $descriptionError = '<span style="color: rgb(255,0,0);">** Description is required</span>';
        $error = true;
      }

      if(empty($state)){
        $stateError = '<span style="color: rgb(255,0,0);">** Please Select the state</span>';
        $error = true;
      }

  # Finding if the email is not taken by other

    $stmt = $dbh->prepare( "
      SELECT 
        * 
      FROM
        `city`
      WHERE 
        name= :name 
        &&  
        state_id= :state 
        &&
        id <> :id
      LIMIT 1");

    $stmt->execute([ 
      'name'     => $name,
      'state'    => $state,
      'id'       => $editId
    ]);

    if($stmt->rowCount() != 0){
      $nameError = '<span style="color: rgb(255,0,0);">** City is already taken</span>';
      $stateError = '<span style="color: rgb(255,0,0);">** State is already taken</span>';
      $error = true;
    }

      if(!$error){

      $row = [
        'name'          => $name,
        'description'   => $description,
        'state'         => $state
      ];

      $sql = "
        INSERT 
         INTO `city`
          (`name`, `description`, `state_id`)
        VALUES 
        (:name , :description , :state)";
        
      $statement = $dbh->prepare($sql);
      $status    = $statement->execute($row);
      $message   = '<span style="color: rgb(0,255,0);">City Added Successfully</span>';
    }
    else{
      $message = '<span style="color: rgb(255,0,0);"> No City Added</sapn>';
    }
  }
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

  include("include/header.php");
  include("include/sidebar.php");
?>