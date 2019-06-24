<?php

  include('dbconnection.php');

  if(isset($_POST["lis_barcode"]))
  {
    $lis_barcode = mysqli_real_escape_string($conn, $_POST["lis_barcode"]);
    $query = "SELECT * FROM `used_list` WHERE list_barcode = '".$lis_barcode."' AND list_status=1";
    $result = mysqli_query($conn, $query);
    echo mysqli_num_rows($result);
  }

?>
