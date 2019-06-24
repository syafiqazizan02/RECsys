<?php

  include('dbconnection.php');

  if(isset($_POST["cust_ic"]))
  {
    $cust_ic = mysqli_real_escape_string($conn, $_POST["cust_ic"]);
    $query = "SELECT * FROM `user_customer` WHERE cust_ic = '".$cust_ic."'";
    $result = mysqli_query($conn, $query);
    echo mysqli_num_rows($result);
  }

?>
