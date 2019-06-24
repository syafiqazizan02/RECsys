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
      $facRate = $erow['fac_rate'];
      $facLimit = $erow['fac_limit'];

      ?>
      <div class="modal-header">
        <h5 class="modal-title" class="modal-header">SETTING <small>Update Rate</small></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="setting_rate_update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-body">
          <div class="col-lg-12">
            <table class="table table-bordered" class="table table-sm">
              <thead bgcolor=#f8f8f8>
                <tr align="center">
                  <th colspan="2"><h5><?php echo $facName ?></h5></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($facID<=3) {
                  echo "<tr>
                    <td width='30%'>
                      <b>Facilities Rate (RM):</b>
                    </td>
                    <td width='70%'>
                      <input type='text' name='fac_rate' class='form-control' value='$facRate'>
                      <input type='hidden' name='fac_limit' class='form-control'>
                    </td>
                  </tr>";
                } else {
                  echo "<tr>
                    <td width='30%'>
                      <b>Facilities Rate (RM):</b>
                    </td>
                    <td width='70%'>
                      <input type='text' name='fac_rate' class='form-control' value='$facRate'>
                    </td>
                  </tr>
                  <tr>
                    <td width='30%'>
                      <b>Facilities Limit:</b>
                    </td>
                    <td width='70%'>
                      <input type='text' name='fac_limit' class='form-control' value='$facLimit'>
                    </td>
                  </tr>";}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="fac_id" value="<?php echo $facID;?>">
            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal -->
