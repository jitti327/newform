<?php
  $message = "";

  $editId = "";

  $subectTitleError = "";

  $subjectDescriptionError = "";

  $subjectpracticalnumError = "";

  $subjectnumError = "";

  $subjecttimeError = "";

  $classError = "";

  try{
    if(isset($_POST['addsubject'])){
      
      #Validation Starts Here

      $subjectTitle         = $_POST['subjectTitle'];
      $subjectDescription   = $_POST['subjectDescription'];
      $subjectpracticalnum  = $_POST['subjectpracticalnum'];
      $subjectnum           = $_POST['subjectnum'];
      $subjecttime          = $_POST['subjecttime'];
      $subjecttime          = $_POST['subjecttime'];

      $error = false;

      if(empty($subjectTitle)){
        $subjectTitleError = '<span style="color: rgb(255,0,0);">** Subject Title is required</span>';
        $error = true;
      }

      if(empty($subjectDescription)){
        $subjectDescriptionError = '<span style="color: rgb(255,0,0);">** Description is required</span>';
        $error = true;
      }

      if(empty($subjectpracticalnum)){
        $subjectpracticalnumError = '<span style="color: rgb(255,0,0);">** Subject Practical Numbers are required</span>';
        $error = true;
      }

      if(empty($subjectnum)){
        $subjectnumError = '<span style="color: rgb(255,0,0);">** Subject Numbers are required</span>';
        $error = true;
      }

      if(empty($subjecttime)){
        $subjecttimeError = '<span style="color: rgb(255,0,0);">** Examination Time Duration is required</span>';
        $error = true;
      }

      if(empty($class)){
        $classError = '<span style="color: rgb(255,0,0);">** Class is required</span>';
        $error = true;
      }



    # Finding if the email is not taken by other

    $stmt = $dbh->prepare( "
      SELECT 
        * 
      FROM
        `subject` 
      WHERE 
        class = :class
        && 
        id <> :id
      LIMIT 1");

    $stmt->execute([
      'class' => $class,
      'id'    => $editId
    ]);

    if($stmt->rowCount() != 0){
      $message  = '<span style="color: rgb(255,0,0);">** Sorry Class is already added<span>';
      $error = true;
    }

      if(!$error){

      $row = [
        'subjectTitle'        => $subjectTitle,
        'subjectDescription'  => $subjectDescription,
        'subjectpracticalnum' => $subjectpracticalnum,
        'subjectnum'          => $subjectnum,
        'subjecttime'         => $subjecttime,
        'class'               => $class
      ];

      $sql = "
        INSERT 
         INTO `subject`
          (`subjectTitle`, `subjectDescription`, `subjectPracticalnumber`, `subjectTheoreticalnumber`, `subjectExaminationTime`, `Class`)
        VALUES 
        (:subjectTitle , :subjectDescription , :subjectpracticalnum , :subjectnum , :subjecttime , :class)";
        
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