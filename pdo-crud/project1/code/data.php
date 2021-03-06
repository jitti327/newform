<?php 
  #Query Running for fetching data from database

    if(isset($_REQUEST['multiDelete']) && $_REQUEST['multiDelete'] == 'deleted'){
      // echo '<pre>';
      //   print_r($_REQUEST['userDlt']);
      // echo '</pre>';
      foreach( $_REQUEST['userDlt'] as $id){
        $query = "DELETE FROM `pdo` WHERE id = :id ";
        $deleteQuery = $dbh->prepare($query);
        $response    = $deleteQuery->execute(['id' => $id]);
        if($response !== false){
          echo "Records are deleted successfully";
        }else{
          echo "Your records are not deleted";
        }
      }
    }

  # Following Code is used for Block multiple users

    if(isset($_REQUEST['multiDelete']) && $_REQUEST['multiDelete'] == 'blocked'){
      foreach( $_REQUEST['userDlt'] as $id){
        $query = "UPDATE `pdo` SET `status` = :status WHERE id = :id ";
        //echo $query;
        $blockQuery = $dbh->prepare($query);
        $response   = $blockQuery->execute(['status'=>'Blocked','id' => $id]);
        if($response !== false){
          echo "Users are Blocked successfully";
        }
      }
    }
    # Following Code is used for Unblock multiple users
    
    if(isset($_REQUEST['multiDelete']) && $_REQUEST['multiDelete'] == 'unblocked'){
      foreach( $_REQUEST['userDlt'] as $id){
        $query = "UPDATE `pdo` SET `status` = :status WHERE id = :id ";
        //echo $query;
        $blockQuery = $dbh->prepare($query);
        $response   = $blockQuery->execute(['status'=>'Unblocked','id' => $id]);
        if($response !== false){
          echo "Users are UnBlocked successfully";
        }
      }
    }

  #search parameter
  #pagination parameter

  $search      = isset($_GET['search'])   ? $_GET['search']    : "";
  $page        = isset($_GET['page'])     ? $_GET['page']      : 1;
  $orderBy     = isset($_GET['order-by']) ? $_GET['order-by']  : "";
  $order       = isset($_GET['order'])    ? $_GET['order']     : 'DESC';  

  $postPerPage = 10;

  if(isset($_REQUEST['listing']) && $_REQUEST['listing'] == '25'){
    $postPerPage = 25;
  }
  if(isset($_REQUEST['listing']) && $_REQUEST['listing'] == '50'){
    $postPerPage = 50;
  }
  if(isset($_REQUEST['listing']) && $_REQUEST['listing'] == '100'){
    $postPerPage = 100;
  }

  $currentPage = empty($page) ? 1 : intval( $page );
  $currentPage = max($currentPage, 1);
  // $currentPage--; // Because MYSQL uses 0 index

  $offset      = ( $currentPage - 1) * $postPerPage;
  $queryPart   = "";
  $orderPart   = "";  

  if(!empty($search)){
    $queryPart   = "
      WHERE
        `firstname` LIKE :search
      OR
        `lastname` LIKE :search
      OR
        `email` LIKE :search
      OR
        `username`  LIKE :search
      OR
        `status`  LIKE :search
    ";

  }

  if(!empty($orderBy)){
    $orderPart = " ORDER BY `$orderBy` $order ";
  }  

  $query = "
    SELECT
    SQL_CALC_FOUND_ROWS
     *
    FROM
     `pdo`
    {$queryPart}
    {$orderPart}
    LIMIT :offset , :postPerPage 
  ";

  $record = $dbh->prepare($query);

  // I have used this because
  // PDO was converting the value into string
  $record->bindValue(':offset', $offset, PDO::PARAM_INT);
  $record->bindValue(':postPerPage', $postPerPage, PDO::PARAM_INT);

  if(!empty($search)){
    $record->bindValue(':search', '%'.$search.'% ');
  }

  $record-> execute();
 // $count = $record->rowCount();


  $statement  = $dbh->query('SELECT FOUND_ROWS()');
  $response   = $statement->fetchColumn();
  $totalpages = ceil( $response / $postPerPage );

  $result = $record->fetchAll();

  if($totalpages != 0 &&  $currentPage > $totalpages) {
  
    // This method is convert the Querystring to array using parse_str
    // QUERY_STRING are like url:?searchBar=Rahul&page=1 to 2

    parse_str($_SERVER['QUERY_STRING'], $queryArray); 
    $queryArray['page'] = $totalpages;

    // This method is used to convert the ArrayQuery to stringQuery
    // http_build_query is used to generate url-encoded string from the provided array

    $queryString =  http_build_query($queryArray);
    header("Location: ?".$queryString);
  }

  include("include/header.php");
  include("include/sidebar.php");
?>