<?php
  include("connection.php");
?>
<button><a href="index.php">Homepage</a></button>&nbsp;&nbsp;
<!--For making the Header of a table--->
<table border="2">
  <tr>
    <th>Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>User Name</th>
    <th>Email</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
<!----Query Running for fetching data from database--->
<?php
  $record = $dbh->prepare( "SELECT * FROM `sign-up`");
  $record-> execute();

  #ref link:-- http://php.net/manual/en/pdostatement.fetchall.php

  #echo "<pre>";
  
  #print("Fetch all of the remaining rows in the result set:\n");

  $result = $record->fetchAll();
  #print_r($result);
  
  // Foreach loop for getting all data seprately

  foreach($result as $row){
    #print_r($row);
    ?>

<!----For making all the data fetched from database in the form of a table--->

  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['firstname']; ?></td>
    <td><?php echo $row['lastname']; ?></td>
    <td><?php echo $row['displayname']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><a href="edit.php?id=<?php echo $row['id']?>"><img src="images/edit.jpg" width="40px" height="40px"></i></a></td>
    <td><a href="delete.php?id=<?php echo $row['id']?>"><img src="images/delete.jpg" width="40px" height="40px"></a></td>
  </tr>
<?php
  }
?>