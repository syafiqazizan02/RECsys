<?php

  if(isset($_POST['checked']))
  {
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $dam_date =  date("Y-m-d H:i");

    if(!empty($_POST["dam_kyk_blade"]))
    {
      foreach($_POST["dam_kyk_blade"] as $a)
      {
        include "dbconnection.php";

        $dam_blade = 1;
        $status_blade = 1;
        $new_damage = 1;

        $stmt1 = $conn->prepare("SELECT * FROM `damage_kayak` WHERE new_id=? AND dam_kyk_date=?");
        $stmt1->bind_param("ss", $a, $dam_date);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        $row1 = $result1->fetch_row();

        if($row1){
          $stmt2 = $conn->prepare("UPDATE `damage_kayak` SET dam_kyk_blade=?, dam_status_blade=? WHERE new_id=? AND dam_kyk_date=?");
          $stmt2->bind_param("ssss", $dam_blade, $status_blade, $a, $dam_date);
          $stmt2->execute();
        }
        else{
          $stmt3 = $conn->prepare("SELECT new.fac_id as fac_id, cat.fac_qty as fac_qty, cat.fac_limit as fac_limit FROM `facility_new`AS new JOIN `facility_category` AS cat ON new.fac_id=cat.fac_id AND new_id=?");
          $stmt3->bind_param("s", $a);
          $stmt3->execute();
          $result3 = $stmt3->get_result();
          $row3 = $result3->fetch_assoc();

          $fac_id = $row3 ['fac_id'];
          $fac_qty = $row3 ['fac_qty'];
          $facQty = ($fac_qty - 1);
          $fac_limit = $row3 ['fac_limit'];
          $facLimit = ($fac_limit - 1);

          if($row3){
            $stmt4 = $conn->prepare("INSERT INTO `damage_kayak` (new_id, dam_kyk_blade, dam_status_blade, dam_kyk_date) VALUES ( ?, ?, ?, ?)");
            $stmt4->bind_param("ssss", $a, $dam_blade, $status_blade, $dam_date);
            $stmt4->execute();

            if($stmt4){
              $stmt5 = $conn->prepare("UPDATE  `facility_new` SET new_damage =? WHERE new_id = ?");
              $stmt5->bind_param("ss", $new_damage, $a);
              $stmt5->execute();

              $stmt6 = $conn->prepare("UPDATE `facility_category` SET fac_qty =?, fac_limit=? WHERE fac_id = ?");
              $stmt6->bind_param("sss", $facQty, $facLimit, $fac_id);
              $stmt6->execute();

              echo "<script> alert('Successful Checked!')</script>";
              echo "<script>window.location.href='maintenance_kayak_excellent_list.php';</script>";
            }
          }
        }
      }
    }

    if(!empty($_POST["dam_kyk_seat"]))
    {
      foreach($_POST["dam_kyk_seat"] as $b)
      {
        include "dbconnection.php";

        $dam_seat = 1;
        $status_seat = 1;
        $new_damage = 1;

        $stmt7 = $conn->prepare("SELECT * FROM `damage_kayak` WHERE new_id=? AND dam_kyk_date=?");
        $stmt7->bind_param("ss", $b, $dam_date);
        $stmt7->execute();
        $result7 = $stmt7->get_result();
        $row7 = $result7->fetch_row();

        if($row7){
          $stmt8 = $conn->prepare("UPDATE `damage_kayak` SET dam_kyk_seat=?, dam_status_seat=? WHERE new_id=? AND dam_kyk_date=?");
          $stmt8->bind_param("ssss", $dam_seat, $status_seat, $b, $dam_date);
          $stmt8->execute();
        }
        else{
          $stmt9 = $conn->prepare("SELECT new.fac_id as fac_id, cat.fac_qty as fac_qty, cat.fac_limit as fac_limit FROM `facility_new`AS new JOIN `facility_category` AS cat ON new.fac_id=cat.fac_id AND new_id=?");
          $stmt9->bind_param("s", $b);
          $stmt9->execute();
          $result9 = $stmt9->get_result();
          $row9 = $result9->fetch_assoc();

          $fac_id = $row9 ['fac_id'];
          $fac_qty = $row9 ['fac_qty'];
          $facQty = ($fac_qty - 1);
          $fac_limit = $row9 ['fac_limit'];
          $facLimit = ($fac_limit - 1);

          if($row9){
            $stmt10 = $conn->prepare("INSERT INTO `damage_kayak` (new_id, dam_kyk_seat, dam_status_seat, dam_kyk_date) VALUES ( ?, ?, ?, ?)");
            $stmt10->bind_param("ssss", $b, $dam_seat, $status_seat, $dam_date);
            $stmt10->execute();

            if($stmt10){
              $stmt11 = $conn->prepare("UPDATE  `facility_new` SET new_damage =? WHERE new_id = ?");
              $stmt11->bind_param("ss", $new_damage, $b);
              $stmt11->execute();

              $stmt12 = $conn->prepare("UPDATE `facility_category` SET fac_qty =?, fac_limit=? WHERE fac_id = ?");
              $stmt12->bind_param("sss", $facQty, $facLimit, $fac_id);
              $stmt12->execute();

              echo "<script> alert('Successful Checked!')</script>";
              echo "<script>window.location.href='maintenance_kayak_excellent_list.php';</script>";
            }
          }
        }
      }
    }

    if(!empty($_POST["dam_kyk_hatch"]))
    {
      foreach($_POST["dam_kyk_hatch"] as $c)
      {
        include "dbconnection.php";

        $dam_hatch = 1;
        $status_hatch = 1;
        $new_damage = 1;

        $stmt13 = $conn->prepare("SELECT * FROM `damage_kayak` WHERE new_id=? AND dam_kyk_date=?");
        $stmt13->bind_param("ss", $c, $dam_date);
        $stmt13->execute();
        $result13 = $stmt13->get_result();
        $row13 = $result13->fetch_row();

        if($row13){
          $stmt14 = $conn->prepare("UPDATE `damage_kayak` SET dam_kyk_hatch=?, dam_status_hatch=? WHERE new_id=? AND dam_kyk_date=?");
          $stmt14->bind_param("ssss", $dam_hatch, $status_hatch, $c, $dam_date);
          $stmt14->execute();
        }
        else{

          $stmt15 = $conn->prepare("SELECT new.fac_id as fac_id, cat.fac_qty as fac_qty, cat.fac_limit as fac_limit FROM `facility_new`AS new JOIN `facility_category` AS cat ON new.fac_id=cat.fac_id AND new_id=?");
          $stmt15->bind_param("s", $c);
          $stmt15->execute();
          $result15 = $stmt15->get_result();
          $row15 = $result15->fetch_assoc();

          $fac_id = $row15 ['fac_id'];
          $fac_qty = $row15 ['fac_qty'];
          $facQty = ($fac_qty - 1);
          $fac_limit = $row15 ['fac_limit'];
          $facLimit = ($fac_limit - 1);

          if($row15){
            $stmt16 = $conn->prepare("INSERT INTO `damage_kayak` (new_id, dam_kyk_hatch, dam_status_hatch, dam_kyk_date) VALUES ( ?, ?, ?, ?)");
            $stmt16->bind_param("ssss", $c, $dam_hatch, $status_hatch, $dam_date);
            $stmt16->execute();

            if($stmt16){
              $stmt17 = $conn->prepare("UPDATE  `facility_new` SET new_damage =? WHERE new_id = ?");
              $stmt17->bind_param("ss", $new_damage, $c);
              $stmt17->execute();

              $stmt18 = $conn->prepare("UPDATE `facility_category` SET fac_qty =?, fac_limit=? WHERE fac_id = ?");
              $stmt18->bind_param("sss", $facQty, $facLimit, $fac_id);
              $stmt18->execute();

              echo "<script> alert('Successful Checked!')</script>";
              echo "<script>window.location.href='maintenance_kayak_excellent_list.php';</script>";
            }
          }
        }
      }
    }

    if(!empty($_POST["dam_kyk_crack"]))
    {
      foreach($_POST["dam_kyk_crack"] as $e)
      {
        include "dbconnection.php";

        $dam_crack = 1;
        $status_crack = 1;
        $new_damage = 1;

        $stmt25 = $conn->prepare("SELECT * FROM `damage_kayak` WHERE new_id=? AND dam_kyk_date=?");
        $stmt25->bind_param("ss", $e, $dam_date);
        $stmt25->execute();
        $result25 = $stmt25->get_result();
        $row25 = $result25->fetch_row();

        if($row25){
          $stmt26 = $conn->prepare("UPDATE `damage_kayak` SET dam_kyk_crack=?, dam_status_crack=? WHERE new_id=? AND dam_kyk_date=?");
          $stmt26->bind_param("ssss", $dam_crack, $status_crack, $e, $dam_date);
          $stmt26->execute();
        }
        else{
          $stmt27 = $conn->prepare("SELECT new.fac_id as fac_id, cat.fac_qty as fac_qty, cat.fac_limit as fac_limit FROM `facility_new`AS new JOIN `facility_category` AS cat ON new.fac_id=cat.fac_id AND new_id=?");
          $stmt27->bind_param("s", $e);
          $stmt27->execute();
          $result27 = $stmt27->get_result();
          $row27 = $result27->fetch_assoc();

          $fac_id = $row27 ['fac_id'];
          $fac_qty = $row27 ['fac_qty'];
          $facQty = ($fac_qty - 1);
          $fac_limit = $row27 ['fac_limit'];
          $facLimit = ($fac_limit - 1);

          if($row27){
            $stmt28 = $conn->prepare("INSERT INTO `damage_kayak` (new_id, dam_kyk_crack, dam_status_crack, dam_kyk_date) VALUES ( ?, ?, ?, ?)");
            $stmt28->bind_param("ssss", $e, $dam_crack, $status_crack, $dam_date);
            $stmt28->execute();

            if($stmt28){
              $stmt29 = $conn->prepare("UPDATE  `facility_new` SET new_damage =? WHERE new_id = ?");
              $stmt29->bind_param("ss", $new_damage, $e);
              $stmt29->execute();

              $stmt30 = $conn->prepare("UPDATE `facility_category` SET fac_qty =?, fac_limit=? WHERE fac_id = ?");
              $stmt30->bind_param("sss", $facQty, $facLimit, $fac_id);
              $stmt30->execute();

              echo "<script> alert('Successful Checked!')</script>";
              echo "<script>window.location.href='maintenance_kayak_excellent_list.php';</script>";
            }
          }
        }
      }
    }

    if(!empty($_POST["dam_kyk_leak"]))
    {
      foreach($_POST["dam_kyk_leak"] as $f)
      {
        include "dbconnection.php";

        $dam_leak = 1;
        $status_leak = 1;
        $new_damage = 1;

        $stmt31 = $conn->prepare("SELECT * FROM `damage_kayak` WHERE new_id=? AND dam_kyk_date=?");
        $stmt31->bind_param("ss", $f, $dam_date);
        $stmt31->execute();
        $result31 = $stmt31->get_result();
        $row31 = $result31->fetch_row();

        if($row31){
          $stmt32 = $conn->prepare("UPDATE `damage_kayak` SET dam_kyk_leak=?, dam_status_leak=? WHERE new_id=? AND dam_kyk_date=?");
          $stmt32->bind_param("ssss", $dam_leak, $status_leak, $f, $dam_date);
          $stmt32->execute();
        }
        else{
          $stmt33 = $conn->prepare("SELECT new.fac_id as fac_id, cat.fac_qty as fac_qty, cat.fac_limit as fac_limit FROM `facility_new`AS new JOIN `facility_category` AS cat ON new.fac_id=cat.fac_id AND new_id=?");
          $stmt33->bind_param("s", $f);
          $stmt33->execute();
          $result33 = $stmt33->get_result();
          $row33 = $result33->fetch_assoc();

          $fac_id = $row33 ['fac_id'];
          $fac_qty = $row33 ['fac_qty'];
          $facQty = ($fac_qty - 1);
          $fac_limit = $row33 ['fac_limit'];
          $facLimit = ($fac_limit - 1);

          if($row33){
            $stmt34 = $conn->prepare("INSERT INTO `damage_kayak` (new_id, dam_kyk_leak, dam_status_leak, dam_kyk_date) VALUES ( ?, ?, ?, ?)");
            $stmt34->bind_param("ssss", $f, $dam_leak, $status_leak, $dam_date);
            $stmt34->execute();

            if($stmt34){
              $stmt35 = $conn->prepare("UPDATE  `facility_new` SET new_damage =? WHERE new_id = ?");
              $stmt35->bind_param("ss", $new_damage, $f);
              $stmt35->execute();

              $stmt36 = $conn->prepare("UPDATE `facility_category` SET fac_qty =?, fac_limit=? WHERE fac_id = ?");
              $stmt36->bind_param("sss", $facQty, $facLimit, $fac_id);
              $stmt36->execute();

              echo "<script> alert('Successful Checked!')</script>";
              echo "<script>window.location.href='maintenance_kayak_excellent_list.php';</script>";
            }
          }
        }
      }
    }

    echo "<script> alert('No Type of Damage is Selected!')</script>";
    echo "<script>window.location.href='maintenance_kayak_excellent_list.php';</script>";
  }

?>
