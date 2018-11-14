<?php

  #Query Running for fetching data from database
  // function mayMultipleDelete($tableName){
  //   global $dbh;
  //   global $message;
  //   if(isset($_REQUEST['multiDelete']) && $_REQUEST['multiDelete'] == 'deleted'){
  //     foreach( $_REQUEST['userDlt'] as $id){
  //       $query = "DELETE FROM `{$tableName}` WHERE id = :id ";
  //       $deleteQuery = $dbh->prepare($query);
  //       $response    = $deleteQuery->execute(['id' => $id]);
  //       if($response !== false){
  //         $message = '<span style="color: rgb(0,255,0);">** Records are deleted successfully</span>';
  //       }else{
  //         $message = '<span style="color: rgb(255,0,0);">** Your records are not deleted</span>';
  //       }
  //     }
  //   }

  // }

  // # Calling the above function:-

  //   mayMultipleDelete('subject');


  /*
  *
  * Function Name : multipleDelete
  * Parameter     : $table - String - Name of the table
  *               : $ids   - Array  - Contains the ids
  * Return        : Returns ture if entries are deleted
  *               : Returns false if entries are not deleted
  */


  function multipleDelete($table , $fieldName , $ids){
    global $dbh;
    global $message;
    if(isset($_REQUEST[$fieldName]) && $_REQUEST[$fieldName] == 'deleted'){
      $temp = "";
      $query = "DELETE FROM `{$table}` WHERE id IN (:id)";

      #TODO : Implement multiple delete with having clause
      #Error Occur in this : Only one row is deleted after selecting multiple rows

      $deleteQuery = $dbh->prepare($query);
      $response    = $deleteQuery->execute(['id' => implode("','", $_REQUEST[$ids])  ]);
      if($response !== false){
        $message = '<span style="color: rgb(0,255,0);">** Records are deleted successfully</span>';
        return;
      }
      else{
        $message = '<span style="color: rgb(255,0,0);">** Your records are not deleted</span>';
        return;
      }    
    }
  }


	/* Start Here

  function renderTableHeader($columnDetails, $orderBy, $order){
    ?>
      <thead><?php renderTableHeaderPart($columnDetails, $orderBy, $order); ?></thead>      
    <?php
  }

  function renderTableFooter($columnDetails, $orderBy, $order){
    ?>
      <tfoot><?php renderTableHeaderPart($columnDetails, $orderBy, $order); ?></tfoot>
    <?php
  }*/ 

  /* End Here */



	/*
	* Funcation Name : renderTableHeaderPart
	* Parameters 		 : $columnDetails, $orderBy, $order // These Are coming from coding of all files.
	* Returns 			 : The Html of <tr> tag for <thead> and <tfoot> dynamically and sorting with icons
	*/



  function renderTableHeaderPart($columnDetails, $orderBy, $order){
    echo "<tr>";
    echo "<th><input type='checkbox' id='checkall' /></th>";
    echo "<th>S.No</th>";

    foreach ($columnDetails as $key => $value) {
      ?>
      <th>
        <a href="?order-by=<?php echo $key; ?>&order=<?php echo $order == 'desc'?'asc':'desc'; ?>"><?php echo $value; ?>
          <?php 
            if( $orderBy == $key){ ?>
             <i class="fa fa-sort-amount-<?php echo $order; ?>"></i> 
           <?php }
          ?>
        </a>
      </th>
      <?php
    }
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
  }
?>