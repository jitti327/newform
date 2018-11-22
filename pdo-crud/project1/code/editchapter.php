<?php
  
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

  $number_assignedError = "";

  $subject_idError = "";
  
 try{

  if(isset($_POST['update'])){
    
    #Validation Starts Here

    $title                = $_POST['title'];
    $description          = $_POST['description'];
    $number_assigned      = $_POST['number_assigned'];
    $subject_id           = $_POST['subject_id'];

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
        'id'         => $editId
      ]);

      if($stmt->rowCount() != 0){
        $sunject_idError = '<span style="color: rgb(255,0,0);">** Subject is already taken</span>';
        $error = true;
      }

    # There is no error in the validation and data
    # Hence saving the data
    if(!$error){

      $data = [
        'id'                   => $editId,
        'title'                => $title,
        'description'          => $description,
        'number_assigned'      => $number_assigned,
        'subject_id'           => $subject_id
      ];

      $sql = "
        UPDATE 
          `chapter` 
        SET 
          `title`= :title,
          `description`= :description,
          `number_assigned`= :number_assigned,
          `subject_id`= :subject_id
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

  include("include/header.php");
  include("include/sidebar.php");
}
catch (pdoException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  header("Location: <?php echo URL; ?>500.php");
  die();
}