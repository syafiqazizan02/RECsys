<?php

  include('dbconnection.php');

  $query = "SELECT * FROM `facility_category` WHERE fac_limit>0 AND fac_queue < fac_qty AND  fac_status = 0";
  $statement = $conn->prepare($query);

  if($statement->execute())
  {
    $result = $statement->get_result();
    $output = '';

    while($row = $result->fetch_assoc())
    {
      $output .= '
      <div class="col-sm-6 col-lg-4" style="margin-top:2px;margin-bottom:12px;">
          <div class="border-secondary" style="border:1px solid ; border-radius:5px; padding:10px; height:100px;" align="center" id="facilities_'.$row["fac_id"].'">
            <h5 class="text-primary">
              <div class="checkbox">
                <label><input type="checkbox" class="select_facilities" data-facilities_id="'.$row["fac_id"].'" data-facilities_name="'.$row["fac_name"].'" data-facilities_rate="'.$row["fac_rate"] .'" value="">&nbsp;&nbsp;'.$row["fac_name"].'</label>
              </div>
            </h5>
            <h5 class="text-danger">RM '.number_format($row["fac_rate"], 2).'</h5>
            <label class="text-secondary"><b>Availabe: '.($row["fac_limit"]-$row["fac_queue"]+$row["fac_use"]).'</b></label>
          </div>
        </div><br>
      ';
    }
    echo $output;
  }

?>
