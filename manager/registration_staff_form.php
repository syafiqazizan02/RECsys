<form action="registration_staff_add.php" method="post" id="form" enctype="multipart/form-data"  class="form-horizontal">
  <div class="form-group">
    <label class="control-label">Staff Name :</label>
    <input class="form-control" type="text" placeholder="Enter Staff Name" name="staff_full" required>
  </div>
  <div class="form-group">
    <label class="control-label">Staff Email :</label>
    <input class="form-control" type="text" placeholder="Enter Staff Email" name="staff_email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  title="Characters followed by an @ sign, characters followed by an . sign, a characters" required>
  </div>
  <div class="form-group">
    <label class="control-label">Staff Contact :</label>
    <input class="form-control" type="text" placeholder="Enter Staff Phone" name="staff_phone" size="11" pattern=".{10,11}" title="Must be 10 or 11 of number" required>
  </div>
  <div class="form-group">
    <label class="control-label">Staff Address :</label>
    <textarea class="form-control" rows="3" placeholder="Enter Staff Address"  name="staff_address" required ></textarea>
  </div>
  <?php date_default_timezone_set('Asia/Kuala_Lumpur'); $staff_register =  date("Y-m-d H:i"); ?>
  <input type="hidden" name="staff_register" value="<?php  echo $staff_register; ?>">
  <input type="hidden" name="manager_id" value="<?php  echo $id; ?>">
  <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
  <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
</form>
