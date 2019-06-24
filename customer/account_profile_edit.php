<?php
  include "dbconnection.php";

  $cust_id = $id;

  $stmt = $conn->prepare("SELECT * FROM `user_customer` WHERE cust_id=? ");
  $stmt->bind_param("s", $cust_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $erow = $result->fetch_assoc();

  $cust_name = $erow['cust_name'];
  $cust_ic = $erow['cust_ic'];
  $cust_email = $erow['cust_email'];
  $cust_contact = $erow['cust_contact'];
  $cust_gender= $erow['cust_gender'];
  $cust_age= $erow['cust_age'];
  $cust_address = $erow['cust_address'];
  $cust_register = date_format(date_create($erow['cust_register']), 'd M Y');
?>
<form action="account_profile_update.php" method="post" id="form" enctype="multipart/form-data"  class="form-horizontal">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Name :</label>
        <input class="form-control" type="text"  name="cust_name" value="<?php echo $cust_name; ?>" required>
      </div>
      <div class="form-group">
        <label class="control-label">Email :</label>
        <input class="form-control" type="email" name="cust_email" value="<?php echo $cust_email; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  title="Must in valid format"required>
      </div>
      <div class="form-group">
        <label class="control-label">Contact :</label>
        <input class="form-control" type="number" name="cust_contact" value="<?php echo $cust_contact; ?>"  size="11" pattern=".{10,11}" title="Must be 10 or 11 of number" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Gender :</label>
        <select  class="form-control" name="cust_gender" required>
          <option ><?php echo $cust_gender; ?></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
	  <div class="form-group">
        <label class="control-label">Age :</label>
        <input class="form-control" type="number" name="cust_age" value="<?php echo $cust_age; ?>" required>
      </div>
      <div class="form-group">
        <label class="control-label">Address :</label>
        <textarea class="form-control" rows="3" name="cust_address" required ><?php echo $cust_address; ?></textarea>
      </div>
    </div>
  </div>
  <div align="right">
    <input type="hidden" name="cust_id" value="<?php  echo $id; ?>">
    <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
    <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
  </div>
</form>
