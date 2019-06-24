<?php
  include "dbconnection.php";

  if(isset($_POST['submit']))
  {
    $fac_id = $_POST['fac_id'];
    $fac_rate= $_POST ["fac_rate"];
    $fac_limit= $_POST ["fac_limit"];

    $fac_used = 0;
    $fac_status = 0;
    $new_damage = 1;

    if ($fac_id <=3) {

      $stmt1 = $conn->prepare("SELECT * FROM `facility_category` WHERE fac_use=? AND fac_id=?");
      $stmt1->bind_param("ss", $fac_used,  $fac_id);
      $stmt1->execute();
      $stmt1->store_result();
      $count1 = $stmt1->num_rows;

      $stmt2 = $conn->prepare("SELECT * FROM `facility_new` WHERE new_damage=? AND fac_id=?");
      $stmt2->bind_param("ss", $new_damage, $fac_id);
      $stmt2->execute();
      $stmt2->store_result();
      $count2 = $stmt2->num_rows;

      if (($count1 > 0)&&($count2 == 0)) {

        $stmt2 = $conn->prepare("UPDATE `facility_category` SET fac_rate=? WHERE fac_id=?");
        $stmt2->bind_param("ss", $fac_rate, $fac_id);
        $stmt2->execute();

        if($stmt2){
          echo "<script>alert('Facilities Rate Updated Successfully!')</script>";
          echo "<script>window.location.href = 'setting_rate_panel.php'</script>";
        }else{
          echo "<script>alert('Facilities Rate Updated Failed!')</script>";
          echo "<script>window.location.href = 'setting_rate_panel.php'</script>";
        }
      } else {
        echo "<script>alert('Failed Updated! Facilities are in Maintenance or Resrved.')</script>";
        echo "<script>window.location.href = 'setting_rate_panel.php'</script>";
      }
    }else{

      $stmt3 = $conn->prepare("SELECT * FROM `facility_category` WHERE fac_use=? AND fac_status=? AND fac_id=?");
      $stmt3->bind_param("sss", $fac_used, $fac_status, $fac_id);
      $stmt3->execute();
      $stmt3->store_result();
      $count3 = $stmt3->num_rows;

      if($count3 > 0){

        $stmt4 = $conn->prepare("UPDATE `facility_category` SET fac_rate=?, fac_limit=?, fac_qty=?, fac_total=? WHERE fac_id=?");
        $stmt4->bind_param("sssss", $fac_rate, $fac_limit, $fac_limit, $fac_limit, $fac_id);
        $stmt4->execute();

        if($stmt4){
          echo "<script>alert('Facilities Rate & Limit Updated Successfully!')</script>";
          echo "<script>window.location.href = 'setting_rate_panel.php'</script>";
        }else{
          echo "<script>alert('Facilities Rate & Limit Updated Failed!')</script>";
          echo "<script>window.location.href = 'setting_rate_panel.php'</script>";
        }
      }else{

        echo "<script>alert('Failed Updated! Facilities are in Maintenance or Resrved.')</script>";
        echo "<script>window.location.href = 'setting_rate_panel.php'</script>";
      }
    }
  }
?>
