<?php

  include('dbconnection.php');

  $list_barcode = $_REQUEST['list_barcode'];

  $query = mysqli_query($conn, "SELECT cust.cust_name as cust_name, cat.fac_name as fac_name, TIME(start.start_date)  as reserve_time
  FROM `used_list` as used
  JOIN `facility_category` as cat ON used.fac_id=cat.fac_id
  JOIN `used_start` as start ON used.start_id=start.start_id
  JOIN `user_customer` as cust ON start.cust_id=cust.cust_id
  AND used.list_barcode = '$list_barcode'");
  $data = mysqli_fetch_assoc($query);

  $cust_name = $data['cust_name'];
  $fac_name = $data['fac_name'];
  $reserve_time = $data['reserve_time'];

  echo json_encode($data);

?>
