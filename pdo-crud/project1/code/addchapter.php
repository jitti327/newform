<?php
  $message = "";

  $editId = "";

  $chapterTitleError = "";

  $chapterDescriptionError = "";

  $chapternumError = "";

  $SubjectError = "";

  $chaptercreatedError = "";

  try{
    if(isset($_POST['addchapter'])){
      
      #Validation Starts Here

      $chapterTitle         = $_POST['chapterTitle'];
      $chapterDescription   = $_POST['chapterDescription'];
      $chapternum           = $_POST['chapternum'];
      $subject              = $_POST['subject'];
      $chaptercreated       = $_POST['chaptercreated'];

      $error = false;

      if(empty($chapterTitle)){
        $chapterTitleError = '<span style="color: rgb(255,0,0);">** Chapter Title is required</span>';
        $error = true;
      }

      if(empty($chapterDescription)){
        $chapterDescriptionError = '<span style="color: rgb(255,0,0);">** Description is required</span>';
        $error = true;
      }

      if(empty($chapternum)){
        $chapternumError = '<span style="color: rgb(255,0,0);">** Chapter Numbers are required</span>';
        $error = true;
      }

      if(empty($subject)){
        $subjectError = '<span style="color: rgb(255,0,0);">** Subject is required</span>';
        $error = true;
      }      

      if(empty($chaptercreated)){
        $chaptercreatedError = '<span style="color: rgb(255,0,0);">** Chapter Creatioon Date is required</span>';
        $error = true;
      }

    # Finding if the email is not taken by other

      $stmt = $dbh->prepare( "
        SELECT 
          * 
        FROM
          `chapter` 
        WHERE 
          chapterSubject= :subject 
          && 
          id <> :id
        LIMIT 1");

      $stmt->execute([ 
        'subject' => $subject,
        'id'    => $editId
      ]);

      if($stmt->rowCount() != 0){
        $classError = '<span style="color: rgb(255,0,0);">** Class is already taken</span>';
        $error = true;
      }

      if(!$error){

      $row = [
        'chapterTitle'        => $chapterTitle,
        'chapterDescription'  => $chapterDescription,
        'chapternum'          => $chapternum,
        'subject'             => $subject,
        'chaptercreated'      => $chaptercreated
      ];

      $sql = "
        INSERT 
         INTO `chapter`
          (`chapterTitle`, `chapterDescription`, `chapterNumber_assigned`, `chapterSubject` , `chapterCreated_on`)
        VALUES 
        (:chapterTitle , :chapterDescription , :chapternum , :subject , :chaptercreated )";
        
      $statement = $dbh->prepare($sql);
      $status    = $statement->execute($row);
      $message   = '<span style="color: rgb(0,255,0);">Chapter Added Successfully</span>';
    }
    else{
      $message = '<span style="color: rgb(255,0,0);"> No Chapter Added</sapn>';
    }
  }
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

  include("include/header.php");
  include("include/sidebar.php");
?>