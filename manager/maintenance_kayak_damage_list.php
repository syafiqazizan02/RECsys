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
        <li class="breadcrumb-item active">Damage Kayak</li>
      </ul>
    </div>
    <?php include "maintenance_kayak_bar.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="card">
            <h5 class="card-header">Damage Kayak</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-9">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-lg-1">
                  Search:
                </div>
                <div class="col-lg-2">
                  <script src="../js/application.js"></script>
                  <input type="search" class="form-control form-control-sm" name="filter" value="" id="filter">
                </div>
              </div><br />
              <table class="table table-hover table-bordered">
                <thead bgcolor=#f8f8f8>
                  <tr align="center">
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Kayak Code</th>
                    <th colspan="5"><center>Damage Problem</center></th>
                    <th rowspan="2">Damage Date</th>
                    <th rowspan="2">Report</th>
                    <th rowspan="2">Action</th>
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
                  date_default_timezone_set('Asia/Kuala_Lumpur');
                  $rep_date =  date("Y/m/d");

                  $repStatus = 0;
                  $doneStatus = 0;
                  $v = 0;

                  $stmt = $conn->prepare("SELECT  damage.dam_kyk_id as dam_id, damage.dam_kyk_date as dam_date, damage.dam_kyk_blade as dam_blade, damage.dam_kyk_seat as dam_seat, damage.dam_kyk_hatch as dam_hatch,
                    damage.dam_kyk_crack as dam_crack, damage.dam_kyk_leak as dam_leak, damage.rep_kyk_status as rep_status,
                    facility.new_id as new_id, facility.new_code as new_code
                    FROM `damage_kayak` AS damage
                    JOIN `facility_new` AS facility ON damage.new_id=facility.new_id
                    AND  damage.rep_kyk_status=? AND damage.done_kyk_status=? ORDER BY damage.dam_kyk_date ASC");
                    $stmt->bind_param("ss", $repStatus, $doneStatus);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while($row = $result->fetch_assoc())
                    {
                      $new_id= $row['new_id'];
                      $new_code = $row['new_code'];
                      $dam_id = $row['dam_id'];
                      $dam_date = date_format(date_create($row['dam_date']), 'd/m/Y');
                      $dam_blade = $row['dam_blade'];
                      $dam_seat = $row['dam_seat'];
                      $dam_hatch = $row['dam_hatch'];
                      $dam_crack = $row['dam_crack'];
                      $dam_leak = $row['dam_leak'];
                      $rep_status = $row['rep_status'];
                      $v++;
                      ?>
                      <tr align="center">
                        <td><?php echo $v; ?></td>
                        <td><?php echo $new_code; ?></td>
                        <td>
                          <?php
                          if($dam_blade==1){
                            echo "<font color='#cc0000'><b><i class='fa fa-times'></i></b></font>";
                          }
                          else{
                            echo "<b><i class='fa fa-check'></i></b>";
                          }
                          ?>
                        </td>
                        <td>
                          <?php
                          if($dam_seat==1){
                            echo "<font color='#cc0000'><b><i class='fa fa-times'></i></b></font>";
                          }
                          else{
                            echo "<b><i class='fa fa-check'></i></b>";
                          }
                          ?>
                        </td>
                        <td>
                          <?php
                          if($dam_hatch==1){
                            echo "<font color='#cc0000'><b><i class='fa fa-times'></i></b></font>";
                          }
                          else{
                            echo "<b><i class='fa fa-check'></i></b>";
                          }
                          ?>
                        </td>
                        <td>
                          <?php
                          if($dam_crack==1){
                            echo "<font color='#cc0000'><b><i class='fa fa-times'></i></b></font>";
                          }
                          else{
                            echo "<b><i class='fa fa-check'></i></b>";
                          }
                          ?>
                        </td>
                        <td>
                          <?php
                          if($dam_leak==1){
                            echo "<font color='#cc0000'><b><i class='fa fa-times'></i></b></font>";
                          }
                          else{
                            echo "<b><i class='fa fa-check'></i></b>";
                          }
                          ?>
                        </td>
                        <td><?php echo $dam_date ?></td>
                        <td>
                          <form action='maintenance_kayak_status.php' method='post' >

                            <input type="hidden" name="rep_date" value="<?php echo $rep_date; ?>">
                            <input type="hidden" name="dam_id" value="<?php echo $dam_id?>">
                            <?php
                            if($rep_status==1){
                              echo "<a onclick='return confirm(\"Are You Sure?\");'><button class='btn btn-danger btn-sm' name='cancel'><i class='fa fa-trash'></i></button></a>";
                            }
                            else{
                              echo "<a onclick='return confirm(\"Are You Sure?\");'><button class='btn btn-warning btn-sm' style='color:#ffffff;' name='repair' id='popoverInfo' rel='popover' data-trigger='hover' data-placement='top' data-original-title='' data-content='Record the facilities that need to be repaired!'><i class='fa fa-fw fa-lg fa-check-circle'></i>Repair</button></a>";
                            }
                            ?>
                          </form>
                        </td>
                        <td><a href="maintenance_kayak_damage_delete.php?new_id=<?php echo $new_id; ?>&&dam_id=<?php echo $dam_id; ?>" onclick="return confirm('Are you sure?');"><button  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
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
