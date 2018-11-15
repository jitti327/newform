<?php
  
  #
  # Parameter : id - id of the user
  # Return    : True  - in case user exists
  #           : False - in case user don't exist

  function userExist($id){

    global $dbh;

    $stmt = $dbh->prepare( "SELECT * FROM `pdo` WHERE id= :id LIMIT 1");
    $stmt->execute([ 'id' => $id ]);

    # debug($stmt->rowCount());

    return $stmt->rowCount() == 0 ? false : true;
    return ($stmt->fetch(PDO::FETCH_ASSOC) === false) ? false: true;

  }

  #
  # Parameter : email - email of the user
  # Return    : True  - in case user exists
  #           : False - in case user don't exist

  function emailExist($email){

    global $dbh;

    $stmt = $dbh->prepare( "SELECT * FROM `pdo` WHERE email= :email LIMIT 1");
    $stmt->execute([ 'email' => $email ]);

    # debug($stmt->rowCount());

    return $stmt->rowCount() == 0 ? false : true;
    return ($stmt->fetch(PDO::FETCH_ASSOC) === false) ? false: true;

  }

  /* This Function Is used to debug */

  function debug($var){
    echo '<pre>';
    print_r($var);
    var_dump($var);
    echo '</pre>';
  }
  

  #Query Running for fetching data from database
  // function mayMultipleDelete($tableName){
  function mayMultipleDelete( $tableName , $id){   
    global $dbh;
    global $message;
    $query       = "DELETE FROM `{$tableName}` WHERE id = :id ";
    // echo $query;
    $deleteQuery = $dbh->prepare($query);
    $results     = $deleteQuery->execute( ['id' => $id] );
    if( $results !== false ){
      $message = '<span style="color: rgb(0,255,0);">** Records are deleted successfully</span>';
    }else{
      $message = '<span style="color: rgb(255,0,0);">** Your records are not deleted</span>'; 
    } 
    return true;                 
  }

  // # Calling the above function:-

  //  mayMultipleDelete( 'name of the table' , $id); 


  /*
  *
  * Function Name : multipleDelete
  * Parameter     : $table - String - Name of the table
  *               : $ids   - Array  - Contains the ids
  * Return        : Returns ture if entries are deleted
  *               : Returns false if entries are not deleted
  */


  // function multipleDelete($table , $fieldName , $ids){
  //   global $dbh;
  //   global $message;
  //   if(isset($_REQUEST[$fieldName]) && $_REQUEST[$fieldName] == 'deleted'){
  //     $temp = "";
  //     $query = "DELETE FROM `{$table}` WHERE id IN (:id)";

  //     // echo "'".implode("','", $_REQUEST[$ids]). "'";
  //     // die();

  //     #TODO : Implement multiple delete with having clause
  //     #Error Occur in this : Only one row is deleted after selecting multiple rows

  //     $deleteQuery = $dbh->prepare($query);
  //     $response    = $deleteQuery->execute(['id' => implode("','", $_REQUEST[$ids])  ]);
  //     if($response !== false){
  //       $message = '<span style="color: rgb(0,255,0);">** Records are deleted successfully</span>';
  //     }
  //     else{
  //       $message = '<span style="color: rgb(255,0,0);">** Your records are not deleted</span>';
  //     }    
  //   }
  // }

  // To Call the above function use :-
  // multipleDelete('class' , 'multiDelete' , 'userDlt'); // This is used to delete multiple data

/*
 * function Name : orderIcon
 * parameter     : $columnName  -> Mysql table column name
 *               : $customName  -> display the custom head name 
 *               : $order       -> set the default order value assending or dessending
 *               : $currentPage -> current page of the value
 * Return        : true           
*/
  function orderIcon( $columnName , $customName, $order , $currentPage ){ 
    $orderBy = isset($_REQUEST['order-by'])      ? $_REQUEST['order-by']    : "";
  ?>
    <a 
      href="?order-by=<?php echo $columnName; ?>&order=<?php echo $order == 'desc'?'asc':'desc'; ?>&page=<?php echo $currentPage; ?>"
      class="orderLink">
        <?php echo $customName; ?>
    </a>
<?php
    if($orderBy == $columnName){ ?>
      <i class="fa fa-sort-amount-<?php echo $order ?> order"></i>
<?php     
    }
    return true;
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
  * Parameters     : $columnDetails, $orderBy, $order // These Are coming from coding of all files.
  * Returns        : The Html of <tr> tag for <thead> and <tfoot> dynamically and sorting with icons
  */
  function renderTableHeaderPart($columnDetails, $order ,$currentPage){
    global $currentPage;
    echo "<tr>";
    echo '<th><input type="checkbox" id="checkall" /><i class="countchecked"></i></th>';
    echo '<th>S.No.</th>';
    foreach($columnDetails as $key => $value){
 ?>
    <th><?php orderIcon($key , $value , $order , $currentPage); ?></th>
<?php 
    }
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
    return false;
  }

  /*
  * Function Name : pagination
  * Parameter     : $currentPage -> set the current page value
  *               : $order       -> set the default order value in assending and dessending value
  *               : $searchName  -> write the search field name
  *               : $response    -> Fatch of all record 
  *               : $totalpages  -> PerPage of records
  * Return        : True
  */ 
  function pagination($currentPage , $postPerPage , $searchName , $response , $totalpages){ ?>
    <div class="col-sm-5">
      <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
        Showing 1 to 
        <?php
          if($postPerPage < $response){
            echo $postPerPage; 
          }
          else{
            echo $response;
          }
        ?> 
        of <?php echo $response; ?> entries
      </div>
    </div>
    <div class="col-sm-7">
      <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">    
        <ul class="pagination">
        <?php
          if( $currentPage  ){ 
            $previous  = $currentPage-1;
            $class     = ($currentPage == 1)  ? 'disabled' : '';
            $href      = ($currentPage == 1)  ? '#'        : '';
          ?>
          <li class="<?php echo $class; ?>">
            <a 
              href="?searchName=<?php echo $searchName; ?>&multiAction=&page=<?php echo $href.$previous;?> ">
              Previous</a>
          </li>
       <?php }
          for($i=1; $i <= $totalpages; $i++){ 
            $class  = ($i == $currentPage)  ? 'active' : '';
            $href   = ($i == $currentPage)  ? '#'      : '';
         ?>
        <li class="<?php echo $class; ?>">
          <a href="?searchName=<?php echo $searchName; ?>&multiAction=&page=<?php echo $i.$href; ?>"><?php echo $i; ?></a>
        </li>
        <?php } ?>
        <?php  
          if( $currentPage ){
            $next   = $currentPage+1; 
            // $next   = ($response == 0)                ? '#'        : '';
            $class  = ($currentPage == $totalpages)   ? 'disabled' : '';
            // $class  = ($response == 0)                ? 'disabled' : '';
            $href   = ($currentPage == $totalpages)   ? '#'        : '';
            ?>
            <li class="<?php echo $class; ?>">
              <a 
                href="?searchName=<?php echo $searchName; ?>&multiAction=&page=<?php echo $next.$href;?>">Next</a>
            </li>
         <?php }  ?>
        </ul> 
      </div>
    </div>  
   <?php 
     return true; 
      }
  /*
  * Function Name : showEnteriesField 
  * Parameter     : $fieldname     -> write of the field name
                  : $option        -> write of the value in array
                  : postPerPage -> Display of the record
  * Return        : true                
  */
  function showEnteriesField($fieldname , $option , $postPerPage){ ?>
    <div class="dataTables_length col-sm-4" id="example1_length">
      <label>Show 
        <select name="<?php echo $fieldname; ?>" aria-controls="example1" class="form-control input-sm">
          <?php foreach( $option as  $value ){ ?>
            <option 
              value="<?php echo $value; ?>" <?php echo ($postPerPage == $value) ? "selected='selected'" : "" ; ?>>
              <?php echo $value; ?>
            </option>
          <?php } ?>  
        </select> entries
      </label>
    </div>
  <?php return true; } ?> 
  <?php 
  /*
  * Function Name : searchField
  * Parameter     : $fieldName -> name of the field
  * Return        : true
  */ 
  function searchField($fieldName){ ?>
    <label>Search:
      <div class="input-group input-group-sm">
        <input 
          type="search" 
          class="form-control input-sm"
          value="<?php echo isset($_REQUEST[$fieldName]) ? $_REQUEST[$fieldName] : '' ;?>" 
          placeholder="What you looking for?" 
          aria-controls="example1" 
          name="<?php echo $fieldName; ?>">
        <span class="input-group-btn">
          <button class="btn btn-primary btn-sm"  type="submit" name="search"><span class="glyphicon glyphicon-search"></span></button>
        </span>
      </div>
    </label>
  <?php return true;} ?> 
  <?php 
  /*
  * Function Name : bulkAction
  * Parameter     : $fieldName -> write of the field name
                  : $addField  -> Add new option value
  * Return        : ture                
  */
  function bulkAction($fieldName , $addField){ ?>
    <div class="dataTables_length col-sm-4" id="example1_length">
      <label>Action :
        <select aria-controls="example1" name="<?php echo $fieldName; ?>" class="form-control input-sm bulkaction">
          <option value="">Select</option>
          <?php foreach( $addField as $key => $value ){ ?>
            <option value="<?php echo $key; ?>"><?php echo $value ?></option>
          <?php } ?>  
        </select>
        <button class="btn btn-sm btn-primary btn-create" id="actionButton">Action</button>
      </label>
    </div> 
<?php  return true;} ?> 


<?php 
  /* Here I want to add the validation on submit the form:-
  * Function Name : requiredValidation
  */
  function requiredValidation(){
    return $message = '<span style="color: rgb(255,0,0);">** This field is required</span>';
  }