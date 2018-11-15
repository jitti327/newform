<?php
  $multiAction    = (isset($_REQUEST['multiAction'])) ? $_REQUEST['multiAction'] : '';
  $search         = (isset($_REQUEST['search']))      ? $_REQUEST['search']      : "";
  $user           = (isset($_REQUEST['userDlt']))     ? $_REQUEST['userDlt']     : '';
  $page           = (isset($_REQUEST['page']))        ? $_REQUEST['page']        : 1;
  $orderBy        = (isset($_REQUEST['order-by']))    ? $_REQUEST['order-by']    : "";
  $order          = (isset($_REQUEST['order']))       ? $_REQUEST['order']       : 'DESC';
  $entries        = (isset($_REQUEST['showEntries'])) ? $_REQUEST['showEntries'] : '';
  $task           = (isset($_REQUEST['task']))        ? $_REQUEST['task']        : '';

  $currentPage    = (empty($page))          ? 1   : intval( $page );
  $search         = (empty($search))        ? ''  : $search;
  $entries        = (empty($entries))       ? 10  : $entries;
  $currentPage    = ($currentPage <= 0)     ? 1   : $currentPage;

  $postPerPage    = $entries;
  $queryPart      = "";
  $orderPart      = "";
  $postPerPage    = intval($entries);
  $offset         = ( $currentPage - 1) * $postPerPage;
  $queryPart      = "";
?>