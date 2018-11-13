<?php

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

?>