
<?php
include "dbconnection.php";

if(isset($_POST['submit']))
{
  date_default_timezone_set('Asia/Kuala_Lumpur');
  $done_date =  date("Y-m-d H:i");

  if(!empty($_POST["done_canopy"] || $_POST["done_pole"] || $_POST["done_seat"] || $_POST["done_paddle"] || $_POST["done_crack"] || $_POST["done_leak"]))
  {
    $new_id = $_POST ["new_id"];
    $new_damage = 0;
    $dam_id = $_POST['dam_id'];
    $dam_status = 0;

    $rep_status = 0;
    $done_status = 1;

    if(!empty($_POST["done_canopy"]))
    {
      $done_canopy = $_POST["done_canopy"];
      $stmt1 = $conn->prepare("UPDATE `damage_paddle` SET dam_status_canopy=?, done_date_canopy=?, done_price_canopy=? WHERE dam_pad_id=?");
      $stmt1->bind_param("ssss", $dam_status, $done_date, $done_canopy, $dam_id);
      $stmt1->execute();
    }

    if(!empty($_POST["done_pole"]))
    {
      $done_pole = $_POST["done_pole"];
      $stmt2 = $conn->prepare("UPDATE `damage_paddle` SET dam_status_pole=?, done_date_pole=?, done_price_pole=? WHERE dam_pad_id=?");
      $stmt2->bind_param("ssss", $dam_status, $done_date, $done_pole, $dam_id);
      $stmt2->execute();
    }

    if(!empty($_POST["done_seat"]))
    {
      $done_seat = $_POST["done_seat"];
      $stmt3 = $conn->prepare("UPDATE `damage_paddle` SET dam_status_seat=?, done_date_seat=?, done_price_seat=? WHERE dam_pad_id=?");
      $stmt3->bind_param("ssss", $dam_status, $done_date, $done_seat, $dam_id);
      $stmt3->execute();
    }

    if(!empty($_POST["done_paddle"]))
    {
      $done_paddle = $_POST["done_paddle"];
      $stmt4 = $conn->prepare("UPDATE `damage_paddle` SET dam_status_paddle=?, done_date_paddle=?, done_price_paddle=? WHERE dam_pad_id=?");
      $stmt4->bind_param("ssss", $dam_status, $done_date, $done_paddle, $dam_id);
      $stmt4->execute();
    }

    if(!empty($_POST["done_crack"]))
    {
      $done_crack = $_POST["done_crack"];
      $stmt5 = $conn->prepare("UPDATE `damage_paddle` SET dam_status_crack=?, done_date_crack=?, done_price_crack=? WHERE dam_pad_id=?");
      $stmt5->bind_param("ssss", $dam_status, $done_date, $done_crack, $dam_id);
      $stmt5->execute();
    }

    if(!empty($_POST["done_leak"]))
    {
      $done_leak = $_POST["done_leak"];
      $stmt6 = $conn->prepare("UPDATE `damage_paddle` SET dam_status_leak=?, done_date_leak=?, done_price_leak=? WHERE dam_pad_id=?");
      $stmt6->bind_param("ssss", $dam_status, $done_date, $done_leak, $dam_id);
      $stmt6->execute();
    }

    $stmt7 = $conn->prepare("SELECT * FROM `damage_paddle` WHERE dam_pad_id=? ");
    $stmt7->bind_param("s", $dam_id);
    $stmt7->execute();
    $result7 = $stmt7->get_result();
    $row7 = $result7->fetch_assoc();

    $dam_pad_date = $row7 ['dam_pad_date'];

    $status_canopy = $row7 ['dam_status_canopy'];
    $status_pole = $row7 ['dam_status_pole'];
    $status_seat = $row7 ['dam_status_seat'];
    $status_paddle = $row7 ['dam_status_paddle'];
    $status_crack = $row7 ['dam_status_crack'];
    $status_leak = $row7 ['dam_status_leak'];

    $price_canopy = $row7 ['done_price_canopy'];
    $price_pole = $row7 ['done_price_pole'];
    $price_seat = $row7 ['done_price_seat'];
    $price_paddle = $row7 ['done_price_paddle'];
    $price_crack = $row7 ['done_price_crack'];
    $price_leak = $row7 ['done_price_leak'];

    $done_price = ($price_canopy + $price_pole + $price_seat + $price_paddle + $price_crack + $price_leak);

    if ($status_canopy==0 && $status_pole==0 && $status_seat==0 && $status_paddle==0 && $status_crack==0 && $status_leak==0) {

      $stmt8 = $conn->prepare("SELECT new.fac_id as fac_id, cat.fac_qty as fac_qty, cat.fac_limit as fac_limit
      FROM `facility_new`AS new
      JOIN `facility_category` AS cat ON new.fac_id=cat.fac_id AND new_id=?");
      $stmt8->bind_param("s", $new_id);
      $stmt8->execute();
      $result8 = $stmt8->get_result();
      $row8 = $result8->fetch_assoc();

      $fac_id = $row8 ['fac_id'];
      $fac_qty = $row8 ['fac_qty'];
      $facQty = ($fac_qty + 1);
      $fac_limit = $row8 ['fac_limit'];
      $facLimit= ($fac_limit+ 1);

        if($stmt8){

          $stmt9 = $conn->prepare("UPDATE `damage_paddle` SET rep_pad_status=?, done_pad_price=?, done_pad_date=?, done_pad_status=? WHERE dam_pad_id=?");
          $stmt9->bind_param("sssss", $rep_status, $done_price, $done_date, $done_status, $dam_id);
          $stmt9->execute();

          $stmt10 = $conn->prepare("UPDATE `facility_new` SET new_damage=? WHERE new_id =?");
          $stmt10->bind_param("ss", $new_damage, $new_id);
          $stmt10->execute();

          $stmt11 = $conn->prepare("UPDATE `facility_category` SET fac_qty =?, fac_limit =? WHERE fac_id = ?");
          $stmt11->bind_param("sss", $facQty, $facLimit, $fac_id);
          $stmt11->execute();

          $stmt12 = $conn->prepare("INSERT INTO `damage_category` (dam_cat_date, done_cat_date, done_cat_price, fac_id) VALUES (?, ?, ?, ?)");
          $stmt12->bind_param("ssss", $dam_pad_date, $done_date, $done_price, $fac_id);
          $stmt12->execute();

          if($stmt9!=''&&$stmt10!=''&&$stmt11!=''&&$stmt12!=''){
            echo "<script> alert('Paddle Boat is Done Repair!')</script>";
            echo "<script>window.location.href='maintenance_paddle_repair_list.php';</script>";
          }
          else{
            echo "<script> alert('Paddle Boat is Failed Repair!')</script>";
            echo "<script>window.location.href='maintenance_paddle_repair_list.php';</script>";
          }
        }
      } else {
        echo "<script> alert('Successfully Updated Repair Price!')</script>";
        echo "<script>window.location.href='maintenance_paddle_repair_list.php';</script>";
      }
    }else{
      echo "<script> alert('Please Enter Repair Price!')</script>";
      echo "<script>window.location.href='maintenance_paddle_repair_list.php';</script>";
    }
  }
  ?>
