	    <!--- Modal  Edit-->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" style="max-width: 1000px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Update Attendance</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="update" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>">
      <input type="hidden" name="update"/>
      <div class="modal-body" id="detail">

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
        <!--- Modal Edit-->
<!--- Modal  Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" style="max-width: 500px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Are you Confirm Delete ?</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="delete" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>">
      <div class="modal-body" id="delete_detail">
          
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="modal_create_submit_btn">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--- Modal  Delete-->