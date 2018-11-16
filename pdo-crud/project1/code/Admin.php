<?php 

  # Query For Users

  $query    = "SELECT 
                (SELECT count(*) FROM `pdo`) as users,
                (SELECT count(*) FROM `pdo` WHERE `username` LIMIT 1,25) as new,
                (SELECT count(`status`) FROM `pdo` WHERE `status` = 'Blocked') as block,
                (SELECT count(`status`) FROM `pdo` WHERE `status` = 'Unblocked') as unblock
              ";
  $user     = $dbh->prepare($query);
  $response = $user->execute();
  $all      = $user->fetch(PDO::FETCH_ASSOC);


  # Query for Subject


  $query      = "SELECT SQL_CALC_FOUND_ROWS * FROM `subject`";
  $subject    = $dbh->prepare($query);
  $subject-> execute();
  $statement  = $dbh->query('SELECT FOUND_ROWS()');
  $data       = $statement->fetchColumn();

  // $Query    = "SELECT count(*) FROM `subject`";
  // $subject  = $dbh->prepare($Query);
  // $response = $subject->execute();
  // $data     = $subject->fetch(PDO::FETCH_ASSOC);
  // print_r($data); 
?>