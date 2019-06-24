<?php

  function queue(){
    include "dbconnection.php";

    $cust_id = $_SESSION['cust_id'];
    $list_status = 0;

    $stmt1 = $conn->prepare("SELECT * FROM `used_list` AS used
    JOIN `facility_category` AS category ON used.fac_id=category.fac_id
    JOIN `used_start` AS start ON used.start_id=start.start_id
    AND start.cust_id =? AND used.list_status=?");
    $stmt1->bind_param("ss", $cust_id, $list_status);
    $stmt1->execute();
    $stmt1->store_result();
    $total1 = $stmt1->num_rows;

    if ($total1==0) {
      echo "0 Facilities";
    } else {
      echo $total1." Facilities";
    }

  }

  function manage(){
    include "dbconnection.php";

    $cust_id = $_SESSION['cust_id'];
    $list_status = 1;

    $stmt2 = $conn->prepare("SELECT * FROM `used_list` AS used
    JOIN `facility_category` AS category ON used.fac_id=category.fac_id
    JOIN `used_start` AS start ON used.start_id=start.start_id
    AND start.cust_id =? AND used.list_status=?");
    $stmt2->bind_param("ss", $cust_id, $list_status);
    $stmt2->execute();
    $stmt2->store_result();
    $total2 = $stmt2->num_rows;

    if ($total2==0) {
      echo "0 Facilities";
    } else {
      echo $total2." Facilities";
    }

  }

function review(){
  include "dbconnection.php";

  $cust_id = $_SESSION['cust_id'];
  $list_status = 2;
  $list_review = 0;

  $stmt3 = $conn->prepare("SELECT * FROM `used_list` AS used
  JOIN `facility_category` AS category ON used.fac_id=category.fac_id
  JOIN `used_start` AS start ON used.start_id=start.start_id
  AND start.cust_id =? AND used.list_status=? AND used.list_review=?");
  $stmt3->bind_param("sss", $cust_id, $list_status, $list_review);
  $stmt3->execute();
  $stmt3->store_result();
  $total3 = $stmt3->num_rows;

  if ($total3==0) {
    echo "0 Facilities";
  } else {
    echo $total3." Facilities";
  }

}



?>
