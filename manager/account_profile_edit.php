<?php
  include "dbconnection.php";

  $stmt = $conn->prepare("SELECT * FROM `user_manager` WHERE manager_id=? ");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $erow = $result->fetch_assoc();

  $manager_full = $erow['manager_full'];
  $manager_email = $erow['manager_email'];
  $manager_phone = $erow['manager_phone'];
  $manager_address = $erow['manager_address'];
?>
<form action="account_profile_update.php" method="post" id="form" enctype="multipart/form-data"  class="form-horizontal">
  <div class="form-group">
    <label class="control-label">Manager Name :</label>
    <input class="form-control" type="text"  name="manager_full" value="<?php echo $manager_full; ?>" required>
  </div>
  <div class="form-group">
    <label class="control-label">Manager Contact :</label>
    <input class="form-control" type="text" name="manager_phone" value="<?php echo $manager_phone; ?>" size="11" pattern=".{10,11}" title="Must be 10 or 11 of number" required>
  </div>
  <div class="form-group">
    <label class="control-label">Manager Address :</label>
    <textarea class="form-control" rows="3" placeholder="Enter Staff Address"  name="manager_address" required ><?php echo $manager_address; ?></textarea>
  </div>
  <div class="right">
    <input type="hidden" name="manager_id" value="<?php  echo $id; ?>">
    <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
    <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
  </div>
</form>
