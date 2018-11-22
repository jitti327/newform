<?php
  
  include("code/function.php");

  $message = "";

  $editId = "";

  $titleError = "";

  $descriptionError = "";

  $durationError = "";

  try{
    if(isset($_POST['add'])){
      
      #Validation Starts Here

      $title         = $_POST['title'];
      $description   = $_POST['description'];
      $duration      = $_POST['duration'];

      $error = false;

      if(empty($title)){
        $titleError        = requiredValidation();
        $error             = true;
      }

      if(empty($description)){
        $descriptionError = requiredValidation();
        $error            = true;
      }

      if(empty($duration)){
        $durationError    = requiredValidation();
        $error            = true;
      }

    # Finding if the email is not taken by other

    $stmt = $dbh->prepare( "
      SELECT 
        * 
      FROM
        `class` 
      WHERE 
        title = :title
        && 
        id <> :id
      LIMIT 1");

    $stmt->execute([
      'title' => $title,
      'id'    => $editId
    ]);

    if($stmt->rowCount() != 0){
      $message  = '<span style="color: rgb(255,0,0);">** Sorry Class is already added<span>';
      $error = true;
    }

      if(!$error){

      $row = [
        'title'       => $title,
        'description' => $description,
        'duration'    => $duration
      ];

      $sql = "
        INSERT 
         INTO `class`
          (`title`, `description`, `duration`)
        VALUES 
        (:title , :description , :duration )";
        
      $statement = $dbh->prepare($sql);
      $status    = $statement->execute($row);
      $message   = '<span style="color: rgb(0,255,0);">Class Added Successfully</span>';
    }
    else{
      $message = '<span style="color: rgb(255,0,0);"> No Class Added</sapn>';
    }
  } 
  include("include/header.php");
  include("include/sidebar.php");
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
?>