<?php
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