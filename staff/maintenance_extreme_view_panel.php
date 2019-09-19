<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>

<body class="app sidebar-mini rtl">

  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>MAINTENANCE</h4><small><span id="date_time"></span></small>
      </div>
      <?php include "chatting_seen_notification.php"; ?>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Maintenance</li>
        <li class="breadcrumb-item active">Extreme Game</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Extreme Game</h5>
            <div class="card-body">
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
                          <h5><?php echo $fac_name;?></h5>
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
                  <button type="button" name="btn_extreme" id="btn_extreme" class="btn btn-primary btn-sm" rel="popover" data-trigger="hover" data-placement="top" data-original-title="" data-content="Record the facilities under maintenance or cant be used during raining!"><i class='fa fa-exchange'></i>Update</button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            &nbsp;&nbsp;
          </div>
        </div>
      </div>
    </main>

    <?php include "footer.php"; ?>

  </body>
  </html>
