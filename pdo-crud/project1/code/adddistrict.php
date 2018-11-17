<?php
  $message = "";

  $editId = "";

  $nameError = "";

  $descriptionError = "";

  $countryError = "";

  $stateError = "";

  try{
    if(isset($_POST['add'])){
      
      #Validation Starts Here

      $name         = $_POST['name'];
      $description  = $_POST['description'];
      $country      = $_POST['country'];
      $state        = $_POST['state'];

      $error = false;

      if(empty($name)){
        $nameError = '<span style="color: rgb(255,0,0);">** District Name is required</span>';
        $error = true;
      }

      if(empty($description)){
        $descriptionError = '<span style="color: rgb(255,0,0);">** Description is required</span>';
        $error = true;
      }

      if(empty($county)){
        $countryError = '<span style="color: rgb(255,0,0);">** Please Select the Country</span>';
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
        `district`
      WHERE 
        name= :name
        &&  
        country_id= :country
        &&  
        state_id= :state
        &&
        id <> :id
      LIMIT 1");

    $stmt->execute([ 
      'name'     => $name,
      'country'  => $country,
      'state'    => $state,
      'id'       => $editId
    ]);

    if($stmt->rowCount() != 0){
      $nameError = '<span style="color: rgb(255,0,0);">** District is already taken</span>';
      $countryError = '<span style="color: rgb(255,0,0);">** State is already taken</span>';
      $stateError = '<span style="color: rgb(255,0,0);">** State is already taken</span>';
      $error = true;
    }

      if(!$error){

      $row = [
        'name'          => $name,
        'description'   => $description,
        'country'       => $country,
        'state'         => $state
      ];

      $sql = "
        INSERT 
         INTO `district`
          (`name`, `description`, `country_id`, `state_id`)
        VALUES 
        (:name , :description , :country , :state)";
        
      $statement = $dbh->prepare($sql);
      $status    = $statement->execute($row);
      $message   = '<span style="color: rgb(0,255,0);">District Added Successfully</span>';
    }
    else{
      $message = '<span style="color: rgb(255,0,0);"> No District Added</sapn>';
    }
  }

  include("include/header.php");
  include("include/sidebar.php");
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
?>