<?php
  include_once('db/connection.php');
  if(!empty($_POST["CountryId"])){
    $query = "SELECT * FROM `state` WHERE `country_id` = ".$_REQUEST['CountryId'];
    $state = $dbh->query($query);
    $fetch = $state->fetchAll();
    echo "<option>-Select State-</option>";
    foreach($fetch as $val){
      echo '<option value="'.$val['id'].'">'.$val['name'].'</option>';
    }
  }
  if(!empty($_POST["StateId"])){
    $query1    = "SELECT * FROM `district` WHERE `state_id` = ".$_REQUEST['StateId'];
    $district = $dbh->prepare($query1);
    $district->execute();
    $show     = $district->fetchAll();
    echo "<option>-Select District-</option>";
    foreach($show as $val){
      echo '<option value="'.$val['id'].'">'.$val['name'].'</option>';
    }
  }    
?>