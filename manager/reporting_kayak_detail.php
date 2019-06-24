<!-- modal-->
<div class="modal fade" id="edit<?php echo $dam_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" class="modal-header">MAINTENANCE <small>Kayak<small></h5>
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
                      $stmt3 = $conn->prepare("SELECT  damage.dam_kyk_id as dam_id, damage.dam_kyk_blade as dam_blade, damage.dam_kyk_hatch as dam_hatch, damage.dam_kyk_seat as dam_seat, damage.dam_kyk_crack as dam_crack, damage.dam_kyk_leak as dam_leak,
                      damage.done_date_blade as date_blade, damage.done_date_hatch as date_hatch, damage.done_date_seat as date_seat, damage.done_date_crack as date_crack, damage.done_date_leak as date_leak,
                      damage.done_price_blade as price_blade, damage.done_price_hatch as price_hatch, damage.done_price_seat as price_seat, damage.done_price_crack as price_crack, damage.done_price_leak as price_leak,
                      damage.done_kyk_price as done_price, facility.new_id as new_id, facility.new_code as new_code
                      FROM `damage_kayak` AS damage
                      JOIN `facility_new` AS facility ON damage.new_id=facility.new_id
                      AND  damage.dam_kyk_id=? ");
                      $stmt3->bind_param("s", $dam_id);
                      $stmt3->execute();
                      $result3 = $stmt3->get_result();

                      while($trow = $result3->fetch_assoc())
                      {
                        $new_id= $trow['new_id'];
                        $new_code = $trow['new_code'];
                        $dam_id = $trow['dam_id'];
                        $done_price = $trow['done_price'];

                        $dam_blade = $trow['dam_blade'];
                        $dam_hatch = $trow['dam_hatch'];
                        $dam_seat = $trow['dam_seat'];
                        $dam_crack = $trow['dam_crack'];
                        $dam_leak = $trow['dam_leak'];

                        $date_blade = date_format(date_create($trow['date_blade']), 'd/m/Y');
                        $date_hatch = date_format(date_create($trow['date_hatch']), 'd/m/Y');
                        $date_seat = date_format(date_create($trow['date_seat']), 'd/m/Y');
                        $date_crack = date_format(date_create($trow['date_crack']), 'd/m/Y');
                        $date_leak = date_format(date_create($trow['date_leak']), 'd/m/Y');

                        $price_blade = $trow['price_blade'];
                        $price_hatch = $trow['price_hatch'];
                        $price_seat = $trow['price_seat'];
                        $price_crack = $trow['price_crack'];
                        $price_leak = $trow['price_leak'];

                        ?>
                        <?php
                        if($dam_blade==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Blade</p></td>";
                          echo "<td><p>$date_blade</p></td>";
                          echo "<td><p>RM $price_blade</p></td>";
                          echo "</tr>";
                        }
                        if($dam_hatch==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Hatch</p></td>";
                          echo "<td><p>$date_hatch</p></td>";
                          echo "<td><p>RM $price_hatch</p></td>";
                          echo "</tr>";
                        }
                        if($dam_seat==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Seat</p></td>";
                          echo "<td><p>$date_seat</p></td>";
                          echo "<td><p>RM $price_seat</p></td>";
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
