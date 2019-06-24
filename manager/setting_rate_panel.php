<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>

<body class="app sidebar-mini rtl">

  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>SETTING</h4><span id="date_time"></span></small>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Setting</li>
        <li class="breadcrumb-item active">Rate Control</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Rate & Limit Control</h5>
            <div class="card-body">
              <div class="row">
                <?php
                $stmt = $conn->prepare("SELECT * FROM `facility_category`");
                $stmt->execute();
                $result = $stmt->get_result();

                while($row = $result->fetch_assoc())
                {
                  $fac_id = $row['fac_id'];
                  $fac_name = $row['fac_name'];
                  $fac_rate = $row['fac_rate'];
                  ?>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                      <div class="card-header">
                        <div style="float:right;">

                        </div>
                        <div style="float:left;">
                          <h4 ><?php echo $fac_name;?></h4>
                        </div>
                      </div>
                      <div class="card-body">
                        <div style="float:right;">
                          <?php include('setting_rate_edit.php'); ?>
                          <a href="#edit<?php echo $fac_id; ?>" data-toggle="modal" class="btn btn-info btn-sm" ><i class="fa fa-fw fa-lg fa-gear"></i></a>
                        </div>
                        <div style="float:left;">
                          <h5 class="card-title">Facilities Price:</h5>
                          <h5 class="card-subtitle text-muted">RM <?php echo number_format($fac_rate, 2);?></h5>
                        </div>
                      </div>
                    </div><br />
                  </div>
                <?php } ?>
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
