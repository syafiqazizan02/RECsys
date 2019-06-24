<?php
  include "dbconnection.php";

  if(isset($_POST['submit']))
  {
     $fac_id = $_POST["fac_id"];
     $ext_pend = $_POST ["ext_pend"];
     $ext_done = $_POST ["ext_done"];
     $ext_cost = $_POST ["ext_cost"];

     $fac_av = "0000-00-00";
     $fac_status = 0;

    $stmt = $conn->prepare("INSERT INTO `damage_category` (dam_cat_date, done_cat_date, done_cat_price, fac_id) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $ext_pend, $ext_done, $ext_cost, $fac_id);
		$stmt->execute();

    $stmt2 = $conn->prepare("UPDATE `facility_category` SET fac_status=?, fac_unav=?  WHERE fac_id=?");
    $stmt2->bind_param("sss", $fac_status, $fac_av, $fac_id);
    $stmt2->execute();

    if($stmt!=''&& $stmt2!=''){
      echo "<script>alert('Record Updated Successfully!')</script>";
      echo "<script>window.location.href = 'maintenance_extreme_view_panel.php'</script>";
    }
    else{
      echo "<script>alert('Record Updated Failed!')</script>";
      echo "<script>window.location.href = 'maintenance_extreme_view_panel.php'</script>";
    }
  }
?>
