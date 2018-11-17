<?php
  
  include("function.php");

  $message = "";

  $editId = "";

  $titleError = "";

  $descriptionError = "";

  $number_assignedError = "";

  $subject_idError = "";

  try{
    if(isset($_POST['add'])){
      
      #Validation Starts Here

      $title             = $_POST['title'];
      $description       = $_POST['description'];
      $number_assigned   = $_POST['number_assigned'];
      $subject_id        = $_POST['subject_id'];

      $error = false;

      if(empty($title)){
        $titleError = requiredValidation();
        $error = true;
      }

      if(empty($description)){
        $descriptionError = requiredValidation();
        $error = true;
      }

      if(empty($number_assigned)){
        $number_assignedError = requiredValidation();
        $error = true;
      }

      if(empty($subject_id)){
        $subject_idError = requiredValidation();
        $error = true;
      }

    # Finding if the email is not taken by other

      $stmt = $dbh->prepare( "
        SELECT 
          * 
        FROM
          `chapter` 
        WHERE 
          subject_id= :subject_id 
          && 
          id <> :id
        LIMIT 1");

      $stmt->execute([ 
        'subject_id' => $subject_id,
        'id'    => $editId
      ]);

      if($stmt->rowCount() != 0){
        $subject_idError = '<span style="color: rgb(255,0,0);">** Subject is already taken</span>';
        $error = true;
      }

      if(!$error){

      $row = [
        'title'           => $title,
        'description'     => $description,
        'number_assigned' => $number_assigned,
        'subject_id'      => $subject_id
      ];

      $sql = "
        INSERT 
         INTO `chapter`
          (`title`, `description`, `number_assigned`, `subject_id`)
        VALUES 
        (:title , :description , :number_assigned , :subject_id)";
        
      $statement = $dbh->prepare($sql);
      $status    = $statement->execute($row);
      $message   = '<span style="color: rgb(0,255,0);">Chapter Added Successfully</span>';
    }
    else{
      $message = '<span style="color: rgb(255,0,0);"> No Chapter Added</sapn>';
    }
  }

  include("include/header.php");
  include("include/sidebar.php");
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
?>