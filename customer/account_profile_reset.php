<?php
  include "dbconnection.php";

  $stmt1 = $conn->prepare("SELECT * FROM `user_customer` WHERE cust_id=? ");
  $stmt1->bind_param("s", $id);
  $stmt1->execute();
  $result1 = $stmt1->get_result();
  $erow = $result1->fetch_assoc();

  $cust_password= $erow['cust_password'];
?>
<form action="account_profile_password.php" method="post" id="form" enctype="multipart/form-data"  class="form-horizontal">
  <div class="form-group">
    <label class="control-label">New Password :</label>
    <input class="form-control" type="password" placeholder="Enter New Password" name="new_password" pattern=".{6,}" title="Six or more characters" required>
  </div>
  <div class="form-group">
    <label class="control-label">Confirm Password :</label>
    <input class="form-control" type="password" placeholder="Enter Confirm Password" name="confirm_password" pattern=".{6,}" title="Six or more characters" required>
  </div>
  <div align="right">
    <input type="hidden" name="cust_id" value="<?php  echo $id; ?>">
    <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
    <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
  </div>
</form>
