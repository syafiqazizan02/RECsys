<!-- modal-->
<div class="modal fade" id="edit<?php echo $dam_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <?php
        include "dbconnection.php";

        $stmt2 = $conn->prepare("SELECT  damage.dam_elc_id as dam_id, damage.dam_elc_date as dam_date, damage.rep_elc_date as rep_date, facility.new_id as new_id, facility.new_code as new_code
                                 FROM `damage_electric` AS damage
                                 JOIN `facility_new` AS facility ON damage.new_id=facility.new_id
                                 AND dam_elc_id=?");
        $stmt2->bind_param("s", $dam_id);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $erow = $result2->fetch_assoc();

        $damId = $erow['dam_id'];
        $damDate = date_format(date_create($erow['dam_date']), 'd/m/Y');
        $repDate = date_format(date_create($erow['rep_date']), 'd/m/Y');
        $newId = $erow['new_id'];
        $newCode = $erow['new_code'];

        ?>
        <div class="modal-header">
          <h5 class="modal-title" class="modal-header">MAINTENANCE <small>Done Detail</small></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form action="maintenance_electric_repair_update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="modal-body">
            <div class="col-lg-12">
              <table class="table table-bordered" class="table table-sm">
                <thead bgcolor=#f8f8f8>
                  <tr align="center">
                    <th colspan="2"><h5>Electric Boat : <?php echo $newCode ?></h5></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="30%"><b>Damage Date</b></td>
                    <td width="70%"><?php echo $damDate ?></td>
                  </tr>
                  <tr>
                    <td width="30%"><b>Repair Date</b></td>
                    <td width="70%"><?php echo $repDate ?></td>
                  </tr>
                  <tr align="center"  bgcolor=#f8f8f8>
                    <td><b>Damage Problem:</b></td>
                    <td><b>Repair Price (RM):</b></td>
                  </tr>
                  <?php
                      $stmt3 = $conn->prepare("SELECT  damage.dam_elc_id as dam_id, damage.dam_status_canopy as dam_canopy, damage.dam_status_pole as dam_pole, damage.dam_status_seat as dam_seat,damage.dam_status_motor dam_motor, damage.dam_status_crack as dam_crack, damage.dam_status_leak as dam_leak, facility.new_id as new_id, facility.new_code as new_code
                                               FROM `damage_electric` AS damage
                                               JOIN `facility_new` AS facility ON damage.new_id=facility.new_id
                                               AND  damage.dam_elc_id=? ");
                      $stmt3->bind_param("s", $damId);
                      $stmt3->execute();
                      $result3 = $stmt3->get_result();

                      while($trow = $result3->fetch_assoc())
                      {
                        $new_id= $trow['new_id'];
                        $new_code = $trow['new_code'];
                        $dam_id = $trow['dam_id'];

                        $dam_canopy = $trow['dam_canopy'];
                        $dam_pole = $trow['dam_pole'];
                        $dam_seat = $trow['dam_seat'];
                        $dam_motor = $trow['dam_motor'];
                        $dam_crack = $trow['dam_crack'];
                        $dam_leak = $trow['dam_leak'];

                        ?>
                        <?php
                        if($dam_canopy==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Canopy</p></td>";
                          echo "<td><input type='number' name='done_canopy' class='form-control'></td>";
                          echo "</tr>";
                        }else{
                          echo "<input type='hidden' name='done_canopy' class='form-control'>";
                        }
                        if($dam_pole==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Pole</p></td>";
                          echo "<td><input type='number' name='done_pole' class='form-control'></td>";
                          echo "</tr>";
                        }else{
                          echo "<input type='hidden' name='done_pole' class='form-control'>";
                        }
                        if($dam_seat==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Seat</p></td>";
                          echo "<td><input type='number' name='done_seat' class='form-control'></td>";
                          echo "</tr>";
                        }else{
                          echo "<input type='hidden' name='done_seat' class='form-control'>";
                        }
                        if($dam_motor==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Motor</p></td>";
                          echo "<td><input type='number' name='done_motor' class='form-control'></td>";
                          echo "</tr>";
                        }else{
                          echo "<input type='hidden' name='done_motor' class='form-control'>";
                        }
                        if($dam_crack==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Crack</p></td>";
                          echo "<td><input type='number' name='done_crack' class='form-control'></td>";
                          echo "</tr>";
                        }else{
                          echo "<input type='hidden' name='done_crack' class='form-control'>";
                        }
                        if($dam_leak==1){
                          echo "<tr align='center'>";
                          echo "<td><p>Leak</p></td>";
                          echo "<td><input type='number' name='done_leak' class='form-control'></td>";
                          echo "</tr>";
                        }else{
                          echo "<input type='hidden' name='done_leak' class='form-control'>";
                        }
                      } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="new_id" value="<?php echo $new_id;?>">
              <input type="hidden"  name="dam_id" value="<?php echo $dam_id;?>">
              <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
              <button class="btn btn-secondary btn-sm" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal -->
