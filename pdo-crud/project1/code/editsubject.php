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

  $subjectTitleError = "";

  $subjectDescriptionError = "";

  $subjectpracticalnumError = "";

  $subjectnumError = "";

  $subjecttimeError = "";

  $classError = "";

  $subjectupdatedError = "";
  
 try{

  if(isset($_POST['updatesubject'])){
    
    #Validation Starts Here

    $subjectTitle          = $_POST['subjectTitle'];
    $subjectDescription   = $_POST['subjectDescription'];
    $subjectpracticalnum  = $_POST['subjectpracticalnum'];
    $subjectnum           = $_POST['subjectnum'];
    $subjecttime          = $_POST['subjecttime'];
    $subjectupdated       = $_POST['subjectupdated'];

    $error = false;

    if(empty($subjectTitle)){
      $subjectTitleError = '<span style="color: rgb(255,0,0);">** Subject Title is required</span>';
      $error = true;
    }

    if(empty($subjectDescription)){
      $subjectDescriptionError = '<span style="color: rgb(255,0,0);">** Subject Description is required</span>';
      $error = true;
    }

    if(empty($subjectpracticalnum)){
      $subjectpracticalnumError = '<span style="color: rgb(255,0,0);">** Practical Number is required</span>';
      $error = true;
    }

    if(empty($subjectnum)){
      $subjectnumError = '<span style="color: rgb(255,0,0);">** Subject Theoretical Number is required</span>';
      $error = true;
    }

    if(empty($subjecttime)){
      $subjecttimeError = '<span style="color: rgb(255,0,0);">** Subject Time is required</span>';
      $error = true;
    }

    if(empty($subjectupdated)){
      $subjectupdateddError = '<span style="color: rgb(255,0,0);">** Subject Updation Date is required</span>';
      $error = true;
    }

    // # Finding if the subjectnum is not taken by other

    // $stmt = $dbh->prepare( "
    //   SELECT 
    //     * 
    //   FROM
    //     `class` 
    //   WHERE 
    //     id <> :id
    //   LIMIT 1");

    // $stmt->execute([ 
    //   'id'         => $editId
    // ]);

    // if($stmt->rowCount() != 0){
    //   $subjectnumError = '<span style="color: rgb(255,0,0);">** Class is already taken</span>';
    //   $error = true;
    // }

    # There is no error in the validation and data
    # Hence saving the data
    if(!$error){

      $data = [
        'id'                  => $editId,
        'subjectTitle'         => $subjectTitle,
        'subjectDescription'  => $subjectDescription,
        'subjectpracticalnum' => $subjectpracticalnum,
        'subjectnum'          => $subjectnum,
        'subjecttime'         => $subjecttime,
        'subjectupdated'       => $subjectupdated
      ];

      $sql = "
        UPDATE 
          `subject` 
        SET 
          `subjectTitle`= :subjectTitle,
          `subjectDescription`= :subjectDescription,
          `subjectPracticalnumber`= :subjectpracticalnum,
          `subjectTheoreticalnumber`= :subjectnum,
          `subjectExaminationTime`= :subjecttime,
          -- `Class`= :class,
          `subjectUpdated_on`= :subjectupdated
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

  $edit = $dbh->prepare( "SELECT * FROM `subject` WHERE id= :id");
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