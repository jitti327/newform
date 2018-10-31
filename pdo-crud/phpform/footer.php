
<!-- <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-warning-sign"></span>
           Are you sure you want to delete this Record?
         </div>
      </div>
      <?php

      ?>
      <div class="modal-footer ">
        <a>
          <button type="button" class="btn btn-success" >
            <span class="glyphicon glyphicon-ok-sign"></span>
            Yes
          </button>
        </a>
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove"></span>
          No
        </button>
      </div>
    </div>
   /.modal-content 
  </div>
   /.modal-dialog
</div> -->
<!-- Script Used For Pop up displaying on click delete -->

<script type="text/javascript">
  function confirmation(ID){
    var message = "Are you sure you want to delete this Record?"; 
    var info    = confirm(message);
    if(info){
      var deleteRow = window.location = "delete.php?id="+ID;
      if(deleteRow){
        alert('Record Deleted Successfully');
      }else{
        alert('Record Not deleted');
      }
    }else{
      alert('No action taken');
    }
  }
</script>
</body>
</html>