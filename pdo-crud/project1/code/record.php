<?php

  #Query Running for fetching data from database

  (!isset($_GET['search'])) ? $_GET['search'] = '' : $_GET['search'];

  if(isset($_GET['locate'])){

    if(empty($_GET['page'])){
      $currentPage = 1;
    }
    else{
      $currentPage = intval($_GET['page']);
    }    

    if($currentPage <= 0 ){
      $currentPage = 1;
    }

    // $currentPage = empty($_GET['page']) ? 1 : intval( $_GET['page'] );
    // $currentPage = max($currentPage, 1);

    $page = $currentPage -1 ;

    $postPerPage = 5;

    $offset = $page * $postPerPage;

    $search = "%".$_GET['search']."%";

    $row    = [
      'search' => '%'.$search.'%'
    ];
    
    $record = $dbh->prepare( "
      SELECT 
      SQL_CALC_FOUND_ROWS
        *
      FROM 
        `pdo` 
      WHERE
        `username` LIKE :search
      OR
        `email`  LIKE :search
    ");
    $record-> execute($row);

    #ref link:-- http://php.net/manual/en/pdostatement.fetchall.php

    #echo "<pre>";

    $statement  = $dbh->query('SELECT FOUND_ROWS()');
    $response   = $statement->fetchColumn();
    $totalpages = ceil( $response / $postPerPage );
    
    #print("Fetch all of the remaining rows in the result set:\n");

    $result = $record;
  }
  else{  

    # Pagination coding Start here..

    $currentPage = empty($_GET['page']) ? 1 : intval( $_GET['page'] );
    $currentPage = max($currentPage, 1);

    $page = $currentPage -1 ;

    $postPerPage = 5;

    $offset = $page * $postPerPage;

    # This method is used to count the total rows
    $sql = $dbh->prepare("
      SELECT
       *
      FROM
       `pdo`"
    );

    $sql->execute();
    $Counter    = $sql->rowCount();
    $totalpages = ceil( $Counter / $postPerPage );

    // LIMIT 10 OFFSET 25;

    // LIMIT 25, 10;

    // LIMIT $offset, $page;

    $record = $dbh->prepare("
      SELECT
      SQL_CALC_FOUND_ROWS
       *
      FROM
       `pdo`
      LIMIT :offset , :postPerPage 
    ");

    // I have used this because
    // PDO was converting the value into string
    $record-> bindValue(':offset', $offset, PDO::PARAM_INT);
    $record-> bindValue(':postPerPage', $postPerPage, PDO::PARAM_INT);
    $record-> execute();

    $result = $record->fetchAll();
  }

    if($currentPage > $totalpages) {
    
    // This method is convert the Querystring to array using parse_str
    // QUERY_STRING are like url:?searchBar=Rahul&page=1 to 2

      parse_str($_SERVER['QUERY_STRING'], $queryArray); 
      $queryArray['page'] = $totalpages;

    // This method is used to convert the ArrayQuery to stringQuery
    // http_build_query is used to generate url-encoded string from the provided array

      $queryString =  http_build_query($queryArray);
      header("Location: ?".$queryString);
    }

  include("include/userheader.php");
?>