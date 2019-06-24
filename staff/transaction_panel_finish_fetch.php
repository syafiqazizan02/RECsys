<?php

  include('dbconnection.php');

  $lis_barcode = $_REQUEST['lis_barcode'];

  $query = mysqli_query($conn, "SELECT cust.cust_name as cus_name, cat.fac_name as faci_name, TIME(used.list_start)  as rve_time
  FROM `used_list` as used
  JOIN `facility_category` as cat ON used.fac_id=cat.fac_id
  JOIN `used_start` as start ON used.start_id=start.start_id
  JOIN `user_customer` as cust ON start.cust_id=cust.cust_id
  AND used.list_barcode = '$lis_barcode'");
  $data = mysqli_fetch_assoc($query);

  $cus_name = $data['cus_name'];
  $faci_name = $data['faci_name'];
  $rve_time = $data['rve_time'];

  echo json_encode($data);

?>
