<?php

  include('dbconnection.php');

  $cust_ic = $_REQUEST['cust_ic'];

  $query = mysqli_query($conn, "SELECT cust_id, cust_ic, cust_name, cust_email, cust_contact FROM `user_customer` WHERE cust_ic = '$cust_ic'");
  $data = mysqli_fetch_assoc($query);
  $cust_id = $data['cust_id'];
  $cust_ic = $data['cust_ic'];
  $cust_name = $data['cust_name'];
  $cust_email = $data['cust_email'];
  $cust_contact = $data['cust_contact'];
  echo json_encode($data);

?>
