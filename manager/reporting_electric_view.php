<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>

<body class="app sidebar-mini rtl">

  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>MAINTENANCE</h4>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Maintenance</li>
        <li class="breadcrumb-item active">Detail Paddle Boat</li>
      </ul>
    </div>
    <?php include "maintenance_electric_bar.php"; ?>
    <?php
        $new_id = @$_REQUEST['new_id'];

        $stmtt = $conn->prepare("SELECT * FROM `facility_new` WHERE new_id=?");
        $stmtt->bind_param("s", $new_id);
        $stmtt->execute();
        $resultt = $stmtt->get_result();
        $rowt = $resultt->fetch_assoc();
        $new_code= $rowt['new_code'];
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Detail Electric Boat</h5>
            <div class="card-body">
              <table class="table table-hover table-bordered" id="data-table">
                <thead bgcolor=#f8f8f8>
                  <tr align="center">
                    <th colspan="5">Electric Boat: <?php echo $new_code;?></th>
                  </tr>
                  <tr align="center">
                    <th>No.</th>
                    <th>Damage Date</th>
                    <th>Repair Date</th>
                    <th>Done Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $u=0;
                    $new_id = @$_REQUEST['new_id'];
                    $done =1;

                    $stmt = $conn->prepare("SELECT * FROM `damage_electric` WHERE new_id=? AND done_elc_status=? ORDER BY done_elc_date DESC");
                      $stmt->bind_param("ss", $new_id,$done);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while($row = $result->fetch_assoc())
                    {
                      $dam_id= $row['dam_elc_id'];
                      $dam_date = date_format(date_create($row['dam_elc_date']), 'd/m/Y');
                      $rep_date = date_format(date_create($row['rep_elc_date']), 'd/m/Y');
                      $done_date = date_format(date_create($row['done_elc_date']), 'd/m/Y');
                      $u++
                  ?>
                    <tr align="center">
                      <td><?php echo $u; ?></td>
                      <td><?php echo $dam_date; ?></td>
                      <td><?php echo $rep_date; ?></td>
                      <td><?php echo $done_date; ?></td>
                      <td align="center">
                        <?php include ('reporting_electric_detail.php'); ?>
                        <a href="#edit<?php echo $dam_id; ?>" data-toggle="modal" class="btn btn-info btn-sm"><i class='fa fa-bullseye'></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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
