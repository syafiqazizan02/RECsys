<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "dbconnection.php"; ?>

<body class="app sidebar-mini rtl">

  <main class="app-content">
    <div class="app-title">
      <div>
        <h4>TRANSACTION <small></small></h4>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Transaction</li>
        <li class="breadcrumb-item active">History Facilities</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">History Facilities</h5>
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
                <table class="table table-hover table-bordered">
                  <thead bgcolor=#f8f8f8>
                    <tr align="center">
                      <th>No.</th>
                      <th>Queue ID</th>
                      <th>Reserve Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $cust_id = $id;
                    $v =0;

                    $stmt = $conn->prepare("SELECT DISTINCT start.start_id as start_id, start.start_random as start_random, start.start_date as start_date
                      FROM `used_list` AS list
                      JOIN `used_start` AS start ON list.start_id=start.start_id
                      JOIN `user_customer` AS customer ON start.cust_id=customer.cust_id
                      AND start.cust_id =? ORDER BY start.start_id DESC");
                      $stmt->bind_param("s", $id);
                      $stmt->execute();
                      $result = $stmt->get_result();

                      while($row = $result->fetch_assoc())
                      {
                        $start_id = $row['start_id'];
                        $start_random = $row['start_random'];
                        $start_date = date_format(date_create($row['start_date']), 'd/m/Y');
                        $v++;
                        ?>
                        <tr align="center">
                          <td><?php //echo $v; ?><?php echo $start_id; ?></td>
                          <td><?php echo $start_random; ?></td>
                          <td><?php echo $start_date; ?></td>
                          <td><button class="btn btn-secondary btn-sm" class="" onclick="window.location.href='transaction_history_detail.php?start_id=<?php echo $start_id;?>'"><i class='fa fa-list'></i></button></td>
                        </tr>
                      <?php } ?>
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
