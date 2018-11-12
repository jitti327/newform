<?php
  $message = "";

  $editId = "";

  $classTitleError = "";

  $classDescriptionError = "";

  $classDurationError = "";

  $classcreatedError = "";

  try{
    if(isset($_POST['addclass'])){
      
      #Validation Starts Here

      $classTitle         = $_POST['classTitle'];
      $classDescription   = $_POST['classDescription'];
      $classDuration      = $_POST['classDuration'];
      $classcreated       = $_POST['classcreated'];

      $error = false;

      if(empty($classTitle)){
        $classTitleError = '<span style="color: rgb(255,0,0);">**Class Title is required</span>';
        $error = true;
      }

      if(empty($classDescription)){
        $classDescriptionError = '<span style="color: rgb(255,0,0);">**Description is required</span>';
        $error = true;
      }

      if(empty($classDuration)){
        $classDurationError = '<span style="color: rgb(255,0,0);">**Duration is required</span>';
        $error = true;
      }

      if(empty($classcreated)){
        $classDurationError = '<span style="color: rgb(255,0,0);">**Duration is required</span>';
        $error = true;
      }

    # Finding if the email is not taken by other

    $stmt = $dbh->prepare( "
      SELECT 
        * 
      FROM
        `class` 
      WHERE 
        classTitle = :classTitle
        && 
        id <> :id
      LIMIT 1");

    $stmt->execute([
      'classTitle' => $classTitle,
      'id'         => $editId
    ]);

    if($stmt->rowCount() != 0){
      $message  = '<span style="color: rgb(255,0,0);">** Sorry Class is already added<span>';
      $error = true;
    }

      if(!$error){

      $row = [
        'classTitle'       => $classTitle,
        'classDescription' => $classDescription,
        'classDuration'    => $classDuration,
        'classcreated'     => $classcreated
      ];

      $sql = "
        INSERT 
         INTO `class`
          (`classTitle`, `classDescription`, `classDuration`, `clasCreated_on`)
        VALUES 
        (:classTitle , :classDescription , :classDuration , :classcreated)";
        
      $statement = $dbh->prepare($sql);
      $status    = $statement->execute($row);
      $message   = '<span style="color: rgb(0,255,0);">Class Added Successfully</span>';
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