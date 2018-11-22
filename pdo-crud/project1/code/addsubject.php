<?php
  
  include("function.php");

  $message = "";

  $editId = "";

  $titleError = "";

  $descriptionError = "";

  $practical_numberError = "";

  $theoretical_numberError = "";

  $durationError = "";

  $class_idError = "";

  try{
    if(isset($_POST['add'])){
      
      #Validation Starts Here

      $title               = $_POST['title'];
      $description         = $_POST['description'];
      $practical_number    = $_POST['practical_number'];
      $theoretical_number  = $_POST['theoretical_number'];
      $duration            = $_POST['duration'];
      $class_id            = $_POST['class_id'];

      $error = false;

      if(empty($title)){
        $titleError = requiredValidation();
        $error = true;
      }

      if(empty($description)){
        $descriptionError = requiredValidation();
        $error = true;
      }

      if(empty($practical_number)){
        $practical_numberError = requiredValidation();
        $error = true;
      }

      if(empty($theoretical_number)){
        $theoretical_numberError = requiredValidation();
        $error = true;
      }

      if(empty($duration)){
        $durationError = requiredValidation();
        $error = true;
      }

      if(empty($class_id)){
        $class_idError = requiredValidation();
        $error = true;
      }

  # Finding if the email is not taken by other

    $stmt = $dbh->prepare( "
      SELECT 
        * 
      FROM
        `subject` 
      WHERE 
        class_id= :class_id 
        && 
        title = :title 
        && 
        id <> :id
      LIMIT 1");

    $stmt->execute([ 
      'class_id'  => $class_id,
      'title'     => $title,
      'id'        => $editId
    ]);

    if($stmt->rowCount() != 0){
      $titleError = '<span style="color: rgb(255,0,0);">** Subject is already taken</span>';
      $class_idError = '<span style="color: rgb(255,0,0);">** Class is already taken</span>';
      $error = true;
    }

      if(!$error){

      $row = [
        'title'               => $title,
        'description'         => $description,
        'practical_number'    => $practical_number,
        'theoretical_number'  => $theoretical_number,
        'duration'            => $duration,
        'class_id'            => $class_id
      ];

      $sql = "
        INSERT 
         INTO `subject`
          (`title`, `description`, `practical_number`, `theoretical_number`, `duration`, `class_id`)
        VALUES 
        (:title , :description , :practical_number , :theoretical_number , :duration , :class_id)";
        
      $statement = $dbh->prepare($sql);
      $status    = $statement->execute($row);
      $message   = '<span style="color: rgb(0,255,0);">Subject Added Successfully</span>';
    }
    else{
      $message = '<span style="color: rgb(255,0,0);"> No Subject Added</sapn>';
    }
  }

  include("include/header.php");
  include("include/sidebar.php");
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
?>