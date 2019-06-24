<!-- modal-->
<div class="modal fade" id="edit<?php echo $fac_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <?php
        include "dbconnection.php";

        $stmt2 = $conn->prepare("SELECT * FROM `facility_category` WHERE fac_id=?");
        $stmt2->bind_param("s", $fac_id);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $erow = $result2->fetch_assoc();

        $facID = $erow['fac_id'];
        $facName = $erow['fac_name'];
        $facUv = date_format(date_create($erow['fac_unav']), 'd/m/Y');
        $facUnav = date_format(date_create($erow['fac_unav']), 'Y-m-d');

        ?>
        <div class="modal-header">
          <h5 class="modal-title" class="modal-header">MAINTENANCE <small>Update Cost</small></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form action="maintenance_extreme_cost_update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="modal-body">
            <div class="col-lg-12">
              <table class="table table-bordered" class="table table-sm">
                <thead bgcolor=#f8f8f8>
                  <tr align="center">
                    <th colspan="2"><h5><?php echo $facName ?></h5></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="30%"><b>Maintenance Date:</b></td>
                    <td width="70%"><label><?php echo $facUv; ?></label></td>
                  </tr>
                  <tr>
                    <td width="30%"><b>Repair Price (RM):</b></td>
                    <td width="70%"><input type="text" name="ext_cost" class="form-control"  required> </td>
                  </tr>
                  </tbody>
                </table>
                <?php date_default_timezone_set('Asia/Kuala_Lumpur'); $extDone =  date("Y-m-d H:i"); ?>
                <input type="hidden" name="ext_done" value="<?php  echo $extDone; ?>">
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="fac_id" value="<?php echo $facID;?>">
              <input type="hidden" name="ext_pend" value="<?php echo $facUnav;?>">
              <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal -->
