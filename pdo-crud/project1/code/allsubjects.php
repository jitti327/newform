<?php 
  
  try{
    include('config/pagination.php');

  // This custom function is used to delete of the multiple records
    if( $multiAction == 'deleted' ){
      foreach( $user as $id ){
        mayMultipleDelete( 'subject' , $id); 
      }
    }   
  // This method is used to delete the row in database using PDO 
    if( $task == 'delete' ){
      $id = $_REQUEST['id'];
      mayMultipleDelete( 'subject' , $id); 
    }
  // This method is used to search of the value form database

    if(!empty($search)){
      $queryPart   = "
        WHERE
          `title` LIKE :search
        OR
          `description` LIKE :search
        OR
          `practical_number` LIKE :search
        OR
          `theoretical_number` LIKE :search
        OR
          `duration` LIKE :search
        OR
          `class_id` LIKE :search
        OR
          `created_on`  LIKE :search
        OR
          `updated_on`  LIKE :search
      ";
    }

    if(!empty($orderBy)){
      $orderPart = " ORDER BY `$orderBy` $order ";
    }  

    $query = "
      SELECT
      SQL_CALC_FOUND_ROWS
       `subject`.*,
       `class`.title as cTitle
      FROM
       `subject`
      INNER JOIN 
        `class`
      ON 
        `subject`.class_id = `class`.id
      {$queryPart}
      {$orderPart}
      LIMIT :offset , :postPerPage 
    ";

    $record = $dbh->prepare($query);
    $record->bindValue(':offset', $offset, PDO::PARAM_INT);
    $record->bindValue(':postPerPage', $postPerPage, PDO::PARAM_INT);

    if(!empty($search)){
      $record->bindValue(':search', '%'.$search.'%');
    }

    $record-> execute();

    $statement  = $dbh->query('SELECT FOUND_ROWS()');
    $response   = $statement->fetchColumn();
    $totalpages = ceil( $response / $postPerPage );

    $result = $record->fetchAll();

    if($totalpages != 0 &&  $currentPage > $totalpages) {

      parse_str($_SERVER['QUERY_STRING'], $queryArray); 
      $queryArray['page'] = $totalpages;

      $queryString =  http_build_query($queryArray);
      header("Location: ?".$queryString);
    }
    include("include/header.php");
    include("include/sidebar.php");
  }
  catch(PDOException $e){
      echo "Opps !!! Sorry for inconvinence Please Try after some time";
      echo $e->getMessage();
  }
?>