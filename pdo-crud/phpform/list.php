<?php
  include("connection.php");

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

    $row = [
      'search' => '%'.$search.'%'
    ];
    
    $record = $dbh->prepare( "
      SELECT 
      SQL_CALC_FOUND_ROWS
        *
      FROM 
        `sign-up` 
      WHERE
        `firstname` LIKE :search
      OR
        `displayname`  LIKE :search
    ");
    $record-> execute($row);

    #ref link:-- http://php.net/manual/en/pdostatement.fetchall.php

    #echo "<pre>";

    $statement = $dbh->query('SELECT FOUND_ROWS()');
    $response = $statement->fetchColumn();
    $totalpages  = ceil( $response / $postPerPage );
    
    #print("Fetch all of the remaining rows in the result set:\n");

    $result = $record;
    #print_r($result);

    // $sql->execute();
    // $Counter            = $sql->rowCount();
    // $totalpages         = ceil( $Counter / $postPerPage );

  }
  else{  

    # Pagination coding Start here..

    if(empty($_GET['page'])){
      $currentPage = 1;
    }else{
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

    # This method is used to count the total rows
    $sql = $dbh->prepare("
      SELECT
       *
      FROM
       `sign-up`"
    );

    #SELECT COUNT(*) FROM `sign-up`;
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
       `sign-up`
      LIMIT :offset , :postPerPage 
    ");

    // I have used this because
    // PDO was converting the value into string
    $record->bindValue(':offset', $offset, PDO::PARAM_INT);
    $record->bindValue(':postPerPage', $postPerPage, PDO::PARAM_INT);
    $record-> execute();

    // $statement = $dbh->query('SELECT FOUND_ROWS()');
    // $response = $statement->fetchColumn();

    // echo '<pre>'; 
    // print_r($response);
    // echo '</pre>';

    // $statement = $dbh->query('SELECT COUNT(*) FROM `sign-up`');
    // $response = $statement->fetchColumn();    

    // echo '<pre>'; 
    // print_r($response);
    // echo '</pre>';

    $result = $record->fetchAll();
  }

    if($currentPage > $totalpages) {
    
    // This method is convert the Querystring to array using parse_str
    // QUERY_STRING are like url:?searchBar=shubha&page=1 to 6
      parse_str($_SERVER['QUERY_STRING'], $queryArray); 
      $queryArray['page'] = $totalpages;
    // This method is used to convert the ArrayQuery to stringQuery
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
        <input type="text" name="search" id="searching" placeholder="What you looking for?">
        <button type="submit" class="btn btn-primary btn-sm" name="locate"><span class="glyphicon glyphicon-search"></span></button>
      </div>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead>
            <tr>
              <th><input type="checkbox" id="checkall" /></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>User Name</th>
              <th>Email</th>
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