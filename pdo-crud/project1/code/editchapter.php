<?php 
  
  # Does this ID exists ??
  # If not through 404 page error

  if(empty( $_GET['id'] )){
    // We need to go to 404 page
    header("Location: 404.php");
    die();
  }

  $editId = $_GET['id'];

  $message = "";

  $chapterTitleError = "";

  $chapterDescriptionError = "";

  $chapternumError = "";

  $SubjectError = "";

  $chapterupdatedError = "";
  
 try{

  if(isset($_POST['updatechapter'])){
    
    #Validation Starts Here

    $chapterTitle         = $_POST['chapterTitle'];
    $chapterDescription   = $_POST['chapterDescription'];
    $chapternum           = $_POST['chapternum'];
    $chaptertime          = $_POST['class'];
    $chapterupdated       = $_POST['chapterupdated'];

    $error = false;

    if(empty($chapterTitle)){
      $chapterTitleError = '<span style="color: rgb(255,0,0);">** Chapter Title is required</span>';
      $error = true;
    }

    if(empty($chapterDescription)){
      $chapterDescriptionError = '<span style="color: rgb(255,0,0);">** Chapter Description is required</span>';
      $error = true;
    }

    if(empty($chapternum)){
      $chapternumError = '<span style="color: rgb(255,0,0);">** Number Assigned to Chapter is required</span>';
      $error = true;
    }

    if(empty($chaptertime)){
      $chaptertimeError = '<span style="color: rgb(255,0,0);">** Chapter Time is required</span>';
      $error = true;
    }

    if(empty($chapterupdated)){
      $chapterupdateddError = '<span style="color: rgb(255,0,0);">** Chapter Updation Date is required</span>';
      $error = true;
    }

    // # Finding if the chapternum is not taken by other

    // $stmt = $dbh->prepare( "
    //   SELECT 
    //     * 
    //   FROM
    //     `subject` 
    //   WHERE 
    //     id <> :id
    //   LIMIT 1");

    // $stmt->execute([ 
    //   'id'         => $editId
    // ]);

    // if($stmt->rowCount() != 0){
    //   $chapternumError = '<span style="color: rgb(255,0,0);">** Class is already taken</span>';
    //   $error = true;
    // }

    # There is no error in the validation and data
    # Hence saving the data
    if(!$error){

      $data = [
        'id'                  => $editId,
        'chapterTitle'         => $chapterTitle,
        'chapterDescription'  => $chapterDescription,
        'chapternum'          => $chapternum,
        'chaptertime'         => $chaptertime,
        'chapterupdated'       => $chapterupdated
      ];

      $sql = "
        UPDATE 
          `chapter` 
        SET 
          `chapterTitle`= :chapterTitle,
          `chapterDescription`= :chapterDescription,
          `chapterNumber_assigned`= :chapternum,
          `chapterSubject`= :chaptertime,
          -- `Class`= :subject,
          `chapterUpdated_on`= :chapterupdated
        WHERE 
          `id` =:id";
    
      $stmt   = $dbh->prepare($sql);
      $status = $stmt->execute($data);

      if($status !== false){
        $message = '<span style="color: rgb(0,255,0);">Update sucessfully</span>';
      }
      else{
        $message = '<span style="color: rgb(255,0,0);">** Not Updated</span>';
      }      
    }
  }

  $row = [
    'id' => $editId
  ];

  $edit = $dbh->prepare( "SELECT * FROM `chapter` WHERE id= :id");
  $edit-> execute($row);
  $show = $edit->fetch();
}
catch (pdoException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  header("Location: 500.php");
  die();
} 


  include("include/header.php");
  include("include/sidebar.php");