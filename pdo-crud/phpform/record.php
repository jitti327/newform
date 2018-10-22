<?php
  include("connection.php");
?>
<!--For making the Header of a table--->
<table border="2">
  <tr>
    <th>Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>User Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Confirm Password</th>
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
    <td><?php echo $row['password']; ?></td>
    <td><?php echo $row['confirmpassword']; ?></td>
    <td><a href="edit.php?id=<?php echo $row['id']?>">edit</a></td>
    <td><a href="delete.php?id=<?php echo $row['id']?>">delete</a></td>
  </tr>
<?php
  }
?>