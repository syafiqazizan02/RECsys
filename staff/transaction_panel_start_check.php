<?php

  include('dbconnection.php');

  if(isset($_POST["list_barcode"]))
  {
    $list_barcode = mysqli_real_escape_string($conn, $_POST["list_barcode"]);
    $query = "SELECT * FROM `used_list` WHERE list_barcode = '".$list_barcode."' AND list_status=0";
    $result = mysqli_query($conn, $query);
    echo mysqli_num_rows($result);
  }

?>
