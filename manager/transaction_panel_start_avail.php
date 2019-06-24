<?php

  include('dbconnection.php');

  if(isset($_POST["list_barcode"]))
  {
    $list_barcode = mysqli_real_escape_string($conn, $_POST["list_barcode"]);

    $query1 = "SELECT fac_id FROM `used_list` WHERE list_barcode = '".$_POST["list_barcode"]."'";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_assoc($result1);
       $fac_id = $row1["fac_id"];

    $query = "SELECT fac_use FROM `facility_category` WHERE fac_id= '".$fac_id."'";
    $result = mysqli_query($conn, $query);
    $row1 = mysqli_fetch_assoc($result);
    echo $fac_used= $row1["fac_use"];
  }

?>
