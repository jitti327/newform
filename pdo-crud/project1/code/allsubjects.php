<?php 
  #Query Running for fetching data from database

    if(isset($_REQUEST['multiDelete']) && $_REQUEST['multiDelete'] == 'deleted'){
      // echo '<pre>';
      //   print_r($_REQUEST['userDlt']);
      // echo '</pre>';
      foreach( $_REQUEST['userDlt'] as $id){
        $query = "DELETE FROM `subject` WHERE id = :id ";
        $deleteQuery = $dbh->prepare($query);
        $response    = $deleteQuery->execute(['id' => $id]);
        if($response !== false){
          echo "Records are deleted successfully";
        }else{
          echo "Your records are not deleted";
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
        `subjectTitle` LIKE :search
      OR
        `subjectDescription` LIKE :search
      OR
        `subjectPracticalnumber` LIKE :search
      OR
        `subjectTheoreticalnumber` LIKE :search
      OR
        `subjectExaminationTime` LIKE :search
      OR
        `class` LIKE :search
      OR
        `subjectCreated_on`  LIKE :search
      OR
        `subjectUpdated_on`  LIKE :search
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
     `subject`
    {$queryPart}
    {$orderPart}
    LIMIT :offset , :postPerPage 
  ";

  $record = $dbh->prepare($query);
  $record->bindValue(':offset', $offset, PDO::PARAM_INT);
  $record->bindValue(':postPerPage', $postPerPage, PDO::PARAM_INT);

  if(!empty($search)){
    $record->bindValue(':search', '%'.$search.'% ');
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
?>