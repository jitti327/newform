<?php
  $message = "";

  $editId = "";

  $nameError = "";

  $descriptionError = "";

  $countryError = "";

  try{
    if(isset($_POST['add'])){
      
      #Validation Starts Here

      $name         = $_POST['name'];
      $description  = $_POST['description'];
      $country      = $_POST['country'];

      $error = false;

      if(empty($name)){
        $nameError = '<span style="color: rgb(255,0,0);">** State Name is required</span>';
        $error = true;
      }

      if(empty($description)){
        $descriptionError = '<span style="color: rgb(255,0,0);">** Description is required</span>';
        $error = true;
      }

      if(empty($country)){
        $countryError = '<span style="color: rgb(255,0,0);">** Please Select the country</span>';
        $error = true;
      }

  # Finding if the email is not taken by other

    $stmt = $dbh->prepare( "
      SELECT 
        * 
      FROM
        `state` 
      WHERE 
        name= :name 
        &&  
        country_id= :country 
        &&
        id <> :id
      LIMIT 1");

    $stmt->execute([ 
      'name'     => $name,
      'country'  => $country,
      'id'       => $editId
    ]);

    if($stmt->rowCount() != 0){
      $nameError = '<span style="color: rgb(255,0,0);">** State is already taken</span>';
      $countryError = '<span style="color: rgb(255,0,0);">** Country is already taken</span>';
      $error = true;
    }

      if(!$error){

      $row = [
        'name'          => $name,
        'description'   => $description,
        'country'       => $country
      ];

      $sql = "
        INSERT 
         INTO `state`
          (`name`, `description`, `country_id`)
        VALUES 
        (:name , :description , :country)";
        
      $statement = $dbh->prepare($sql);
      $status    = $statement->execute($row);
      $message   = '<span style="color: rgb(0,255,0);">State Added Successfully</span>';
    }
    else{
      $message = '<span style="color: rgb(255,0,0);"> No State Added</sapn>';
    }
  }
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

  include("include/header.php");
  include("include/sidebar.php");
?>