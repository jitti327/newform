<?php 
  
  include("function.php");
  
  # Does this ID exists ??
  # If not through 404 page error

  if(empty( $_REQUEST['id'] )){
    // We need to go to 404 page
    header("Location: 404.php");
    die();
  }

  $editId = $_REQUEST['id'];

  $message = "";

  $titleError = "";

  $descriptionError = "";

  $practical_numberError = "";

  $theoretical_numberError = "";

  $durationError = "";

  $class_idError = "";
  
 try{

  if(isset($_REQUEST['update'])){
    
    #Validation Starts Here

    $title                = $_POST['title'];
    $description          = $_POST['description'];
    $practical_number     = $_POST['practical_number'];
    $theoretical_number   = $_POST['theoretical_number'];
    $duration             = $_POST['duration'];
    $class_id             = $_POST['class_id'];

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

    $query = "SELECT * FROM `subject` WHERE class_id = :class_id AND id = :id";
    $stmt = $dbh->prepare( $query );

    $stmt->execute([ 
      'class_id' => $class_id,
      'id'       => $editId
    ]);

    if($stmt->rowCount() != 0){
      $class_idError = '<span style="color: rgb(255,0,0);">** Class is already taken</span>';
      $error = true;
    }

    // There is no error in the validation and data
    // Hence saving the data
    if(!$error){
      $data = [
        'id'                  => $editId,
        'title'               => $title,
        'description'         => $description,
        'practical_number'    => $practical_number,
        'theoretical_number'  => $theoretical_number,
        'duration'            => $duration,
        'class_id'            => $class_id
      ];

      $sql = "
        UPDATE 
          `subject` 
        SET 
          `title`              = :title,
          `description`        = :description,
          `practical_number`   = :practical_number,
          `theoretical_number` = :theoretical_number,
          `duration`           = :duration,
          `class_id`           = :class_id
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
  
  include("include/header.php");
  include("include/sidebar.php");

}
catch (pdoException $e) {
  echo 'Connection failed: ' . $e->getMessage();
 // header("Location: 500.php");
  //die();
}