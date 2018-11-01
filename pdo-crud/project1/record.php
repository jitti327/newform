<?php
  include("code/record.php")
?>

<form method="get">
<div class="container">
  <div class="row">   
    <div class="col-md-12">
      <h2 align="center">
        <img src="images/jp.jpg" width="60px" height="60px" />
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
                <?php echo $row['username']; ?>
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
<?php include("include/userfooter.php"); ?>