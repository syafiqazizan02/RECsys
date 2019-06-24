<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>
<?php include "../qrcode/libs/phpqrcode/qrlib.php"; ?>

<body class="app sidebar-mini rtl">

  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>TRANSACTION</h4><small><span id="date_time"></span></small>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Transaction</li>
        <li class="breadcrumb-item active">Queue Facilities</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Queue Facilities</h5>
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
              <div class="table-responsive">
                <table width="100%" class="table table-hover table-bordered">
                  <thead bgcolor=#f8f8f8>
                    <tr align="center" color="">
                      <th>No</th>
                      <th>Facilities Code</th>
                      <th>Facilities Category</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include "dbconnection.php";

                    $cust_id = $id;
                    $list_status = 0;
                    $no = 0;

                    $stmt3 = $conn->prepare("SELECT start.start_random as start_random, start.start_date, used.list_id as list_id, used.list_barcode as list_barcode, category.fac_name as fac_name
                      FROM `used_list` AS used
                      JOIN `facility_category` AS category ON used.fac_id=category.fac_id
                      JOIN `used_start` AS start ON used.start_id=start.start_id
                      AND start.cust_id =? AND used.list_status=? ORDER BY start.start_date ASC");
                      $stmt3->bind_param("ss", $cust_id, $list_status);
                      $stmt3->execute();
                      $result3 = $stmt3->get_result();

                      while($row3 = $result3->fetch_assoc())
                      {
                        $list_barcode = $row3['list_barcode'];
                        $fac_name = $row3['fac_name'];
                        $start_random = $row3['start_random'];
                        $start_date = date_format(date_create($row3 ['start_date']), 'd/m/Y');
                        $start_time = date_format(date_create($row3 ['start_date']), ' h:i A');
                        $list_id = $row3['list_id'];
                        $no++;
                        ?>
                        <tr align="center">
                          <td><?php echo $no ;?></td>
                          <td><?php echo $list_barcode ;?></td>
                          <td><?php echo $fac_name ;?></td>
                          <td><button class="btn btn-info btn-sm" onclick="window.location.href='transaction_queue_qrcode.php?list_id=<?php echo $list_id;?>'"><i class='fa fa-bullseye'></i></button></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
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
