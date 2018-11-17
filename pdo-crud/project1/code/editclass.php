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

  $titleError = "";

  $descriptionError = "";

  $durationError = "";
  
 try{

  if(isset($_POST['update'])){
    
    #Validation Starts Here

    $title        = $_POST['title'];
    $description  = $_POST['description'];
    $duration     = $_POST['duration'];

    $error = false;

    if(empty($title)){
      $titleError = requiredValidation();
      $error = true;
    }

    if(empty($description)){
      $descriptionError = requiredValidation();
      $error = true;
    }

    if(empty($duration)){
      $durationError = requiredValidation();
      $error = true;
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

    # There is no error in the validation and data
    # Hence saving the data
    if(!$error){

      $data = [
        'id'           => $editId,
        'title'        => $title,
        'description'  => $description,
        'duration'     => $duration
      ];

      $sql = "
        UPDATE 
          `class` 
        SET 
          `title`= :title,
          `description`= :description,
          `duration`= :duration
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