<div class="modal fade" id="info<?php echo $cust_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
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
        $cust_register = date_format(date_create($erow['cust_register']), 'd/m/Y');
      ?>
      <div class="modal-header">
        <h5 class="modal-title" class="modal-header">REGISTRATION <small>Reset Password</small></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <table class="table table-hover table-bordered" >
            <thead bgcolor=#f8f8f8>
              <tr align="center">
                <th colspan="2"><h5>Customer Information</h5></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="30%"><b>Customer Name :</b></td>
                <td width="70%"><?php echo $cust_name; ?></td>
              </tr>
              <tr>
                <td width="30%"><b>Customer Email :</b></td>
                <td width="70%"><?php echo $cust_email; ?></td>
              </tr>
              <tr>
                <td width="30%"><b>Customer Contact :</b></td>
                <td width="70%">+6<?php echo $cust_contact; ?></td>
              </tr>
              <tr>
                <td width="30%"><b>Customer Address :</b></td>
                <td width="70%"><?php echo $cust_address; ?></td>
              </tr>
              <tr>
                <td width="30%"><b>Account Created :</b></td>
                <td width="70%"><?php echo $cust_register; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <form action="registration_visitor_reset.php" method="post" enctype="multipart/form-data" class="form-horizontal">
          <input type="hidden" name="cust_id" value="<?php echo $cust_id;?>">
          <button type="submit" name="submit"class="btn btn-primary btn-sm" onclick="return confirm('Are you sure?');"><i class="fa fa-gears"></i>Change Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->
