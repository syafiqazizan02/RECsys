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
        <li class="breadcrumb-item active">My Rating</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">My Rating</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8"><br />
                  <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                      <?php
                      $sid = @$_REQUEST['start_id'];
                      include "dbconnection.php";

                      $stmt2 = $conn->prepare("SELECT start.start_id as start_id, start.start_random as start_random, start.start_date as start_date,  customer.cust_ic as cust_ic, customer.cust_name as cust_name, customer.cust_email as cust_email, customer.cust_contact as cust_contact
                        FROM `used_start` AS start
                        JOIN `user_customer` AS customer ON start.cust_id=customer.cust_id AND start.start_id=?");

                        $stmt2->bind_param("s", $sid);
                        $stmt2->execute();
                        $result2 = $stmt2->get_result();
                        $row2 = $result2->fetch_assoc();

                        $start_random =  $row2 ['start_random'];
                        $start_date = date_format(date_create($row2 ['start_date']), 'd/m/Y');
                        $start_time = date_format(date_create($row2 ['start_date']), 'g:i A');
                        ?>
                        <aside class="profile-nav alt">
                          <section class="card">
                            <div class="card-header user-header alt bg-dark">
                              <div class="media">
                                <div class="media-body">
                                  <h4 class="text-light display-6" align="center">Queue ID : <?php echo $start_random ; ?></h4>
                                </div>
                              </div>
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                <h6><i class="fa fa-calendar"></i>  Reserve Date : &nbsp;<span class="badge badge-success"><?php echo $start_date ; ?></span></h6>
                              </li>
                              <li class="list-group-item">
                                <h6><i class="fa fa-clock-o"></i>  Reserve Tine : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-warning"><?php echo $start_time ; ?></span></h6>
                              </li>
                            </ul>
                          </section>
                        </aside>
                      </div>
                    </div><br>

                    <div class="row">
                      <div class="table-responsive">
                        <table width="100%" class="table table-hover table-bordered">
                          <thead bgcolor=#f8f8f8>
                            <tr align="center" color="">
                              <th>No</th>
                              <th>Facilities Code</th>
                              <th>Facilities Category</th>
                              <th>Start Time</th>
                              <th>Start Time</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php

                            $sid = @$_REQUEST['start_id'];
                            $v = 0;

                            $stmt3 = $conn->prepare("SELECT used.list_barcode as list_barcode, used.list_start as list_start, used.list_finish as list_finish, category.fac_name as fac_name
                              FROM `used_list` AS used
                              JOIN `facility_category` AS category ON used.fac_id=category.fac_id
                              JOIN `used_start` AS start ON used.start_id=start.start_id
                              AND used.start_id =?");
                              $stmt3->bind_param("s", $sid);
                              $stmt3->execute();
                              $result3 = $stmt3->get_result();

                              while($row3 = $result3->fetch_assoc())
                              {
                                $list_barcode = $row3['list_barcode'];
                                $fac_name = $row3['fac_name'];
                                $list_start = date_format(date_create($row3 ['list_start']), 'h:i A');
                               $list_finish = date_format(date_create($row3 ['list_finish']), 'h:i A');
                                $v++
                                ?>
                                <tr align="center">
                                  <td><?php echo $v; ?></td>
                                  <td><?php echo $list_barcode ;?></td>
                                  <td><?php echo $fac_name ;?></td>
                                  <td><?php echo $list_start ;?></td>
                                  <td><?php echo $list_finish ;?></td>
                                </tr>
                              <?php }?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
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
