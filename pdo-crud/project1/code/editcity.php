<?php

  if(empty( $_REQUEST['id'] )){
    // We need to go to 404 page
    header("Location: 404.php");
    die();
  }

  $message = "";

  $editId = $_REQUEST['id'];

  $nameError = "";

  $descriptionError = "";

  $stateError = "";
  
  try{

    if(isset($_REQUEST['update'])){
      
      #Validation Starts Here

      $name          = $_POST['name'];
      $description   = $_POST['description'];
      $state         = $_POST['state'];

      $error = false;

      if(empty($name)){
        $nameError = '<span style="color: rgb(255,0,0);">** City Name is required</span>';
        $error = true;
      }

      if(empty($description)){
        $descriptionError = '<span style="color: rgb(255,0,0);">** Description is required</span>';
        $error = true;
      }

      if(empty($state)){
        $stateError = '<span style="color: rgb(255,0,0);">** Please Select the State</span>';
        $error = true;
      }

    # Finding if the email is not taken by other

      $stmt = $dbh->prepare( "
        SELECT 
          * 
        FROM
          `city` 
        WHERE 
          name= :name 
          &&  
          state_id= :state 
          &&
          id <> :id
        LIMIT 1");

      $stmt->execute([ 
        'name'     => $name,
        'state'    => $state,
        'id'       => $editId
      ]);

      // There is no error in the validation and data
      // Hence saving the data
      if(!$error){
        $data = [
          'id'           => $editId,
          'name'         => $name,
          'description'  => $description,
          'state'      => $state
        ];

        $sql = "
          UPDATE 
            `city` 
          SET 
            `name`              = :name,
            `description`       = :description,
            `state_id`          = :state
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

    $edit = $dbh->prepare( "SELECT * FROM `city` WHERE id= :id");
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