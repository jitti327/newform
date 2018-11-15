<?php
  
  include("function.php");

  $message = "";

  $editId = "";

  $nameError = "";

  $descriptionError = "";

  try{
    if(isset($_POST['add'])){
      
      #Validation Starts Here

      $name         = $_POST['name'];
      $description  = $_POST['description'];

      $error = false;

      if(empty($name)){
        $nameError        = requiredValidation();
        $error            = true;
      }

      if(empty($description)){
        $descriptionError = requiredValidation();
        $error            = true;
      }

    # Finding if the email is not taken by other

    $stmt = $dbh->prepare( "
      SELECT 
        * 
      FROM
        `country` 
      WHERE 
        name = :name
        && 
        id <> :id
      LIMIT 1");

    $stmt->execute([
      'name' => $name,
      'id'   => $editId
    ]);

    if($stmt->rowCount() != 0){
      $message  = '<span style="color: rgb(255,0,0);">** Sorry Country is already added<span>';
      $error = true;
    }

      if(!$error){

      $row = [
        'name'       => $name,
        'description' => $description
      ];

      $sql = "
        INSERT 
         INTO `country`
          (`name`, `description`)
        VALUES 
        (:name , :description)";
        
      $statement = $dbh->prepare($sql);
      $status    = $statement->execute($row);
      $message   = '<span style="color: rgb(0,255,0);">Country Added Successfully</span>';
    }
    else{
      $message = '<span style="color: rgb(255,0,0);"> No Class Added</sapn>';
    }
  }
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

  include("include/header.php");
  include("include/sidebar.php");
?>