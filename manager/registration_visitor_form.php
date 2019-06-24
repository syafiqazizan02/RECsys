<form action="registration_visitor_add.php" method="post" id="form" enctype="multipart/form-data"  class="form-horizontal">
  <div class="form-group">
    <label class="control-label">Customer Name :</label>
    <input class="form-control" type="text" placeholder="Enter Customer Name" name="cust_name" required>
  </div>
  <div class="form-group">
    <label class="control-label">Customer IC :</label>
    <input class="form-control" type="number" placeholder="Enter Customer IC " name="cust_ic" size="12" pattern=".{12}" title="Must be 12 of number" required>
  </div>
  <div class="form-group">
    <label class="control-label">Customer Email :</label>
    <input class="form-control" type="text" placeholder="Enter Customer Email" name="cust_email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  title="Characters followed by an @ sign, characters followed by an . sign, a characters" required>
  </div>
  <div class="form-group">
    <label class="control-label">Customer Contact :</label>
    <input class="form-control" type="text" placeholder="Enter Customer Phone" name="cust_contact" size="11" pattern=".{10,11}" title="Must be 10 or 11 of number" required>
  </div>
  <div class="form-group">
    <label class="control-label">Customer Address :</label>
    <textarea class="form-control" rows="3" placeholder="Enter Customer Address"  name="cust_address" required ></textarea>
  </div>
  <?php date_default_timezone_set('Asia/Kuala_Lumpur'); $cust_register =  date("Y-m-d H:i"); ?>
  <input type="hidden" name="cust_register" value="<?php  echo $cust_register; ?>">
  <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
  <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
</form>
