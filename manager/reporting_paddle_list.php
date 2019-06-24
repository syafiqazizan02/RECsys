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
        <li class="breadcrumb-item active">History Paddle Boat</li>
      </ul>
    </div>
    <?php include "maintenance_paddle_bar.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">History Paddle Boat</h5>
            <div class="card-body">
              <table class="table table-hover table-bordered" id="data-table">
                <thead bgcolor=#f8f8f8>
                  <tr align="center">
                    <th>No.</th>
                    <th>Boat Code</th>
                    <th>Boat Model</th>
                    <th>Receive Cost</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $u=0;
                    $fac_id=1;

                    $stmt = $conn->prepare("SELECT * FROM `facility_new` WHERE fac_id=?");
                    $stmt->bind_param("s", $fac_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while($row = $result->fetch_assoc())
                    {
                      $new_id = $row['new_id'];
                      $new_code = $row['new_code'];
                      $new_model = $row['new_model'];
                      $new_price = $row['new_price'];
                      $u++
                  ?>
                    <tr align="center">
                      <td><?php echo $u; ?></td>
                      <td><?php echo $new_code; ?></td>
                      <td><?php echo $new_model; ?></td>
                      <td>RM <?php echo $new_price; ?></td>
                      <td align="center">
                        <a href="reporting_paddle_view.php?new_id=<?php echo $new_id; ?>" ><button type="submit" class="btn btn-info btn-sm"><i class="fa fa-bullseye"></i></button></a>
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
