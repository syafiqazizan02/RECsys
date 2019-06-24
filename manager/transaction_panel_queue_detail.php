<!-- modal-->
<div class="modal fade" id="view<?php echo $start_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" class="modal-header">TRANSACTION <small>Queue Detail</small></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php

        include "dbconnection.php";

          $stmt2 = $conn->prepare("SELECT start.start_id as start_id, start.start_random as start_random, start.start_date as start_date,  customer.cust_ic as cust_ic, customer.cust_name as cust_name, customer.cust_email as cust_email, customer.cust_contact as cust_contact
          FROM `used_start` AS start
          JOIN `user_customer` AS customer ON start.cust_id=customer.cust_id AND start.start_id=?");

          $stmt2->bind_param("s", $start_id);
          $stmt2->execute();
          $result2 = $stmt2->get_result();
          $row2 = $result2->fetch_assoc();

          $start_random =  $row2 ['start_random'];
          $start_date = date_format(date_create($row2 ['start_date']), 'd/m/Y');
          $start_time = date_format(date_create($row2 ['start_date']), 'g:i A');
          ?>
          <div class="col-lg-3">
          </div>
          <div class="col-lg-9">
            <aside class="profile-nav alt">
              <section class="card">
                <div class="card-header user-header alt bg-dark">
                  <div class="media">
                    <div class="media-body">
                      <h4 class="text-light display-6">Queue ID : <?php echo $start_random ; ?></h4>
                    </div>
                  </div>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <h5><i class="fa fa-calendar"></i>  Reserve Date : &nbsp;<span class="badge badge-success"><?php echo $start_date ; ?></span></h5>
                  </li>
                  <li class="list-group-item">
                    <h5><i class="fa fa-clock-o"></i>  Reserve Time : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-warning"><?php echo $start_time ; ?></span></h5>
                  </li>
                </ul>
              </section>
            </aside>
          </div><br>
          <div class="col-lg-12">
            <table width="100%" class="table table-hover table-bordered">
              <thead bgcolor=#f8f8f8>
                <tr align="center">
                  <th>No.</th>
                  <th>Facilities Code</th>
                  <th>Facilities Category</th>
                  <th>Facilities Status</th>
                </tr>
              </thead>
              <tbody>
                <?php

                include "dbconnection.php";

                  $v =0;

                $stmt3 = $conn->prepare("SELECT used.list_barcode as list_barcode, used.list_status as list_status, category.fac_name as fac_name
                  FROM `used_list` AS used
                  JOIN `facility_category` AS category ON used.fac_id=category.fac_id
                  JOIN `used_start` AS start ON used.start_id=start.start_id
                  AND used.start_id =?");
                  $stmt3->bind_param("s", $start_id);
                  $stmt3->execute();
                  $result3 = $stmt3->get_result();

                  while($row3 = $result3->fetch_assoc())
                  {
                    $list_barcode = $row3['list_barcode'];
                    $fac_name = $row3['fac_name'];
                    $list_status = $row3['list_status'];
                    $v++;
                    ?>
                    <tr align="center">
                      <td><?php echo $v; ?></td>
                      <td><?php echo $list_barcode ;?></td>
                      <td><?php echo $fac_name ;?></td>
                      <td align="center">
                        <?php
                        if($list_status == 1){
                          echo "<p style='color:  #cc7a00; font-weight: bold;'>Start</p>";
                        }elseif ($list_status == 2) {
                          echo "<p style='color: #006600; font-weight: bold;'>Finish</p>";
                        }else{
                          echo "<p style='color: #992600; font-weight: bold;'>Reserve</p>";
                        }
                        ?>
                      </td>
                    </tr>
                  <?php }?>

                </tbody>
              </table>
            </div>

          </div>
          <div class="modal-footer">
            &nbsp;&nbsp;
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal -->
