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
              <?php
              include "dbconnection.php";

              $list_id = @$_REQUEST['list_id'];

              $stmt2 = $conn->prepare("SELECT start.start_random as start_random, start.start_date, used.list_barcode as list_barcode, used.list_start as list_start, used.list_finish as list_finish,
                category.fac_id as fac_id, category.fac_name as fac_name
                FROM `used_list` AS used
                JOIN `facility_category` AS category ON used.fac_id=category.fac_id
                JOIN `used_start` AS start ON used.start_id=start.start_id
                AND used.list_id=?");
                $stmt2->bind_param("s", $list_id);
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                $row2 = $result2->fetch_assoc();

                $list_barcode = $row2['list_barcode'];
                $fac_id = $row2['fac_id'];
                $fac_name = $row2['fac_name'];
                $start_random = $row2['start_random'];
                $start_date = date_format(date_create($row2 ['start_date']), 'd/m/Y');
                $start_time = date_format(date_create($row2 ['start_date']), 'h:i A');
                $list_start = date_format(date_create($row2 ['list_start']), 'h:i A');
                $list_finish = date_format(date_create($row2 ['list_finish']), 'h:i A');
                ?>
                <div class="row">
                  <div class="col-md-2">
                    <input type="hidden" id=list_id value="<?php if(isset($_GET['list_id']) && $_GET['list_id']=="error"){
                    }else{echo $_GET['list_id'];  }?>">
                    <input type="hidden" id="fac_id" name="fac_id" value="<?php echo $fac_id;?>">
                  </div>
                  <div class="col-md-8"><br />
                    <table class="table table-hover table-bordered" >
                      <thead bgcolor=#f8f8f8 align="center">
                        <tr>
                          <th colspan="2"><label>Facalities Detail</label></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td width="36%"><b>Facilities Code :</b></td>
                          <td align="center" width="64%"><?php echo $list_barcode; ?></td>
                        </tr>
                        <tr>
                          <td width="36%"><b>Facilities Category :</b></td>
                          <td align="center" width="64%"><?php echo $fac_name; ?></td>
                        </tr>
                        <tr>
                          <td width="36%"><b>Reserve Date :</b></td>
                          <td align="center" width="64%"><?php echo $start_date; ?></td>
                        </tr>
                        <tr>
                          <td width="36%"><b>Queue Time :</b></td>
                          <td align="center" width="64%"><?php echo $start_time; ?></td>
                        </tr>
                        <tr>
                          <td width="36%"><b>Start Time :</b></td>
                          <td align="center" width="64%"><?php echo $list_start; ?></td>
                        </tr>
                        <tr>
                          <td width="36%"><b>Finish Time :</b></td>
                          <td align="center" width="64%"><?php echo $list_finish; ?></td>
                        </tr>
                        <tr>
                          <td width="36%"><b>Rating :</b></td>
                          <td align="center" width="64%"><span id="business_list"></td>
                          </tr>
                        </tbody>
                      </table>
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
