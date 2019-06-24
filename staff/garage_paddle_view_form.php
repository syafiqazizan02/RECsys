<form action="garage_paddle_view_add.php" method="post" id="form" enctype="multipart/form-data"  class="form-horizontal">
  <div>
    <div class="form-group">
      <label class="control-label">Boat Code :</label>
      <input class="form-control" type="text" placeholder="Enter Boat Code" name="new_code" required>
    </div>
    <div class="form-group">
      <label class="control-label">Boat Model :</label>
      <input class="form-control" type="text" placeholder="Enter Boat Model" name="new_model" required>
    </div>
    <div class="form-group">
      <label class="control-label">Boat Color :</label>
      <input class="form-control" type="text" placeholder="Enter Boat Color" name="new_color" required>
    </div>
    <div class="form-group">
      <label class="control-label">Receive Date :</label>
      <input class="form-control" type="date" placeholder="Enter Receive Date" name="new_receive" required>
    </div>
    <div class="form-group">
      <label class="control-label">Receive Price (RM) :</label>
      <input class="form-control" type="number" placeholder="Enter Receive Price" name="new_price" required>
    </div>
  </div>
  <div align="right">
    <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
    <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
  </div>
</form>
