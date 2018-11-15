<?php

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
?>