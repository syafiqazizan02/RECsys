<div class="row">
  <?php
  $stmt = $conn->prepare("SELECT * FROM `facility_category` WHERE fac_id >3");
  $stmt->execute();
  $result = $stmt->get_result();

  while($row = $result->fetch_assoc())
  {
    $fac_id = $row['fac_id'];
    $fac_name = $row['fac_name'];
    $fac_status = $row['fac_status'];
    $fac_unav = date_format(date_create($row['fac_unav']), 'd/m/Y');
    ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-header">
          <div style="float:right;">
            <p align="center"><input type="checkbox" value="<?php echo $fac_id; ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;</p>
          </div>
          <div style="float:left;">
            <h4 ><?php echo $fac_name;?></h4>
          </div>
        </div>
        <div class="card-body">
          <div style="float:left;">
            <h5 class="card-title">Facilities Status: </h5>
            <h5 class="card-subtitle text-muted"><?php if($fac_status==0){ echo "<span class='badge badge-success'>Available </span>"; }else{ echo "<span class='badge badge-danger'>Unavailable</span>"; }?></h5>
          </div>
          <div style="float:right;">
            <small>
              <?php
              include('maintenance_extreme_cost_edit.php');
              if($fac_status==1){
                echo "<label style='color:orange; font-weight:bold;'>Maintenance since</label>&nbsp;&nbsp;<label>".$fac_unav."</label>&nbsp;&nbsp;
                <a href='#edit$fac_id' data-toggle='modal' class='btn btn-warning btn-sm' style='color:white;'><i class='fa fa-fw fa-xs fa-plus'></i></a>";
              }else{
                echo "<label style='height:66px;'>&nbsp;&nbsp;<label>";
              }
              ?>
            </small>
          </div>
        </div>
      </div><br />
    </div>
  <?php } ?>
  <div class="col-md-12">
    <div align="right">
      <button type="button" name="btn_extreme" id="btn_extreme" class="btn btn-primary btn-sm"><i class='fa fa-exchange'></i>Update</button>
    </div>
  </div>
</div>
