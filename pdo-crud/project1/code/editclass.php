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

  $classTitleError = "";

  $classDescriptionError = "";

  $classDurationError = "";

  $classupdatedError = "";
  
 try{

  if(isset($_POST['update'])){
    
    #Validation Starts Here

    $classTitle = $_POST['classTitle'];
    $classDescription  = $_POST['classDescription'];
    $classDuration  = $_POST['classDuration'];
    $classupdated     = $_POST['classupdated'];

    $error = false;

    if(empty($classTitle)){
      $classTitleError = '<span style="color: rgb(255,0,0);">** Class Title is required</span>';
      $error = true;
    }

    if(empty($classDescription)){
      $classDescriptionError = '<span style="color: rgb(255,0,0);">** Class Description is required</span>';
      $error = true;
    }

    if(empty($classDuration)){
      $classDurationError = '<span style="color: rgb(255,0,0);">** Duration is required</span>';
      $error = true;
    }

    if(empty($classupdated)){
      $classupdatedError = '<span style="color: rgb(255,0,0);">** Class Updation Date is required</span>';
      $error = true;
    }

    // # Finding if the classupdated is not taken by other

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
    //   $classupdatedError = '<span style="color: rgb(255,0,0);">** Class is already taken</span>';
    //   $error = true;
    // }

    # There is no error in the validation and data
    # Hence saving the data
    if(!$error){

      $data = [
        'id'                => $editId,
        'classTitle'        => $classTitle,
        'classDescription'  => $classDescription,
        'classDuration'     => $classDuration,
        'classupdated'      => $classupdated
      ];

      $sql = "
        UPDATE 
          `class` 
        SET 
          `classTitle`= :classTitle,
          `classDescription`= :classDescription,
          `classDuration`= :classDuration,
          `classUpdated_on`= :classupdated
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

  $edit = $dbh->prepare( "SELECT * FROM `class` WHERE id= :id");
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