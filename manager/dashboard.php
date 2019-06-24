<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "function.php"; ?>
<?php include "dbconnection.php"; ?>

<body class="app sidebar-mini rtl">

  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>DASHBOARD</h4><small><span id="date_time"></span></small>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Dahhboard</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Dashboard</h5>
            <div class="card-body">
              <div class="row">

                <div class="col-sm-6 col-lg-6" style="margin-bottom:10px;">
                  <div class="card text-white bg-info">
                    <div class="card-body pb-0">
                      <div class="dropdown float-right">
                        <i class="fa fa-cog"></i>
                      </div>
                      <h2 class="mb-0">
                        <span><?php echo kayak(); ?></span>
                      </h2>
                      <p class="text-light">Water Game: Kayak </p>
                      <div class="chart-wrapper px-0" style="height:90px;" height="70">
                        <i class="fa fa-warning fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="maintenance_kayak_damage_list.php" style="color:white;" class="small-box-footer">More info&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-lg-6" style="margin-bottom:10px;">
                  <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                      <div class="dropdown float-right">
                        <i class="fa fa-cog"></i>
                      </div>
                      <h2 class="mb-0">
                        <span><?php echo paddle(); ?></span>
                      </h2>
                      <p class="text-light">Water Game: Paddle Boat</p>
                      <div class="chart-wrapper px-0" style="height:90px;" height="70">
                        <i class="fa fa-warning fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="maintenance_paddle_damage_list.php" style="color:white;" class="small-box-footer">More info&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-lg-6" style="margin-bottom:10px;">
                  <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                      <div class="dropdown float-right">
                        <i class="fa fa-cog"></i>
                      </div>
                      <h2 class="mb-0">
                        <span><?php echo electric(); ?></span>
                      </h2>
                      <p class="text-light">Water Game: Electric Boat</p>
                      <div class="chart-wrapper px-0" style="height:90px;" height="70">
                        <i class="fa fa-warning fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="maintenance_electric_damage_list.php" style="color:white;" class="small-box-footer">More info&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-lg-6" style="margin-bottom:10px;">
                  <div class="card text-white bg-secondary">
                    <div class="card-body pb-0">
                      <div class="dropdown float-right">
                        <i class="fa fa-cog"></i>
                      </div>
                      <h2 class="mb-0">
                        <span><?php echo extreme(); ?></span>
                      </h2>
                      <p class="text-light">Extream Game</p>
                      <div class="chart-wrapper px-0" style="height:90px;" height="70">
                        <i class="fa fa-warning fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="maintenance_extreme_view_panel.php" style="color:white;" class="small-box-footer">More info&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-lg-6" style="margin-bottom:10px;">
                  <div class="card text-white bg-success">
                    <div class="card-body pb-0">
                      <div class="dropdown float-right">
                        <i class="fa fa-cog"></i>
                      </div>
                      <h2 class="mb-0">
                        <span><?php echo cost(); ?></span>
                      </h2>
                      <p class="text-light">Total Cost Facilities Repaired</p>
                      <div class="chart-wrapper px-0" style="height:90px;" height="70">
                        <i class="fa fa-list fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="reporting_repair_view.php" style="color:white;" class="small-box-footer">More info&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-lg-6" style="margin-bottom:10px;">
                  <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                      <div class="dropdown float-right">
                        <i class="fa fa-cog"></i>
                      </div>
                      <h2 class="mb-0">
                        <span><?php echo amount(); ?></span>
                      </h2>
                      <p class="text-light">Total Amount Facilities Used</p>
                      <div class="chart-wrapper px-0" style="height:90px;" height="70">
                        <i class="fa fa-list fa-5x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="reporting_used_view.php" style="color:white;" class="small-box-footer">More info&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="card-footer">
              &nbsp;&nbsp;
            </div>

          </div>

        </div>
      </div>
    </div>
  </main>

  <?php include "footer.php"; ?>

</body>
</html>
