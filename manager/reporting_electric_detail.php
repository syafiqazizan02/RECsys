<!-- modal-->
<div class="modal fade" id="edit<?php echo $dam_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" class="modal-header">MAINTENANCE <small>Electric Boat</small></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
          <div class="modal-body">
            <div class="col-lg-12"><br />
              <table class="table table-bordered" class="table table-sm">
                <thead bgcolor=#f8f8f8>
                  <tr align="center"  bgcolor=#f8f8f8>
                    <th><b>Damage Problem</b></th>
                    <th><b>Repair Date</b></th>
                    <th><b>Repair Price</b></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $stmt3 = $conn->prepare("SELECT  damage.dam_elc_id as dam_id, damage.dam_elc_canopy as dam_canopy, damage.dam_elc_pole as dam_pole, damage.dam_elc_seat as dam_seat,damage.dam_elc_motor as dam_motor, damage.dam_elc_crack as dam_crack, damage.dam_elc_leak as dam_leak,
                      damage.done_date_canopy as date_canopy, damage.done_date_pole as date_pole, damage.done_date_seat as date_seat,damage.done_date_motor as date_motor, damage.done_date_crack as date_crack, damage.done_date_leak as date_leak,
                      damage.done_price_canopy as price_canopy, damage.done_price_pole as price_pole, damage.done_price_seat as price_seat,damage.done_price_motor as price_motor, damage.done_price_crack as price_crack, damage.done_price_leak as price_leak,
                      damage.done_elc_price as done_price, facility.new_id as new_id, facility.new_code as new_code
                      FROM `damage_electric` AS damage
                      JOIN `facility_new` AS facility ON damage.new_id=facility.new_id
                      AND  damage.dam_elc_id=? ");
                      $stmt3->bind_param("s", $dam_id);
                      $stmt3->execute();
                      $result3 = $stmt3->get_result();

                      while($trow = $result3->fetch_assoc())
                      {
                        $new_id= $trow['new_id'];
                        $new_code = $trow['new_code'];
                        $dam_id = $trow['dam_id'];
                        $done_price = $trow['done_price'];

                        $dam_canopy = $trow['dam_canopy'];
                        $dam_pole = $trow['dam_pole'];
                        $dam_seat = $trow['dam_seat'];
                        $dam_motor = $trow['dam_motor'];
                        $dam_crack = $trow['dam_crack'];
                        $dam_leak = $trow['dam_leak'];

                        $date_canopy = date_format(date_create($trow['date_canopy']), 'd/m/Y');
                        $date_pole = date_format(date_create($trow['date_pole']), 'd/m/Y');
                        $date_seat = date_format(date_create($trow['date_seat']), 'd/m/Y');
                        $date_motor = date_format(date_create($trow['date_motor']), 'd/m/Y');
                        $date_crack = date_format(date_create($trow['date_crack']), 'd/m/Y');
                        $date_leak = date_format(date_create($trow['date_leak']), 'd/m/Y');

                        $price_canopy = $trow['price_canopy'];
                        $price_pole = $trow['price_pole'];
                        $price_seat = $trow['price_seat'];
                        $price_motor = $trow['price_motor'];
                        $price_crack = $trow['price_crack'];
                        $price_leak = $trow['price_leak'];

                        ?>
                        <?php
                        if($dam_canopy==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Canopy</p></td>";
                          echo "<td><p>$date_canopy</p></td>";
                          echo "<td><p>RM $price_canopy</p></td>";
                          echo "</tr>";
                        }
                        if($dam_pole==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Pole</p></td>";
                          echo "<td><p>$date_pole</p></td>";
                          echo "<td><p>RM $price_pole</p></td>";
                          echo "</tr>";
                        }
                        if($dam_seat==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Seat</p></td>";
                          echo "<td><p>$date_seat</p></td>";
                          echo "<td><p>RM $price_seat</p></td>";
                          echo "</tr>";
                        }
                        if($dam_motor==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Motor</p></td>";
                          echo "<td><p>$date_motor</p></td>";
                          echo "<td><p>RM $price_motor</p></td>";
                          echo "</tr>";
                        }
                        if($dam_crack==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Crack</p></td>";
                          echo "<td><p>$date_crack</p></td>";
                          echo "<td><p>RM $price_crack</p></td>";
                          echo "</tr>";
                        }
                        if($dam_leak==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Leak</p></td>";
                          echo "<td><p>$date_leak</p></td>";
                          echo "<td><p>RM $price_leak</p></td>";
                          echo "</tr>";
                        }
                      } ?>
                      <tr bgcolor=#f8f8f8>
                        <td colspan="2" align="right"><b>Total: </b></td>
                        <td align="center"><b>RM <?php  echo $done_price;?></b></td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              &nbsp;&nbsp;&nbsp;
            </div>
        </div>
      </div>
    </div>
    <!-- /.modal -->
