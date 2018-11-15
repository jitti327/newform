<?php 

  multipleDelete('subject' , 'multiDelete' , 'userDlt'); // This is used to delete multiple data
 
  include('config/pagination.php');

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
        `Class` LIKE :search
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