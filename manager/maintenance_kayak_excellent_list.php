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
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Maintenance</li>
        <li class="breadcrumb-item active">Excellent Kayak</li>
      </ul>
    </div>
    <?php include "maintenance_kayak_bar.php"; ?>

    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Excellent Kayak</h5>
              <form action="maintenance_kayak_excellent_check.php" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-9">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  <div class="col-lg-1">
                    Search:
                  </div>
                  <div class="col-lg-2">
                    <script src="../js/argiepolicarpio.js"></script>
                    <script src="../js/application.js"></script>
                    <input type="search" class="form-control form-control-sm" name="filter" value="" id="filter">
                  </div>
                </div><br />
                <table class="table table-hover table-bordered">
                  <thead bgcolor=#f8f8f8>
                    <tr align="center">
                      <th rowspan="2">No.</th>
                      <th rowspan="2">Kayak Code</th>
                      <th colspan="7"><center>Type of Damage</center></th>
                    </tr>
                    <tr align="center">
                      <th>Blade</th>
                      <th>Seat</th>
                      <th>Hatch</th>
                      <th>Crack</th>
                      <th>Leak</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $new_damage= 0;
                    $fac_id= 3;
                    $v = 0;

                    $stmt = $conn->prepare("SELECT * FROM `facility_new` WHERE new_damage=? AND fac_id=?");
                    $stmt->bind_param("ss", $new_damage, $fac_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while($row = $result->fetch_assoc())
                    {
                      $new_id = $row['new_id'];
                      $new_code = $row['new_code'];
                      $v++;
                      ?>
                      <tr align="center">
                        <td><?php echo $v; ?></td>
                        <td><?php echo $new_code; ?></td>
                        <td align='center'><input type='checkbox' class='form-check-input' name='dam_kyk_blade[]' value='<?php echo $new_id; ?>'></td>
                        <td align='center'><input type='checkbox' class='form-check-input' name='dam_kyk_seat[]' value='<?php echo $new_id; ?>'></td>
                        <td align='center'><input type='checkbox' class='form-check-input' name='dam_kyk_hatch[]' value='<?php echo $new_id; ?>'></td>
                        <td align='center'><input type='checkbox' class='form-check-input' name='dam_kyk_crack[]' value='<?php echo $new_id; ?>'></td>
                        <td align='center'><input type='checkbox' class='form-check-input' name='dam_kyk_leak[]' value='<?php echo $new_id; ?>'></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <div align="right">
                  <button class="btn btn-primary btn-sm" type="submit" name="checked"><i class="fa fa-fw fa-lg fa-check-circle"></i>Checked</button>
                </div>
              </div>
              <div class="card-footer">
                &nbsp;&nbsp;
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include "footer.php"; ?>

</body>
</html>
