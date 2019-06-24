<div class="modal fade" id="info<?php echo $fac_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <?php
        $stmt22 = $conn->prepare("SELECT * FROM `facility_category` WHERE fac_id=?");
        $stmt22->bind_param("s", $fac_id);
        $stmt22->execute();
        $result22 = $stmt22->get_result();
        $erow22 = $result22->fetch_assoc();

        $staff_full = $erow22['fac_name'];
      ?>
      <div class="modal-header">
        <h5 class="modal-title" class="modal-header">MAINTENANCE <small>Extreme Game</small></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-bordered" id="data-table">
          <thead bgcolor=#f8f8f8>
            <tr align="center">
              <th colspan="4"><h5><?php echo $staff_full; ?></h5></th>
            </tr>
            <tr align="center">
              <th>No.</th>
              <th>Under Maintenance</th>
              <th>Finish Maintenance</th>
              <th>Cost</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $q=0;

              $stmtf = $conn->prepare("SELECT * FROM `damage_category` WHERE fac_id=? ORDER BY done_cat_date DESC");
              $stmtf->bind_param("s", $fac_id);
              $stmtf->execute();
              $resultf = $stmtf->get_result();

              while($rowf = $resultf->fetch_assoc())
              {
                $dam_cat_date = date_format(date_create($rowf['dam_cat_date']), 'd/m/Y');
                $done_cat_date = date_format(date_create($rowf['done_cat_date']), 'd/m/Y');
                $done_cat_price = $rowf['done_cat_price'];
                $q++
            ?>
              <tr align="center">
                <td><?php echo $q; ?></td>
                <td><?php echo $dam_cat_date; ?></td>
                <td><?php echo $done_cat_date; ?></td>
                <td>RM <?php echo $done_cat_price; ?></td>
              </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        &nbsp;&nbsp;
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->
