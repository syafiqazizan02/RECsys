<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>

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
              <table class="table table-hover table-bordered" id="data-table">
                <thead bgcolor=#f8f8f8>
                  <tr align="center">
                    <th>No.</th>
                    <th>Queue ID</th>
                    <th>Reserve Date</th>
                    <th>Reserve Time</th>
                    <th>Customer Name</th>
                    <th>Quantity</th>
                    <th width="15%">Action</th>
                    <th>Print</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $list_status = 0;
                  $u=0;

                  $stmt = $conn->prepare("SELECT DISTINCT start.start_id as start_id, start.start_random as start_random, start.start_date as start_date, customer.cust_name as cust_name, COUNT(list.list_id) AS a
                  FROM `used_list` AS list
                  JOIN `used_start` AS start ON list.start_id=start.start_id
                  JOIN `user_customer` AS customer ON start.cust_id=customer.cust_id
                  AND list.list_status=? GROUP BY list.start_id ORDER BY start.start_id DESC");
                  $stmt->bind_param("s", $list_status);
                  $stmt->execute();
                  $result = $stmt->get_result();

                  while($row = $result->fetch_assoc())
                  {
                    $start_id = $row['start_id'];
                    $start_random = $row['start_random'];
                    $cust_name = $row['cust_name'];
                    $start_date = date_format(date_create($row['start_date']), 'd/m/Y');
                    $start_time = date_format(date_create($row['start_date']), 'g:i A');
                    $a = $row['a'];
                    $u++;
                    ?>
                    <tr align="center">
                      <td><?php echo $u; ?></td>
                      <td><?php echo $start_random; ?></td>
                      <td><?php echo $start_date; ?></td>
                      <td><?php echo $start_time; ?></td>
                      <td><?php echo $cust_name; ?></td>
                      <td><?php echo $a; ?></td>
                      <td>
                        <?php include ('transaction_panel_queue_detail.php'); ?>
                        <a href="#view<?php echo $start_id; ?>" data-toggle="modal" class="btn btn-info btn-sm"><i class='fa fa-bullseye'></i></a>
                        <a href="transaction_panel_queue_cancel.php?start_id=<?php echo $start_id; ?>" onclick="return confirm('Are you sure?');"><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                      </td>
                      <td align="center">
                        <form action="transaction_panel_queue_print.php" method="post" enctype="multipart/form-data" target="print_popup"  onsubmit="window.open('about:blank','print_popup','width=800,height=500');">
                          <input type="hidden" name="start_id" value="<?php echo $start_id; ?>">
                          <button type="submit" name="submit" class="btn btn-dark btn-sm"><i class="fa fa-print"></i></button>
                        </form>
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
