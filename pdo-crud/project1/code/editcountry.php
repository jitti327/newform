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

  $nameError = "";

  $descriptionError = "";
  
try{

  if(isset($_REQUEST['update'])){
    
    #Validation Starts Here

    $name         = $_REQUEST['name'];
    $description  = $_REQUEST['description'];

    $error = false;

    if(empty($name)){
      $nameError = '<span style="color: rgb(255,0,0);">** Country Name is required</span>';
      $error = true;
    }

    if(empty($description)){
      $descriptionError = '<span style="color: rgb(255,0,0);">** Description is required</span>';
      $error = true;
    }

    # Finding if the email is not taken by other

    $stmt = $dbh->prepare( "
      SELECT 
        * 
      FROM
        `country` 
      WHERE 
        name = :name
        && 
        id <> :id
      LIMIT 1");

    $stmt->execute([
      'name' => $name,
      'id'   => $editId
    ]);

    if($stmt->rowCount() != 0){
      $message  = '<span style="color: rgb(255,0,0);">** Sorry Country is already added<span>';
      $error = true;
    }

    # There is no error in the validation and data
    # Hence saving the data
    if(!$error){

      $data = [
        'id'                => $editId,
        'name'              => $name,
        'description'       => $description,
      ];

      $sql = "
        UPDATE 
          `country` 
        SET 
          `name`= :name,
          `description`= :description
        WHERE 
          `id` =:id";

    // echo '<pre>';
    //   print_r($name);
    // echo '</pre>';
    
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
  $edit = $dbh->prepare( "SELECT * FROM `country` WHERE id= :id");
  $edit-> execute($row);
  $show = $edit->fetch();

  include("include/header.php");
  include("include/sidebar.php");
}
catch (pdoException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  header("Location: 500.php");
  die();
}