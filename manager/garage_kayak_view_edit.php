<!-- modal-->
<div class="modal fade" id="edit<?php echo $new_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <?php
        include "dbconnection.php";

        $stmt2 = $conn->prepare("SELECT * FROM `facility_new` WHERE new_id=? ");
        $stmt2->bind_param("s", $new_id);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $erow = $result2->fetch_assoc();

        $newCode = $erow['new_code'];
        $newModel = $erow['new_model'];
        $newColor = $erow['new_color'];
        $newReceive = date_format(date_create($erow['new_receive']), 'Y-m-d');
        $newPrice = $erow['new_price'];
      ?>
      <div class="modal-header">
        <h5 class="modal-title" class="modal-header">MAINTENANCE <small>Edit Kayak</small></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="garage_kayak_view_update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-body">
          <div class="col-lg-12">
            <div style="height:10px;"></div>
            <div class="row">
              <div class="col col-md-4"><label for="text-input" class=" form-control-label">Boat Code :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></div>
              <div class="col-12 col-md-7"><input type="text" name="new_code" value="<?php echo $newCode;?>" class="form-control" required></div>
            </div>
            <div style="height:10px;"></div>
            <div class="row">
              <div class="col col-md-4"><label for="text-input" class=" form-control-label">Boat Model :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></div>
              <div class="col-12 col-md-7"><input type="text" name="new_model" value="<?php echo $newModel;?>" class="form-control" required></div>
            </div>
            <div style="height:10px;"></div>
            <div class="row">
              <div class="col col-md-4"><label for="text-input" class=" form-control-label">Boat Color :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></div>
              <div class="col-12 col-md-7"><input type="text" name="new_color" value="<?php echo $newColor;?>" class="form-control" required></div>
            </div>
            <div style="height:10px;"></div>
            <div class="row">
              <div class="col col-md-4"><label for="text-input" class=" form-control-label">Receive Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></div>
              <div class="col-12 col-md-7"><input type="date" class="form-control" name="new_receive" value="<?php echo $newReceive;?>" required></div>
            </div>
            <div style="height:10px;"></div>
            <div class="row">
              <div class="col col-md-4"><label for="text-input" class=" form-control-label">Receive Price (RM) :</label></div>
              <div class="col-12 col-md-7"><input type="number" name="new_price" value="<?php echo $newPrice;?>" class="form-control" required></div>
            </div>
            <div style="height:10px;"></div>
          </div>
          <input type="hidden" name="new_id" value="<?php echo $new_id;?>">
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
          <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.modal -->
