<div class="modal fade" id="info<?php echo $staff_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <?php
        include "dbconnection.php";

        $stmt2 = $conn->prepare("SELECT * FROM `user_staff` WHERE staff_id=? ");
        $stmt2->bind_param("s", $staff_id);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $erow = $result2->fetch_assoc();

        $staff_full = $erow['staff_full'];
        $staff_email = $erow['staff_email'];
        $staff_phone = $erow['staff_phone'];
        $staff_address = $erow['staff_address'];
        $staff_register = date_format(date_create($erow['staff_register']), 'd/m/Y');
        $staff_status = $erow['staff_status'];
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
                <th colspan="2"><h5>Staff Information</h5></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="30%"><b>Staff Name :</b></td>
                <td width="70%"><?php echo $staff_full; ?></td>
              </tr>
              <tr>
                <td width="30%"><b>Staff Email :</b></td>
                <td width="70%"><?php echo $staff_email; ?></td>
              </tr>
              <tr>
                <td width="30%"><b>Staff Contact :</b></td>
                <td width="70%">+6<?php echo $staff_phone; ?></td>
              </tr>
              <tr>
                <td width="30%"><b>Staff Address :</b></td>
                <td width="70%"><?php echo $staff_address; ?></td>
              </tr>
              <tr>
                <td width="30%"><b>Account Created :</b></td>
                <td width="70%"><?php echo $staff_register; ?></td>
              </tr>
              <tr>
                  <td width="30%"><b>Account Status :</b></td>
                <td width="70%"><?php if($staff_status==0){ echo "<h4><span class='badge badge-success'>Active</span></h4>"; }else{ echo "<h4><span class='badge badge-danger'>Inactive</span></h4>"; }?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <form action="registration_staff_reset.php" method="post" enctype="multipart/form-data" class="form-horizontal">
          <input type="hidden" name="staff_id" value="<?php echo $staff_id;?>">
          <button type="submit" name="submit"class="btn btn-primary btn-sm" onclick="return confirm('Are you sure?');"><i class="fa fa-gears"></i>Change Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->
