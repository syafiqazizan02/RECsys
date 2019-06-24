<?php

  function kayak(){
    include "dbconnection.php";

    $fac_id = 3;
    $new_damage = 1;

    $stmt1 = $conn->prepare("SELECT * FROM `facility_new` WHERE fac_id=? AND new_damage=?");
    $stmt1->bind_param("ss", $fac_id, $new_damage);
    $stmt1->execute();
    $stmt1->store_result();
    $total1 = $stmt1->num_rows;

    if ($total1==0) {
      echo "0 Facilities";
    } else {
      echo $total1." Facilities";
    }

  }

  function paddle(){
    include "dbconnection.php";

    $fac_id = 1;
    $new_damage = 1;

    $stmt2 = $conn->prepare("SELECT * FROM `facility_new` WHERE fac_id=? AND new_damage=?");
    $stmt2->bind_param("ss", $fac_id, $new_damage);
    $stmt2->execute();
    $stmt2->store_result();
    $total2 = $stmt2->num_rows;

    if ($total2==0) {
      echo "0 Facilities";
    } else {
      echo $total2." Facilities";
    }

  }

function electric(){
  include "dbconnection.php";

  $fac_id = 2;
  $new_damage = 1;

  $stmt3 = $conn->prepare("SELECT * FROM `facility_new` WHERE fac_id=? AND new_damage=?");
  $stmt3->bind_param("ss", $fac_id, $new_damage);
  $stmt3->execute();
  $stmt3->store_result();
  $total3 = $stmt3->num_rows;

  if ($total3==0) {
    echo "0 Facilities";
  } else {
    echo $total3." Facilities";
  }

}

function extreme(){
  include "dbconnection.php";

  $fac_status = 1;

  $stmt4 = $conn->prepare("SELECT * FROM `facility_category` WHERE fac_status=?");
  $stmt4->bind_param("s", $fac_status);
  $stmt4->execute();
  $stmt4->store_result();
  $total4 = $stmt4->num_rows;

  if ($total4==0) {
    echo "0 Facilities";
  } else {
    echo $total4." Facilities";
  }

}


?>
