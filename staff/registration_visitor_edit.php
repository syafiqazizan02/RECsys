<!-- modal-->
<div class="modal fade" id="edit<?php echo $cust_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <?php
        include "dbconnection.php";

        $stmt2 = $conn->prepare("SELECT * FROM `user_customer` WHERE cust_id=? ");
        $stmt2->bind_param("s", $cust_id);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $erow = $result2->fetch_assoc();

        $cust_name = $erow['cust_name'];
        $cust_email = $erow['cust_email'];
        $cust_contact = $erow['cust_contact'];
        $cust_address = $erow['cust_address'];
        $cust_register = date_format(date_create($erow['cust_register']), 'Y-m-d');
      ?>
      <div class="modal-header">
        <h5 class="modal-title" class="modal-header">REGISTRATION <small>Update Info</small></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="registration_visitor_update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-body">
          <div style="height:10px;"></div>
          <div class="row">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Customer Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></div>
            <div class="col-12 col-md-9"><input type="text" name="cust_name" value="<?php echo $cust_name; ?>" class="form-control" required></div>
          </div>
          <div style="height:10px;"></div>
          <div class="row">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Customer Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></div>
            <div class="col-12 col-md-9"><input type="text" name="cust_email" value="<?php echo $cust_email; ?>" class="form-control" required></div>
          </div>
          <div style="height:10px;"></div>
          <div class="row">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Customer Contact :</label></div>
            <div class="col-12 col-md-9"><input type="number" name="cust_contact" value="<?php echo $cust_contact; ?>" class="form-control" required></div>
          </div>
          <div style="height:10px;"></div>
          <div class="row">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Customer Address :</label></div>
            <div class="col-12 col-md-9"><textarea ows="3" name="cust_address" class="form-control" required><?php echo $cust_address; ?></textarea></div>
          </div>
          <div style="height:10px;"></div>
          <div class="row">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Account Created :</label></div>
            <div class="col-12 col-md-9"><input type="date" name="cust_register" value="<?php echo $cust_register; ?>" class="form-control" required></div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="cust_id" value="<?php echo $cust_id;?>">
          <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
          <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>
