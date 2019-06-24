
<?php
include "dbconnection.php";

if(isset($_POST['submit']))
{
  date_default_timezone_set('Asia/Kuala_Lumpur');
  $done_date =  date("Y-m-d H:i");

  if(!empty($_POST["done_blade"] || $_POST["done_seat"] || $_POST["done_hatch"] || $_POST["done_carck"] || $_POST["done_leak"]))
  {
    $new_id = $_POST ["new_id"];
    $new_damage = 0;
    $dam_id = $_POST['dam_id'];
    $dam_status = 0;

    $rep_status = 0;
    $done_status = 1;

    if(!empty($_POST["done_blade"]))
    {
      $done_blade = $_POST["done_blade"];
      $stmt1 = $conn->prepare("UPDATE `damage_kayak` SET dam_status_blade=?, done_date_blade=?, done_price_blade=? WHERE dam_kyk_id=?");
      $stmt1->bind_param("ssss", $dam_status, $done_date, $done_blade, $dam_id);
      $stmt1->execute();
    }

    if(!empty($_POST["done_seat"]))
    {
      $done_seat = $_POST["done_seat"];
      $stmt2 = $conn->prepare("UPDATE `damage_kayak` SET dam_status_seat=?, done_date_seat=?, done_price_seat=? WHERE dam_kyk_id=?");
      $stmt2->bind_param("ssss", $dam_status, $done_date, $done_seat, $dam_id);
      $stmt2->execute();
    }

    if(!empty($_POST["done_hatch"]))
    {
      $done_hatch = $_POST["done_hatch"];
      $stmt3 = $conn->prepare("UPDATE `damage_kayak` SET dam_status_hatch=?, done_date_hatch=?, done_price_hatch=? WHERE dam_kyk_id=?");
      $stmt3->bind_param("ssss", $dam_status, $done_date, $done_hatch, $dam_id);
      $stmt3->execute();
    }

    if(!empty($_POST["done_carck"]))
    {
      $done_carck = $_POST["done_carck"];
      $stmt4 = $conn->prepare("UPDATE `damage_kayak` SET dam_status_crack=?, done_date_crack=?, done_price_crack=? WHERE dam_kyk_id=?");
      $stmt4->bind_param("ssss", $dam_status, $done_date, $done_carck, $dam_id);
      $stmt4->execute();
    }

    if(!empty($_POST["done_leak"]))
    {
      $done_leak = $_POST["done_leak"];
      $stmt5 = $conn->prepare("UPDATE `damage_kayak` SET dam_status_leak=?, done_date_leak=?, done_price_leak=? WHERE dam_kyk_id=?");
      $stmt5->bind_param("ssss", $dam_status, $done_date, $done_leak, $dam_id);
      $stmt5->execute();
    }

    $stmt6 = $conn->prepare("SELECT * FROM `damage_kayak` WHERE dam_kyk_id=? ");
    $stmt6->bind_param("s", $dam_id);
    $stmt6->execute();
    $result6 = $stmt6->get_result();
    $row6 = $result6->fetch_assoc();

    $dam_kyk_date = $row6 ['dam_kyk_date'];

    $status_blade = $row6 ['dam_status_blade'];
    $status_seat = $row6 ['dam_status_seat'];
    $status_hatch = $row6 ['dam_status_hatch'];
    $status_crack = $row6 ['dam_status_crack'];
    $status_leak = $row6 ['dam_status_leak'];

    $price_blade = $row6 ['done_price_blade'];
    $price_seat = $row6 ['done_price_seat'];
    $price_hatch = $row6 ['done_price_hatch'];
    $price_crack = $row6 ['done_price_crack'];
    $price_leak = $row6 ['done_price_leak'];

    $done_price = ($price_blade + $price_seat + $price_hatch + $price_crack + $price_leak);

    if ($status_blade==0 && $status_seat==0 && $status_hatch==0 && $status_crack==0 && $status_leak==0) {

      $stmt7 = $conn->prepare("SELECT new.fac_id as fac_id, cat.fac_qty as fac_qty, cat.fac_limit as fac_limit
      FROM `facility_new`AS new
      JOIN `facility_category` AS cat ON new.fac_id=cat.fac_id AND new_id=?");
      $stmt7->bind_param("s", $new_id);
      $stmt7->execute();
      $result7 = $stmt7->get_result();
      $row7 = $result7->fetch_assoc();

      $fac_id = $row7 ['fac_id'];
      $fac_qty = $row7 ['fac_qty'];
      $facQty = ($fac_qty + 1);
      $fac_limit = $row7 ['fac_limit'];
      $facLimit= ($fac_limit+ 1);

        if($stmt7){

          $stmt8 = $conn->prepare("UPDATE `damage_kayak` SET rep_kyk_status=?, done_kyk_price=?, done_kyk_date=?, done_kyk_status=? WHERE dam_kyk_id=?");
          $stmt8->bind_param("sssss", $rep_status, $done_price, $done_date, $done_status, $dam_id);
          $stmt8->execute();

          $stmt9 = $conn->prepare("UPDATE `facility_new` SET new_damage=? WHERE new_id =?");
          $stmt9->bind_param("ss", $new_damage, $new_id);
          $stmt9->execute();

          $stmt10 = $conn->prepare("UPDATE `facility_category` SET fac_qty =?, fac_limit =? WHERE fac_id = ?");
          $stmt10->bind_param("sss", $facQty, $facLimit, $fac_id);
          $stmt10->execute();

          $stmt11 = $conn->prepare("INSERT INTO `damage_category` (dam_cat_date, done_cat_date, done_cat_price, fac_id) VALUES (?, ?, ?, ?)");
          $stmt11->bind_param("ssss", $dam_kyk_date, $done_date, $done_price, $fac_id);
          $stmt11->execute();

          if($stmt8!=''&&$stmt9!=''&&$stmt10!=''&&$stmt11!=''){
            echo "<script> alert('Kayak is Done Repair!')</script>";
            echo "<script>window.location.href='maintenance_kayak_repair_list.php';</script>";
          }
          else{
            echo "<script> alert('Kayak is Failed Repair!')</script>";
            echo "<script>window.location.href='maintenance_kayak_repair_list.php';</script>";
          }
        }
      } else {
        echo "<script> alert('Successfully Updated Repair Price!')</script>";
        echo "<script>window.location.href='maintenance_kayak_repair_list.php';</script>";
      }
    }else{
      echo "<script> alert('Please Enter Repair Price!')</script>";
      echo "<script>window.location.href='maintenance_kayak_repair_list.php';</script>";
    }
  }
  ?>
