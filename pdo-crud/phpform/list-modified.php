<?php


  include("connection.php");

  #Query Running for fetching data from database

  #(!isset($_GET['search'])) ? $_GET['search'] = '' : $_GET['search'];

  #search parameter
  #pagination parameter

  $search      = isset($_GET['search'])   ? $_GET['search']    : "";
  $page        = isset($_GET['page'])     ? $_GET['page']      : 1;
  $orderBy     = isset($_GET['order-by']) ? $_GET['order-by']  : "";
  $order       = isset($_GET['order'])    ? $_GET['order']     : 'DESC';
  

  $postPerPage = 3;

  $currentPage = empty($page) ? 1 : intval( $page );
  $currentPage = max($currentPage, 1);
  // $currentPage--; // Because MYSQL uses 0 index

  $offset      = ( $currentPage - 1) * $postPerPage;
  $queryPart   = "";
  $orderPart   = "";
  

  if(!empty($search)){
    $queryPart   = "
      WHERE
        `firstname` LIKE :search
      OR
        `displayname`  LIKE :search
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
     `sign-up`
    {$queryPart}
    {$orderPart}
    LIMIT :offset , :postPerPage 
  ";

  $record = $dbh->prepare($query);

  // I have used this because
  // PDO was converting the value into string
  $record-> bindValue(':offset', $offset, PDO::PARAM_INT);
  $record-> bindValue(':postPerPage', $postPerPage, PDO::PARAM_INT);

  if(!empty($search)){
    $record-> bindValue(':search', $search);
  }

  // Binding not need 
  // if(!empty($orderBy)){
  //   $record-> bindValue(':orderBy', $orderBy, PDO::PARAM_STR);
  //   $record-> bindValue(':order'  , $order  , PDO::PARAM_STR);

  //   echo '<pre>';
  //   print_r(array(
  //     'orderBy' => $orderBy,
  //     'order'   => $order
  //   ));
  //   echo '</pre>';
  // }

  

  $record-> execute();


  $statement  = $dbh->query('SELECT FOUND_ROWS()');
  $response   = $statement->fetchColumn();
  $totalpages = ceil( $response / $postPerPage );

  $result = $record->fetchAll();

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

  include("header.php");
?>

<form method="get">
<div class="container">
  <div class="row">   
    <div class="col-md-12">
      <h2 align="center">
        <img src="images/jp.png" width="60px" height="60px" />
        <b color= rgb(0,0,255)>Database Records</b>
      </h2>
      <div class="searched">
        <input value="<?php echo $search; ?>" type="text" name="search" id="searching" placeholder="What you looking for?">
        <button type="submit" class="btn btn-primary btn-sm" name="locate"><span class="glyphicon glyphicon-search"></span></button>
      </div>
     <!--  <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-10">
            <select class="custom-select" id="inputGroupSelect04" name="multiDelete">
              <option value="">Choose...</option>
              <option value="deleted">Delete</option>
            </select>
          </div>
          <div class="col-sm-2">
            <button class="btn btn-sm btn-primary btn-create" id="actionButton" name="action">Action</button>
          </div>
        </div>
      </div> -->
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead>
            <tr>
              <th><input type="checkbox" id="checkall" /></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th><a href="?order-by=displayname&order=<?php echo $order == 'desc'?'asc':'desc'; ?>">
                User Name
               </a></th>
              <th>
               <a href="?order-by=email&order=<?php echo $order == 'desc'?'asc':'desc'; ?>">
                 Email
               </a></th>
              <th>Edit</th>
              <th>Delete</th> 
            </tr>
          </thead>
        <?php
          // Foreach loop for getting all data seprately

          foreach($result as $row){
            #print_r($row);
    
            ?>

          <tbody>
            <tr>
              <td>
                <input type="checkbox" class="checkthis" />
              </td>

              <td>
                <?php echo $row['firstname']; ?>
              </td>

              <td>
                <?php echo $row['lastname']; ?>
              </td>

              <td>
                <?php echo $row['displayname']; ?>
              </td>

              <td>
                <?php echo $row['email']; ?>
              </td>

              <td>
                <a class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $row['id']; ?>">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
              </td>

              <td>
                <a 
                  href = "javascript:confirmation(<?php echo $row['id']; ?>)" 
                  class="btn btn-danger btn-sm"
                  data-toggle="tooltip" 
                  title="Delete" 
                  name="DeleteID"
                >
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
            </tr>
          </tbody>
          <?php
            }
          ?>
        </table>
        <a href="index.php" class="return-btn">
          <i class="glyphicon glyphicon-home"></i>&nbsp;
          Back To Home
        </a>

      <div class="clearfix"></div>
        <ul class="pagination pull-right">

          <!--Dynamic Pagination Used in  listing--->

          <?php 
            for($i =1; $i <= $totalpages; $i++){ 
              $class = ($i == $currentPage) ? "active" : "";
              $href  = ($i == $currentPage) ? "#"      : "&page={$i}"
          ?> 
              <li class="<?php echo $class;?>">
                <a href="?search=<?php echo $_GET['search']; ?><?php echo $href; ?>">
                  <?php echo $i; ?>                    
                </a>
              </li> 
          <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>
</form>
<?php include_once('footer.php'); ?>