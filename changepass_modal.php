<div id="modalPass" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change your password!</h4>
      </div>
      <div class="modal-body">
        <label id="error"></label>
        <form  method="post" id="passForm">
            <div class="form-group">
              <label for="current_pass"><span class="glyphicon glyphicon-question-sign"></span>Password</label>
              <input type="text" class="form-control" id="current_pass" placeholder="Current password">
            </div>
            <div class="form-group">
              <label for="new_password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="text" class="form-control" id="new_password" placeholder="Enter password">
            </div>

             <div class="form-group">
              <label for="pass_again"><span class="glyphicon glyphicon-eye-open"></span>Confirm password</label>
              <input type="text" class="form-control" id="pass_again" placeholder="Enter password">
            </div>
            
              <button type="submit" name="submit" id="modalSub" data-dismiss="modal" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-fire"></span>Change password</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>