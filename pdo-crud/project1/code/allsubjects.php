<?php 
  #Query Running for fetching data from database

  function mayMultipleDelete($tabelName){

    if(isset($_REQUEST['multiDelete']) && $_REQUEST['multiDelete'] == 'deleted'){
      // echo '<pre>';
      //   print_r($_REQUEST['userDlt']);
      // echo '</pre>';
      foreach( $_REQUEST['userDlt'] as $id){
        $query = "DELETE FROM `{$tabelName}` WHERE id = :id ";
        $deleteQuery = $dbh->prepare($query);
        $response    = $deleteQuery->execute(['id' => $id]);
        if($response !== false){
          echo "Records are deleted successfully";
        }else{
          echo "Your records are not deleted";
        }
      }
    }

  }

  /*
  *
  * Function Name : multipleDelete
  * Parameter     : $table - String - Name of the table
  *               : $ids   - Array  - Contains the ids
  * Return        : Returns ture if entries are deleted
  *               : Returns false if entries are not deleted
  */

  function multipleDelete($table, $ids){

    return true; // In case delete is done
    return false; // In case there is error

  }

  mayMultipleDelete('`subject`');

  # 
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