<?php
  include "dbconnection.php";

  $stmt = $conn->prepare("SELECT * FROM `user_staff` WHERE staff_id=? ");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $erow = $result->fetch_assoc();

  $staff_full = $erow['staff_full'];
  $staff_email = $erow['staff_email'];
  $staff_phone = $erow['staff_phone'];
  $staff_address = $erow['staff_address'];
?>
<form action="account_profile_update.php" method="post" id="form" enctype="multipart/form-data"  class="form-horizontal">
  <div class="form-group">
    <label class="control-label">Staff Name :</label>
    <input class="form-control" type="text"  name="staff_full" value="<?php echo $staff_full; ?>" required>
  </div>
  <div class="form-group">
    <label class="control-label">Staff Contact :</label>
    <input class="form-control" type="text" name="staff_phone" value="<?php echo $staff_phone; ?>" size="11" pattern=".{10,11}" title="Must be 10 or 11 of number" required>
  </div>
  <div class="form-group">
    <label class="control-label">Staff Address :</label>
    <textarea class="form-control" rows="3" placeholder="Enter Staff Address"  name="staff_address" required ><?php echo $staff_address; ?></textarea>
  </div>
  <div class="right">
    <input type="hidden" name="staff_id" value="<?php  echo $id; ?>">
    <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
    <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
  </div>
</form>
